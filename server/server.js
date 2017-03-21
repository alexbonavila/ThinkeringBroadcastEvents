var app= require('express')();
var http= require('http').Server(app);
var io= require('socket.io')(http);
var Redis= require('ioredis')();

var redis = new Redis();

redis.psubscrive('', function (err, count) {
    console.log('Errors Subscriving to chanel')
});

redis.on();

io.emit('chat:missatge');

http.listen(3000, function () {
    console.log('Listening at port 3000')
});