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
    var fromEnCours = $(this).closest('form');
    // dataUrl contient les données de la form en cour de saisie
    // pour les envoyer via la methode ajax
    var dataUrl = fromEnCours.serialize();

    e.preventDefault();

    $.ajax({
        type: "POST",
        //url: location.host+"/"+"user/newLogin",
        url: "user/newLogin",
        data: dataUrl,
        dataType : 'json',
        ContentType : 'application/json',
        success: function (data, status, xhr) {
            console.log(data.user);
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