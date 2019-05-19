function TestNotify(){
    var notification = $.notify ({
        // options
        //icon: 'glyphicon glyphicon-envelope',
        icon: 'icon-Mail info-icon',
        title: 'Bootstrap notify',
        message: 'Turning standard Bootstrap alerts into "notify" like notifications',
        url: 'http://www.google.fr',
        target: '_blank'
    },{
        // settings
        element: 'body',
        position: null,
        type: "info",
        allow_dismiss: true,
        newest_on_top: true, //false,
        showProgressbar: false,
        placement: {
            from: "top",
            align: "right"
        },
        offset: 20,
        spacing: 10,
        z_index: 1031,
        delay: 5000,
        timer: 1000,
        width : 400,
        url_target: '_blank',
        mouse_over: null,
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        },
        onShow: null,
        onShown: null,
        onClose: null,
        onClosed: null,
        icon_type: 'class',
        template: '<div data-notify="container" class="col-11 cold-md-6 col-sm-3 alert alert-{0}" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
        '</div>' 
    });

    setTimeout(function() {
        notification.update({'type': 'success', 'message': '<strong>Success</strong> Your page has been saved!'});
    }, 2000);
}

function getUserConnected () {
  var data = sessionStorage.getItem('bitouelUser');
  if (data) {
      return JSON.parse(data);
  }
  else
   return null;
}

function setUserConnected(data) {
    if (data) {
        var dataJSON = JSON.stringify(data);
        sessionStorage.setItem('bitouelUser', dataJSON);
    }
    else {
        sessionStorage.removeItem('bitouelUser');
    }
}

$(window).on("load", function() {
    traceLog("CustomUser.js OnLoad ");

    // Execution d'une requete Ajax afin de déterminer si une session existe déjà
    var data = getUserConnected();
    if (data){
        displayUserFromTopBar(data.user, data.courtier, data.client);
        displayUserFromNavBar(data.user, data.courtier, data.client);
    }
    else {
        traceLog('CustomUser.js / load / User not connected ');
        displayUserFromTopBar(null, null, null);
        displayUserFromNavBar(null, null, null);
        WebSocket_Disconnect();        
    }

    // Mise a jour UserConnected
    // Execution d'une requete Ajax afin de déterminer si une session existe déjà
    // $.ajax({
    //     type: "POST",
    //     url: getUrlComplete("/user/userConnected"),
    //     data: "",
    //     dataType : 'json',
    //     ContentType : 'application/json',
    //     success: function (data, status, xhr) {
    //         displayUserFromTopBar(data.user, data.courtier, data.client);
    //         displayUserFromNavBar(data.user, data.courtier, data.client);
    //         //WebSocket_Connect(data.user);
    //     },
    //     error: function () {
    //         traceLog('userConnected : erreur requete AJAX');
    //         displayUserFromTopBar(null, null, null);
    //         displayUserFromNavBar(null, null, null);
    //         WebSocket_Disconnect();
    //     }
    // });
});

// $(function () {
//     //"use strict";

//     //TestNotify();
    
//     $(window).on("load", function() {
//         traceLog("CustomUser.js OnLoad ");

//         // Execution d'une requete Ajax afin de déterminer si une session existe déjà
//         $.ajax({
//             type: "POST",
//             url: getUrlComplete("/user/userConnected"),
//             data: "",
//             dataType : 'json',
//             ContentType : 'application/json',
//             success: function (data, status, xhr) {
//                 displayUserFromTopBar(data.user, data.courtier, data.client);
//                 displayUserFromNavBar(data.user, data.courtier, data.client);
//                 //WebSocket_Connect(data.user);
//             },
//             error: function () {
//                 traceLog('userConnected : erreur requete AJAX');
//                 displayUserFromTopBar(null, null, null);
//                 displayUserFromNavBar(null, null, null);
//                 WebSocket_Disconnect();
//             }
//         });
//     });
    
// });

$(document).ready(function() {
   // On verifie la présence de l'Id sectionStepper
   // si present alors on change la class pour agrandir la zone globale du header
    if ( $( "#sectionStepper" ).length ) {
        $("#blocContent").removeClass('spacer-p-130');
        $("#blocContent").addClass('spacer-p-260');
    }

    // bootstrapValidate('#emailLogin', 'email:Saisir un email valide');
    // bootstrapValidate('#passwordLogin', 'required:Mot de passe obligatoire!');
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
    }
    WebSocket_Connect(user);
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
        // dataType : Type de donnees envoyés
        dataType : 'html',
        // ContentType : Type de donnees en retour
        ContentType : 'application/json',
        success: function (data, status, xhr) {
            // displayUserFromTopBar(null, null, null);
            // displayUserFromNavBar(null, null, null);
            traceLog('Btn Logout Success');
            setUserConnected(null);
            WebSocket_Disconnect();
        },
        error: function (xhr, textStatus, error) {
            traceLog('CustomUser.js / Btn Logout / userConnected / Call Ajax error', textStatus, error);
            // displayUserFromTopBar(null, null, null);
            // displayUserFromNavBar(null, null, null);
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

$('.btnNavigateUser').click( (e)=>{
    var btn = $(e.target);
    var action = btn.data('action');

    $('.userIdentification').addClass('d-none');
    $('#'+action).removeClass('d-none');
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
    // On desactive toutes les forms possédant la class "userIdentification"
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
     {  
        // dataUrl contient les données de la form en cour de saisie
        // pour les envoyer via la methode ajax
        var dataUrl = $(this).serialize();

        var pwd = $(this).find('[type=password]');
        pwdValue = pwd[0].value;

        var btnSubmit = $(this).find('[type=submit]');
        var action = btnSubmit[0].name;  // Login / Register / RegisterCourtier

        e.preventDefault();

        $.ajax({
            type: "POST",
            url: getUrlComplete("user/"+action),
            data: dataUrl,
            dataType : 'json',
            ContentType : 'application/json',
            success: function (data, status, xhr) {
                // if (pwdValue == data.user._password){
                    setUserConnected(data);

                    $('#ModalConnexion').modal('hide');

                    if (data.locationPage.length > 0){
                        window.location.replace( getUrlComplete(data.locationPage));
                    }

                    displayUserFromTopBar(data.user, data.courtier, data.client);
                    displayUserFromNavBar(data.user, data.courtier, data.client);
                    //WebSocket_Connect();

                    // if (data.locationPage.length > 0){
                    //     window.location.replace( getUrlComplete(data.locationPage));
                    // }
                // }
            },
            error: function () {
                traceLog('Erreur sur requete AJAX USER');
            }
        });
    }
});
