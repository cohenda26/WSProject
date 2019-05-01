const express = require('express');
const path = require('path');


const http = require('http'),
      WebSocket = require("ws");


const port=3000;
const hostname='127.0.0.1';

const pathPublic = path.join(__dirname, '..', 'public');

// traceLog('dirname =', __dirname );
// traceLog('filename =', __filename); 

const app = express();
//initialize a simple http server
const server = http.createServer(app);
//initialize the WebSocket server instance
const wss = new WebSocket.Server({ server });


// Path definition PUBLIC
app.use(express.static(pathPublic));

// ==========================
//
// ROUTAGE d'URL
//
// ==========================

app.get('/', (req, res) => {
    // utilisation de render lors de l'utiliation de bhs)
    // 1er param : nom de la vue -- 2eme param : les params en mode tableau utilisable dans la vue avec {{title}}
    res.send('index', { title : 'Serveur NodeJS / Dispatch message'});
})

// ==========================
//
// Connexion WebSocket
//
// ==========================

wss.on('connection', (ws) => {
    let JSON_Obj = {};

    console.log('Server WebSocket OPEN Connexion ');

    ws.on('close', (ws) => {
        console.log('Server WebSocket CLOSE Connexion ', ws);
    });

    //connection is up, let's add a simple simple event
    ws.on('message', (message) => {

        JSON_Obj = JSON.parse(message);
        let msg = JSON_Obj.msg;

        //log the received message and send it back to the client
        console.log('Server WebSocket Message Recu: %s', msg);
        // ws.send(`Hello, you sent -> ${msg}`);

        const broadcastRegex = /^broadcast\:/;

        if (broadcastRegex.test(msg)) {
            JSON_Obj.msg = msg.replace(broadcastRegex, '');
    
            //Envoye du message aux autres Clients connecté aux server
            wss.clients
                .forEach(client => {
                    if (client != ws) {
                        //client.send(`WebSocket : Message Partagé -> ${msg}`);
                        client.send(JSON.stringify(JSON_Obj));
                    }    
                });
            
        } else {
            //ws.send(`WebSocket : Message envoyé -> ${message}`);
            ws.send(JSON.stringify(JSON_Obj));
        }
    });

    //Envoy d'un message pour signaler la connexion   
    JSON_Obj.msg = 'WebSocket : Connection en cours';
    JSON_Obj.data = undefined;
    ws.send(JSON.stringify( JSON_Obj));
});

// =====================================
//
// Demarrage du Serveur sur le port 3000
//
// =====================================
server.listen(port, hostname, () => {
    console.log(`Server WebSocket actif : Port : ${server.address().port} :)`);
});





