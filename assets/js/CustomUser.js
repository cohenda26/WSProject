$(function () {
    "use strict";
    // ============================================================== 
    //This is for xxxxx
    // ============================================================== 
    // $(function () {
        
    // });

    $(window).on("load", function() {
        traceLog("CustomUser.js OnLoad function");
        // Execution d'une requete Ajax afin de déterminer si une session existe déjà

        $.ajax({
            type: "POST",
            url: getUrlComplete("/user/userConnected"),
            data: "",
            dataType : 'json',
            ContentType : 'application/json',
            success: function (data, status, xhr) {
                displayUserFromTopBar(data.user, data.courtier, data.client);
                displayUserFromNavBar(data.user, data.courtier, data.client);
                WebSocket_Connect();
            },
            error: function () {
                traceLog('userConnected : erreur requete AJAX');
                displayUserFromTopBar(null, null, null);
                displayUserFromNavBar(null, null, null);
                WebSocket_Disconnect();
            }
        });
    });
    
});

// Fonction qui gère l'affichage de la TopBar et Nav pour les informations USER
function displayUserFromTopBar(user, courtier, client) {
    traceLog("displayUserFromTopBar, param user / courtier / client ", user, courtier, client);

    if ((user == null) || (user == undefined)) {
        $('.topbar-UserConnected').addClass('d-none');
        $('.topbar-UserDisconnected').removeClass('d-none');       
    }
    else {
        $('.topbar-UserConnected #user').html(user._email);
        if (user._isCourtier == true) {
            $('.topbar-UserConnected #numEssek').html(courtier._numEssek);
        } 
        else {
            $('.topbar-UserConnected #numEssek').html("");
        }
        $('.topbar-UserConnected').removeClass('d-none');
        $('.topbar-UserDisconnected').addClass('d-none');
        // activation du WebSocket
    }
}

function displayUserFromNavBar(user, courtier, client){
    traceLog("displayUserFromNavBar, param user / courtier / client ",
     user ? true : false, user ? user._isCourtier : false, user ? user._isClient : false);

    if (user) {
        $('.navbar-btn-connexion').addClass('d-none'); 

        if (user._isCourtier){
           $('.navbar-menu-courtier').removeClass('d-none');
        }
        else {
           $('.navbar-menu-courtier').addClass('d-none');
        };

        if (user._isClient){
           $('.navbar-menu-client').removeClass('d-none');
        }
        else {
           $('.navbar-menu-client').addClass('d-none');
        };
    }
    else {
        $('.navbar-btn-connexion').removeClass('d-none'); 
        $('.navbar-menu-courtier').addClass('d-none');
        $('.navbar-menu-client').addClass('d-none');
    };  

}

// Fonction lorsque l'on clique sur les boutons Logout / Détruit la session en cours
$('.btn-logout').click(function(){
    $.ajax({
        type: "POST",
        url: getUrlComplete("/user/logout"),
        data: "",
        dataType : 'json',
        ContentType : 'application/json',
        success: function (data, status, xhr) {
            displayUserFromTopBar(null, null, null);
            displayUserFromNavBar(null, null, null);
            WebSocket_Disconnect();
        },
        error: function () {
            traceLog('userConnected : erreur requete AJAX');
            displayUserFromTopBar(null, null, null);
            displayUserFromNavBar(null, null, null);
        }
    });
});


/* ============= USER IDENTIFICATION GESTION ========================== */
  // Email validation.
$("input[type=email]").change(function() {
    var email = $(this);
    if (email.is(':invalid')) {
        email.removeClass('is-valid').addClass('is-invalid');
        email.siblings(".invalid-feedback").text(email.prop("validationMessage"))
    } else {
        email.removeClass('is-invalid').addClass('is-valid');
    }
});

$('#ModalConnexion').on('show.bs.modal', function(e) {
    this.classList.remove('was-validated');

    // récupération du button sur qui on a cliqué
    var button = $(e.relatedTarget);
    // récupération de l'information data-user du boutton
    var recipient = button.data('user');

    $('#Frm'+recipient).removeClass('d-none');
});

$('#ModalConnexion').on('hide.bs.modal', function(e) {
    $('.userIdentification').addClass('d-none');
});

$("#ModalConnexion form").submit(function (e) {
    var dataValid = this.checkValidity();
    this.classList.add('was-validated');
    if ( dataValid === false) {
        e.preventDefault();
        e.stopPropagation();
     }
     else
     {  // dataUrl contient les données de la form en cour de saisie
        // pour les envoyer via la methode ajax
        var dataUrl = $(this).serialize();

        var pwd = $(this).find('[type=password]');
        pwdValue = pwd[0].value;

        var btnSubmit = $(this).find('[type=submit]');
        var action = btnSubmit[0].name;

        e.preventDefault();

        $.ajax({
            type: "POST",
            url: getUrlComplete("user/"+action),
            data: dataUrl,
            dataType : 'json',
            ContentType : 'application/json',
            success: function (data, status, xhr) {
                if (pwdValue == data.user._password){
                    $('#ModalConnexion').modal('hide');

                    displayUserFromTopBar(data.user, data.courtier, data.client);
                    displayUserFromNavBar(data.user, data.courtier, data.client);
                    WebSocket_Connect();
                }
            },
            error: function () {
                traceLog('Erreur sur requete AJAX USER');
            }
        });
    }
});
