/* =============   STEPPER GESTION ===================================== */
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
            $("html, body").animate({ scrollTop: 0 }, "slow");
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
            nextStepWizard.removeAttr('disabled').trigger('click');
        }
        $("html, body").animate({ scrollTop: 0 }, "slow");
    });
  
    // on actif le panel possedant la class btn-primary
    $('div.setup-panel div a.btn-primary').trigger('click');
  });