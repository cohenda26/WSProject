function ValiderContratHabitation(dataFrm){
    $.ajax({
        type: "POST",
        url: getUrlComplete("client/validerContratHabitation"),
        data: dataFrm,
        dataType : 'html',
        ContentType : 'application/json',
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
        var dataFrm = $(this).serialize();
    
        $.ajax({
            type: "POST",
            url: getUrlComplete("user/userConnected"),
            data: "",
            dataType : 'json',
            ContentType : 'application/json',
            success: function (data, status, xhr) {
                // Test pour savoir si l'utilisateur est connecté
                if (!data.user) {  
                    // Mise en place d'un evenement sur le deuxieme partie de la form
                    // afin de declencher la validation du contrat au submit
                    $("#ModalConnexion form")[1].addEventListener('submit', 
                    function () {
                        ValiderContratHabitation(dataFrm);
                    }, {once : true});

                    // Appel de la form correspondant à l'enregistrement d'un USER
                    $('#userSignIn').trigger('click');
                  } 
                else {
                    ValiderContratHabitation(dataFrm);
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