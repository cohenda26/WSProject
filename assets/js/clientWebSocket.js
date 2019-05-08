console.log('Function CHARGEMENT : ClienWebSocket ');

let webSocket   = null;
let ws_protocol = null;
let ws_hostname = null;
let ws_port     = null;
let ws_endpoint = null;

$().ready(function() {
    console.log('Function READY : ClienWebSocket ');

});

$(window).on('load', function() {
    // On verifie la connexion d'un utilisateur via son email
    let userConnected = $('.topbar-UserConnected #user');
    console.log('Function LOAD : ClienWebSocket / UserConnected ',  userConnected.html());
    // if(userConnected.html() != "Undefined"){
    //     WebSocket_Connect();
    // }
 
 });


/**
 * Event handler for clicking on button "Connect"
 */
function WebSocket_Connect(_user) {
    if (user == null){
        WebSocket_Disconnect();
    }

    if ((!webSocket) && (_user)) {
        ws_protocol = "ws";
        ws_hostname = "127.0.0.1"; //"localhost";
        ws_port     = 3000;
        ws_endpoint = "";
        console.log('WebSocket_Connect Debut ');
        openWSConnection(ws_protocol, ws_hostname, ws_port, ws_endpoint);
        console.log('WebSocket_Connect Fin ');
    }
}
/**
 * Event handler for clicking on button "Disconnect"
 */
function WebSocket_Disconnect() {
    console.log('>> WebSocket_Disconnect Debut ');

    webSocket   = null;
    ws_protocol = null;
    ws_hostname = null;
    ws_port     = null;
    ws_endpoint = null;

    console.log('>> WebSocket_Disconnect Fin ');
}
/**
 * Open a new WebSocket connection using the given parameters
 */
function openWSConnection(protocol, hostname, port, endpoint) {
    var webSocketURL = null;
    webSocketURL = protocol + "://" + hostname + ":" + port + endpoint;

    console.log("Client WebSocket openWSConnection::Connecting to: " + webSocketURL);
    try {
        webSocket = new WebSocket(webSocketURL);

        webSocket.onopen = function(openEvent) {
            console.log("Client WebSocket OPEN: " + JSON.stringify(openEvent, null, 4));
        };

        webSocket.onclose = function (closeEvent) {
            console.log("Client WebSocket CLOSE: " + JSON.stringify(closeEvent, null, 4));
        };

        webSocket.onerror = function (errorEvent) {
            console.log("Client WebSocket ERROR: " + JSON.stringify(errorEvent, null, 4));
        };

        webSocket.onmessage = function (messageEvent) {
            // La structure recu dans la partie .data est une struture JSON composé de 
            // msg = string pour le titre du message
            // data = tableau d'objet des informations envoyées
            let obj = JSON.parse(messageEvent.data);
            let wsMsg = obj.msg;

            console.log("Client WebSocket MESSAGE: " + wsMsg, messageEvent);
            // Notre message contient "Devis" --> nous affichons la cloche pour alerter 
            // que des nouveaux devis sont arrivés
            if (wsMsg.indexOf("Devis") > 0) {
                //$("#alerteDevis").removeClass('d-none');

                // http://bootstrap-notify.remabledesigns.com/#documentation
                $.notify({
                    icon: 'icon-Mail info-icon',
                    title: '<strong>Information importante</strong>',
                    message: `Une nouvelle demande vient d'être enregistrée.`,
                    target: '_blank'
                },{
                    type: "info",
                    offset: 20,
                    spacing: 10,
                    z_index: 1031,
                    width : 400,
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                    },
                    icon_type: 'class',
                    template: '<div data-notify="container" class="col-11 cold-md-6 col-sm-3 alert alert-{0}" role="alert">' +
                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                        '<span data-notify="icon"></span> ' +
                        '<span data-notify="title">{1}</span> ' +
                        '<span data-notify="message">{2}</span>' +
                        '<div class="progress" data-notify="progressbar">' +
                            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                        '</div>' +
                        '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    '</div>' 
                });
            } 
        };
    } catch (exception) {
        console.error(exception);
    }
}
/**
 * Send a message to the WebSocket server
 */
function WebSocket_SendMessage(msg, data, broadcast = false) {
    if (webSocket){
        if (webSocket.readyState != WebSocket.OPEN) {
            //console.error("webSocket is not open: " + webSocket.readyState);
            return;
        }

        if (broadcast){
            msg = "broadcast: " + msg;
        }

        // var datas = {};
        // datas.msg = msg;
        // datas.data = data;
        // webSocket.send( JSON.stringify( datas) );

        webSocket.send( JSON.stringify( {msg : msg, data : data }) );
    }
}
