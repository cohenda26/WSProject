function deleteDevisHabitation(id){
    $.ajax({
        type: "POST",
        url: getUrlComplete("client/deleteDevisHabitation/id/"+id),
        data: null,
        dataType : 'html',
        ContentType : 'application/json',
        success: function (data, status, xhr) {
            $("#itemDevis"+id).remove();
            WebSocket_SendMessage("Devis ", "Devis detruit", true);
        },
        error: function (xhr, textStatus, error) {
            traceLog('Erreur sur requete AJAX DeleteHabitation');
        },
        Complete: function (xhr, testStatus){
            if (textStatus == "success"){
            }
            if (textStatus == "error"){
            }
        }
    });
}