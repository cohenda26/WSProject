var webSocket   = null;
var ws_protocol = null;
var ws_hostname = null;
var ws_port     = null;
var ws_endpoint = null;
/**
 * Event handler for clicking on button "Connect"
 */
function onConnectClick() {
    var ws_protocol = "ws";
    var ws_hostname = "localhost";
    var ws_port     = 3000;
    var ws_endpoint = "";
    openWSConnection(ws_protocol, ws_hostname, ws_port, ws_endpoint);
}
/**
 * Event handler for clicking on button "Disconnect"
 */
function onDisconnectClick() {
    webSocket.close();
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
            onSendClick();
            onDisconnectClick();
        };
        webSocket.onclose = function (closeEvent) {
            traceLog("Client WebSocket CLOSE: " + JSON.stringify(closeEvent, null, 4));
        };
        webSocket.onerror = function (errorEvent) {
            traceLog("Client WebSocket ERROR: " + JSON.stringify(errorEvent, null, 4));
        };
        webSocket.onmessage = function (messageEvent) {
            var wsMsg = messageEvent.data;
            traceLog("Client WebSocket MESSAGE: " + wsMsg);
            if (wsMsg.indexOf("error") > 0) {
                //document.getElementById("incomingMsgOutput").value += "error: " + wsMsg.error + "\r\n";
            } else {
                //document.getElementById("incomingMsgOutput").value += "message: " + wsMsg + "\r\n";
            }
        };
    } catch (exception) {
        console.error(exception);
    }
}
/**
 * Send a message to the WebSocket server
 */
function onSendClick() {
    if (webSocket.readyState != WebSocket.OPEN) {
        //console.error("webSocket is not open: " + webSocket.readyState);
        return;
    }
    //var msg = document.getElementById("message").value;
    var msg = "broadcast: Nouvelle demande de devis";
    webSocket.send(msg);
}


function WebSocket_SendNotification(){
    onConnectClick();

}