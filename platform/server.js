/**
 * sources:
 *  1. http://socket.io/get-started/chat/
 *  2. http://socket.io/docs/
 */

var app = require('express')();
var http = require('http');
var server = http.Server(app);
var io = require('socket.io')(server);
var request = require('request');

app.get('/', function (req, res) {
    res.send('Platform Side Api');
});

app.get('/python-flask-player-check', function(req, res) {
    /**
     * TODO: need request for Python Player
     */
    res.send('Player Check');
});

io.sockets.on('connection', function(socket) {
    socket.emit('connected', {message: 'Platform Side'});

    socket.on('tic-tac:start', function() {

        var CHOOSES = {
            X: 'X',
            0: '0'
        };

        socket.emit('tic-tac:choose', CHOOSES);

        var players;

        var getOtherChoose = function(inChoose) {
            for (var choose in CHOOSES) {
                if (choose == inChoose) continue;

                return choose;
            }
        };

        var setPlayerChoose = function(firstPlayerChoose) {
            players = {
                first: firstPlayerChoose,
                second: getOtherChoose(firstPlayerChoose)
            };
        };

        socket.on('tic-tac:choose:set', function(choosed) {
            if (CHOOSES[choosed]) {
                setPlayerChoose(choosed);

                return request.get('http://127.0.0.1:5000/start', function(error, response, body) {
                    socket.emit('tic-tac:partner:connect', body)
                });
            }

            socket.emit('tic-tac:choose', CHOOSES);
        })

    });
});

server.listen(8000, function() {
    console.log("Server start");
});