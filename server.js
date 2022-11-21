const express = require('express')
const app = express()

//middlewares
//app.use(express.static('server'))


//Listen on port 3000
server = app.listen(3000)


//socket.io instantiation
const io = require("socket.io")(server,{ cors: { origin: '*' } })

const users = []; 

//listen on every connection
io.sockets.on('connection', (socket) => {
    console.log("Server connected okk: "+ socket.id);

    //var socketId = socket.id;
    //io.sockets.socket(socketId).emit('receive_notification');
    

    socket.on('display_customer_cart_data',(data) =>{
        console.log(" From Server connected: "+ data);
        socket.broadcast.emit('set_customer_cart_data', data);
    });


    socket.on('clear_customer_screen_server',(data) =>{
        console.log(" clear transaction: "+ data);
        socket.broadcast.emit('clear_customer_screen',data);
    });

    socket.on('search_customer_server',(data) =>{
        console.log(" Search customer : "+ data);
        socket.broadcast.emit('search_customer_pos',data);
    });

    socket.on('cash_transaction_server',(data) =>{
        socket.broadcast.emit('cash_transaction_from_customer');
    });

    socket.on('credit_card_transaction_server',(data) =>{
        socket.broadcast.emit('credit_card_transaction_from_customer');
    });

    socket.on('ebt_card_transaction_server',(data) =>{
        socket.broadcast.emit('ebt_card_transaction_from_customer');
    }); 

    socket.on('complete_client_transaction',(data) =>{
        socket.broadcast.emit('complete_transaction_customer',data);
    });

    socket.on('card_transaction_from_client',(data) =>{
        console.log(" card transaction reponse : "+ data);
        socket.broadcast.emit('card_complete_transaction_customer',data);
    }); 

    socket.on('ebt_transaction_from_client',(data) =>{
        console.log("ebt card transaction reponse : ");
        socket.broadcast.emit('ebt_complete_transaction_customer',data);
    }); 

    socket.on('ebt_client_transaction',(data) =>{
        console.log("ebt card transaction reponse : "+data);
        socket.broadcast.emit('ebt_transaction_customer',data);
    }); 

    // notification 

    socket.on('user_connect',(data) =>{

        users.push(data);
        // if(data.user_id == 25){
        //     socket.join('manager');
        //     io.sockets.in('manager').emit('receive_notification');
        // }
        //console.log("userconnect : "+data);
        for( var i=0, len=users.length; i<len; ++i ){
                var c = users[i];
                console.log("Client Connedted:"+c.socketId+":"+c.user_id);
        }
    });


    socket.on('user_disconnect',(data) =>{
        for( var i=0, len=users.length; i<len; ++i ){
            var c = users[i];
            console.log("disconnect code :"+data.socketId+":"+data.user_id);
            if(c.user_id == data.user_id){
                users.splice(i,1);
                break;
            }
        }

        for( var i=0, len=users.length; i<len; ++i ){
                var c = users[i];
                console.log("Client disconnect after :"+c.socketId+":"+c.user_id);
        }
    });

    


    socket.on('send_notification',(data) =>{
        console.log("send notification called");
        for( var i=0, len=users.length; i<len; ++i ){
           var c = users[i];
           var socketId = c.socketId;
           var user_id  = c.user_id;
           var sender_to = data.socketId;
           console.log("loop userid : send user_id :"+user_id+":"+data.user_id);
           console.log("connected socketId :"+socketId);
           //if (user_id == data.user_id){
           //if (user_id == 25){
                console.log("loop in connected socketId :"+socketId);
                io.to(socketId).emit('receive_notification');
                //socket.broadcast.emit('receive_notification');
           //}
        }
    
    });
        


})
