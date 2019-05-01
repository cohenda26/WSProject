var webSocket   = null;
var ws_protocol = null;
var ws_hostname = null;
var ws_port     = null;
var ws_endpoint = null;
/**
 * Event handler for clicking on button "Connect"
 */
function WebSocket_Connect() {
    var ws_protocol = "ws";
    var ws_hostname = "localhost";
    var ws_port     = 3000;
    var ws_endpoint = "";
    openWSConnection(ws_protocol, ws_hostname, ws_port, ws_endpoint);
}
/**
 * Event handler for clicking on button "Disconnect"
 */
function WebSocket_Disconnect() {
    if (webSocket){
        webSocket.close();
    }
    webSocket   = null;
    ws_protocol = null;
    ws_hostname = null;
    ws_port     = null;
    ws_endpoint = null;
}
/**
 * Open a new WebSocket connection using the given parameters
 */
function openWSConnection(protocol, hostname, port, endpoint) {
    var webSocketURL = null;
    webSocketURL = protocol + "://" + hostname + ":" + port + endpoint;
    traceLog("Client WebSocket openWSConnection::Connecting to: " + webSocketURL);
    try {
        webSocket = new WebSocket(webSocketURL);

        webSocket.onopen = function(openEvent) {
            traceLog("Client WebSocket OPEN: " + JSON.stringify(openEvent, null, 4));
        };

        webSocket.onclose = function (closeEvent) {
            traceLog("Client WebSocket CLOSE: " + JSON.stringify(closeEvent, null, 4));
        };

        webSocket.onerror = function (errorEvent) {
            traceLog("Client WebSocket ERROR: " + JSON.stringify(errorEvent, null, 4));
        };

        webSocket.onmessage = function (messageEvent) {
            // La structure recu dans la partie .data est une struture JSON composé de 
            // msg = string pour le titre du message
            // data = tableau d'objet des informations envoyées
            let obj = JSON.parse(messageEvent.data);
            let wsMsg = obj.msg;

            traceLog("Client WebSocket MESSAGE: " + wsMsg, messageEvent);
            // Notre message contient "Devis" --> nous affichons la cloche pour alerter 
            // que des nouveaux devis sont arrivés
            if (wsMsg.indexOf("Devis") > 0) {
                $("#alerteDevis").removeClass('d-none');
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

        var datas = {};
        datas.msg = msg;
        datas.data = data;
        webSocket.send( JSON.stringify( datas) );
    }
}
