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
    console.log('Server WebSocket OPEN Connexion ');

    ws.on('close', (ws) => {
        console.log('Server WebSocket CLOSE Connexion ', ws);
    });

    //connection is up, let's add a simple simple event
    ws.on('message', (message) => {
        //log the received message and send it back to the client
        console.log('Server WebSocket Message Recu: %s', message);
        // ws.send(`Hello, you sent -> ${message}`);

        const broadcastRegex = /^broadcast\:/;

        if (broadcastRegex.test(message)) {
            message = message.replace(broadcastRegex, '');
    
            //send back the message to the other clients
            wss.clients
                .forEach(client => {
                    if (client != ws) {
                        client.send(`WebSocket : Message Partagé -> ${message}`);
                    }    
                });
            
        } else {
            ws.send(`WebSocket : Message envoyé -> ${message}`);
        }
    });

    //send immediatly a feedback to the incoming connection    
    ws.send('WebSocket : Connection en cours');
});

// =====================================
//
// Demarrage du Serveur sur le port 3000
//
// =====================================
server.listen(port, hostname, () => {
    console.log(`Server WebSocket actif : Port : ${server.address().port} :)`);
});





