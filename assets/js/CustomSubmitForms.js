function ValiderContratHabitation(Frm){
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
        // Frm est la Form d'où les données vont être récupérées pour être traitées
        let Frm = $(this);
    
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
                        ValiderContratHabitation(Frm);
                    }, {once : true});

                    // Appel de la form correspondant à l'enregistrement d'un USER
                    $('#btnUserSignIn').trigger('click');
                  } 
                else {
                    ValiderContratHabitation(Frm);
                }
            },
            error: function (xhr, textStatus, error) {
                traceLog('userConnected SubmitForm: erreur requete AJAX');
            }
        });

    }
});