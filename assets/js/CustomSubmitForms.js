$("#ContratHabitation form").submit(function (e) {
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
        var url = window.location.protocol + "//" + window.location.host + "/" + "client/validerContratHabitation";

        e.preventDefault();

        $.ajax({
            type: "POST",
            url: url,
            data: dataUrl,
            dataType : 'html',
            ContentType : 'application/json',
            success: function (data, status, xhr) {
                WebSocket_SendNotification();
                url = window.location.protocol + "//" + window.location.host + "/" +'client/espacePersonnel';
                // similar behavior as an HTTP redirect
                window.location.replace( url);
            },
            error: function () {
                traceLog('Erreur sur requete AJAX ContratHabitation');
            }
        });
    }
});