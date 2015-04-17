var express = require('./node_modules/express/index'),
    http = require('http'),
    app = express();

http.createServer(app).listen(8000, function() {
    console.log("Server start");
});