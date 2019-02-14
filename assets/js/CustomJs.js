$(function () {
    "use strict";
    // ============================================================== 
    //This is for xxxxx
    // ============================================================== 
    // $(function () {
        
    // });

    $(window).on("load", function() {
        console.log("Customjs.js OnLoad function");
        // Execution d'une requete Ajax afin de déterminer si une session existe déjà
        $.ajax({
            type: "POST",
            url: "/user/userConnected",
            data: "",
            dataType : 'json',
            ContentType : 'application/json',
            success: function (data, status, xhr) {
                displayUserFromTopBar(data.user, data.courtier, data.client);
                displayUserFromNavBar(data.user, data.courtier, data.client);
            },
            error: function () {
                console.log('userConnected : erreur requete AJAX');
                displayUserFromTopBar(null, null, null);
                displayUserFromNavBar(null, null, null);
            }
        });
    });
    
});

// Fonction qui gère l'affichage de la TopBar et Nav pour les informations USER
function displayUserFromTopBar(user, courtier, client) {
    console.log("displayUserFromTopBar, param user / courtier / client ", user, courtier, client);

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
}

function displayUserFromNavBar(user, courtier, client){
    console.log("displayUserFromNavBar, param user / courtier / client ",
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
        url: "/user/logout",
        data: "",
        dataType : 'json',
        ContentType : 'application/json',
        success: function (data, status, xhr) {
            displayUserFromTopBar(null, null, null);
            displayUserFromNavBar(null, null, null);
        },
        error: function () {
            console.log('userConnected : erreur requete AJAX');
            displayUserFromTopBar(null, null, null);
            displayUserFromNavBar(null, null, null);
        }
    });
});
/* ============= USER IDENTIFICATION GESTION ========================== */

$('#ModalConnexion').on('show.bs.modal', function(e) {
    // récupération du button sur qui on a cliqué
    var button = $(e.relatedTarget);
    // récupération de l'information data-user du boutton
    var recipient = button.data('user');

    $('#'+recipient).removeClass('d-none');
});

$('#ModalConnexion').on('hide.bs.modal', function(e) {
    $('.userIdentification').addClass('d-none');
});

$("#ModalConnexion form").submit(function (e) {
    var formEnCours = $(this).closest('form');
    // dataUrl contient les données de la form en cour de saisie
    // pour les envoyer via la methode ajax
    var dataUrl = formEnCours.serialize();

    var pwd = $(formEnCours).find('[type=password]');
    pwdValue = pwd[0].value;

    var btnSubmit = $(formEnCours).find('[type=submit]');
    var action = btnSubmit[0].name;

    e.preventDefault();

    $.ajax({
        type: "POST",
        url: "user/"+action,
        data: dataUrl,
        dataType : 'json',
        ContentType : 'application/json',
        success: function (data, status, xhr) {
            if (pwdValue == data.user._password){
                $('#ModalConnexion').modal('hide');

                displayUserFromTopBar(data.user, data.courtier, data.client);
                displayUserFromNavBar(data.user, data.courtier, data.client);
            }
        },
        error: function () {
            console.log('Erreur sur requete AJAX USER');
        }
    });
});

/* ============= SLIDER GESTION ======================================= */

$('#slider10').bsTouchSlider();
$(".carousel .carousel-inner").swipe({
    swipeLeft: function (event, direction, distance, duration, fingerCount) { this.parent().carousel('next'); } , 
    swipeRight: function () { this.parent().carousel('prev'); } , 
    threshold: 0
 });

 
/* =============   STEPPER GESTION ===================================== */
 $(document).ready(function () {
    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn'),
              allPrevBtn = $('.prevBtn');
  
    allWells.hide();
  
    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);
  
        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });
    
    allPrevBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");
  
            prevStepWizard.removeAttr('disabled').trigger('click');
    });
  
    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;
  
        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }
  
        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });
  
    $('div.setup-panel div a.btn-primary').trigger('click');
  });