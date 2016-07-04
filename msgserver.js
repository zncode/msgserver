var http = require('http');
var socket_io = require('socket.io');

var server = http.createServer(function(req, res){
//    res.writeHead(200, {'Content-type': 'test/html'});
 console.log('call');
    res.end('Hello!');
});

server.listen(1234, function(){
    console.log('Server listening at port 1234');
});

io = socket_io.listen(server);

var messages = [];

io.on('connection', function(socket){
    console.log('tt');
    socket.emit('news', {hello: 'world'});

    socket.on('message', function(msg){
        console.log(msg);
        messages.push(msg);
    });

    messages.forEach(function(msg){
        socket.send(msg);
    });
});
 
