/* =============   STEPPER GESTION ===================================== */
function TestNotify(){
    // var notification = $.notify ({
    //     // options
    //     icon: 'glyphicon glyphicon-warning-sign',
    //     title: 'Bootstrap notify',
    //     message: 'Turning standard Bootstrap alerts into "notify" like notifications',
    //     url: 'https://github.com/mouse0270/bootstrap-notify',
    //     target: '_blank'
    // },{
    //     // settings
    //     element: 'body',
    //     position: null,
    //     type: "info",
    //     allow_dismiss: true,
    //     newest_on_top: false,
    //     showProgressbar: false,
    //     placement: {
    //         from: "top",
    //         align: "right"
    //     },
    //     offset: 20,
    //     spacing: 10,
    //     z_index: 1031,
    //     delay: 5000,
    //     timer: 1000,
    //     url_target: '_blank',
    //     mouse_over: null,
    //     animate: {
    //         enter: 'animated fadeInDown',
    //         exit: 'animated fadeOutUp'
    //     },
    //     onShow: null,
    //     onShown: null,
    //     onClose: null,
    //     onClosed: null,
    //     icon_type: 'class',
    //     template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
    //         '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
    //         '<span data-notify="icon"></span> ' +
    //         '<span data-notify="title">{1}</span> ' +
    //         '<span data-notify="message">{2}</span>' +
    //         '<div class="progress" data-notify="progressbar">' +
    //             '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
    //         '</div>' +
    //         '<a href="{3}" target="{4}" data-notify="url"></a>' +
    //     '</div>' 
    // });

    // setTimeout(function() {
    //     notification.update({'type': 'success', 'message': '<strong>Success</strong> Your page has been saved!'});
    // }, 2000);
}

$(document).ready(function () {
        // Liste des puces du stepper
    var navListItems = $('div.setup-panel div a'),
        // liste des blocs de contenu
        allWells = $('.setup-content'),
        // liste des boutons suivant
        allNextBtn = $('.nextBtn'),
        // liste des boutons precedent
        allPrevBtn = $('.prevBtn');

    const ListControlsInputs = "input[type='text'],input[type='url'],input[type='number'],input[type='date']";
  
    // on cache l'ensemble des blocs de contenus
    allWells.hide();
  
    // gestion du click
    navListItems.click(function (e) {
        e.preventDefault();
            // contenu qu'il faudra afficher 
        var $target = $($(this).attr('href')),
            // puce sur laquelle on a cliqué
            $item = $(this);
  
        // l'item est actif
        if (!$item.hasClass('disabled')) {
            // affectation de la class 'btn-default' a toutes les puces du stepper
            navListItems.removeClass('btn-primary').addClass('btn-default');
            // affectation de la class 'btn-primary' à la puce en cours
            $item.addClass('btn-primary');
            // on cache tous les contenu
            allWells.hide();
            // affichage du contenu associé à la puce en cours
            $target.show();
            // positionnement sur le premier champ
            $target.find('input:eq(0)').focus();
        }
    });
    
    // Gestion CLick sur le boutons precedent
    allPrevBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");
            
            curInputs = curStep.find(ListControlsInputs);
            for(var i=0; i<curInputs.length; i++){
                $(curInputs[i]).removeClass("is-invalid").removeClass("is-valid");
            }

            prevStepWizard.removeAttr('disabled').trigger('click');
    });
  
    // Gestion click sur les boutons suivants
    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find(ListControlsInputs),
            isValid = true;

        // Pour utilisation validation Boostrap
        // $(".form-group").removeClass("has-error");
        // for(var i=0; i<curInputs.length; i++){
        //     if (!curInputs[i].validity.valid){
        //         isValid = false;
        //         $(curInputs[i]).closest(".form-group").addClass("has-error");
        //     }
        // }

        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).addClass("is-invalid");
            }
            else $(curInputs[i]).addClass("is-valid");
        }

        if (isValid) {
            TestNotify();
            nextStepWizard.removeAttr('disabled').trigger('click');
        }
    });
  
    // on actif le panel possedant la class btn-primary
    $('div.setup-panel div a.btn-primary').trigger('click');
  });