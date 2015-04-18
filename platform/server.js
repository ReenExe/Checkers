/**
 * sources:
 *  1. http://socket.io/get-started/chat/
 *  2. http://socket.io/docs/
 */

var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

app.get('/', function (req, res) {
    res.send('Platform Side Api');
});

io.sockets.on('connection', function(socket) {
    socket.emit('connected', {message: 'Platform Side'});
});

http.listen(8000, function() {
    console.log("Server start");
});