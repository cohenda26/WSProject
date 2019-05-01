function ValiderContratHabitation(dataFrm, Frm){
    $.ajax({
        type: "POST",
        url: getUrlComplete("client/validerContratHabitation"),
        data: Frm.serialize(),
        dataType : 'html',
        ContentType : 'application/json',
        success: function (data, status, xhr) {
            var data = Frm.serializeArray();
            WebSocket_SendMessage("Devis ", data, true);
            //WebSocket_SendMessage("Devis ", true);
            // redirection vers l'espace personnel du client
            window.location.replace( getUrlComplete('client/espacePersonnel'));
        },
        error: function (xhr, textStatus, error) {
            traceLog('Erreur sur requete AJAX ContratHabitation');
        },
        Complete: function (xhr, testStatus){
            if (textStatus == "success"){
            }
            if (textStatus == "error"){
            }
        }
    });
}

$("#ContratHabitation form").submit(function (e) {
    var dataValid = this.checkValidity();
    this.classList.add('was-validated');
    if ( dataValid === false) {
        e.preventDefault();
        e.stopPropagation();
     }
     else
     {  
        e.preventDefault();
        // dataFrm contient les données de la form en cour de saisie
        // pour les envoyer via la methode ajax
        let Frm = $(this);
        var dataFrm = $(this).serialize();
    
        $.ajax({
            type: "POST",
            url: getUrlComplete("user/userConnected"),
            data: "",
            dataType : 'json',
            ContentType : 'application/json',
            success: function (data, status, xhr) {
                // L'utilisateur n'est pas connecté
                if (!data.user) {  
                    // On pointe la form dont Id=UserSignIn et 
                    // on declenche la validation du contrat au submit
                    $("form#UserSignIn")[0].addEventListener('submit',
                    function () {
                        ValiderContratHabitation(dataFrm, Frm);
                    }, {once : true});

                    // Appel de la form correspondant à l'enregistrement d'un USER
                    $('#btnUserSignIn').trigger('click');
                  } 
                else {
                    ValiderContratHabitation(dataFrm, Frm);
                }
            },
            error: function (xhr, textStatus, error) {
                traceLog('userConnected SubmitForm: erreur requete AJAX');
            }
        });

/*
        $.ajax({
            type: "POST",
            url: getUrlComplete("client/validerContratHabitation"),
            data: dataUrl,
            dataType : 'html',
            ContentType : 'application/json',
            beforeSend : function (xhr, settings){
            },
            success: function (data, status, xhr) {
                WebSocket_SendMessage("Devis ", true);
                // redirection vers l'espace personnel du client
                window.location.replace( getUrlComplete('client/espacePersonnel'));
            },
            error: function (xhr, textStatus, error) {
                traceLog('Erreur sur requete AJAX ContratHabitation');
            },
            Complete: function (xhr, testStatus){
                if (textStatus == "success"){
                }
            }
        });
*/
    }
});