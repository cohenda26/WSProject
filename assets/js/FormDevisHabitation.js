$(window).on("load", function() {
    traceLog("Custom Submit Form.js OnLoad ");
});

function ValiderDevisHabitation(Frm){
    $.ajax({
        type: "POST",
        url: getUrlComplete("devis/validerDevisHabitation"),
        data: Frm.serialize(),
        dataType : 'html',
        ContentType : 'application/json',
        success: function (data, status, xhr) {
            var data = Frm.serializeArray();
            WebSocket_SendMessage("Devis ", data, true);
            // redirection vers l'espace personnel du client
            window.location.replace( getUrlComplete('client/espacePersonnel'));
        },
        error: function (xhr, textStatus, error) {
            traceLog('Erreur sur requete AJAX DevisHabitation');
        },
        Complete: function (xhr, testStatus){
            if (textStatus == "success"){
            }
            if (textStatus == "error"){
            }
        }
    });
}

function CheckDataIntegrity(){
    $error = false;
    $surface = $("#surface");
    if ($surface.val() == 0){
        $error = true;
        $surface.addClass("is-invalid");
        // erreur sur la surface
    }

    $reponseVeranda = $("#questionVeranda a.active");
    $surfaceVeranda = $("#surfaceVeranda");
    if ( ($reponseVeranda.data("bind") == "oui") &&  ($surfaceVeranda.val() == 0) ){
        $error = true;
        $reponseVeranda.addClass("is-invalid");
        $surfaceVeranda.addClass("is-invalid");
     // erreur sur la surfaceVeranda
    }

    $logementAssure = $("#logementAssure a.active");
    $nomAssureur = $("#NomAssureur");
    if ( ($logementAssure.data("bind") == "1") &&  ($nomAssureur.val() == "") ){
        $error = true;
        $logementAssure.addClass("is-invalid");
        $nomAssureur.addClass("is-invalid");
     // erreur sur la nom de l'assureur
    }

    $cotisationMin = $("#cotisationMin");
    $cotisationMax = $("#cotisationMax");
    if ($cotisationMin.val() > $cotisationMax.val()) {
        $error = true;
        $cotisationMin.addClass("is-invalid");
        $cotisationMax.addClass("is-invalid");
        // erreur sur les valeur des cotisations demandées
    }

    return $error;
}

$("#DevisHabitation form").submit(function (e) {
    var dataValid = this.checkValidity();
    if (!dataValid){
        dataValid = CheckDataIntegrity()
    }
    this.classList.add('was-validated');
    if ( dataValid === false) {
        e.preventDefault();
        e.stopPropagation();
     }
     else
     {  
        e.preventDefault();
        // Frm est la Form d'où les données vont être récupérées pour être traitées
        let Frm = $(this);
    
        var data = getUserConnected();
        if ((!data) || (!data.user)) {  
            // On pointe la form dont Id=UserSignIn et 
            // on declenche la validation du devis au submit
            $("form#UserSignIn")[0].addEventListener('submit',
            function () {
                ValiderDevisHabitation(Frm);
            }, {once : true});

            // Appel de la form correspondant à l'enregistrement d'un USER
            $('#btnUserSignIn').trigger('click');
          } 
        else {
            ValiderDevisHabitation(Frm);
        }
        
        // Mise a jour UserConnected        
        // $.ajax({
        //     type: "POST",
        //     url: getUrlComplete("user/userConnected"),
        //     data: "",
        //     dataType : 'json',
        //     ContentType : 'application/json',
        //     success: function (data, status, xhr) {
        //         // L'utilisateur n'est pas connecté
        //         if (!data.user) {  
        //             // On pointe la form dont Id=UserSignIn et 
        //             // on declenche la validation du devis au submit
        //             $("form#UserSignIn")[0].addEventListener('submit',
        //             function () {
        //                 ValiderDevisHabitation(Frm);
        //             }, {once : true});

        //             // Appel de la form correspondant à l'enregistrement d'un USER
        //             $('#btnUserSignIn').trigger('click');
        //           } 
        //         else {
        //             ValiderDevisHabitation(Frm);
        //         }
        //     },
        //     error: function (xhr, textStatus, error) {
        //         traceLog('userConnected SubmitForm: erreur requete AJAX');
        //     }
        // });

    }
});