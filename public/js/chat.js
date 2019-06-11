

var conn = new WebSocket('ws://localhost:8090');
conn.onopen = function(e) {
    console.log("Connection established!");

    var userId  =  $("#userId").val();
    conn.send(JSON.stringify({command: "register", userId: userId}));

};


conn.onmessage=  function (e) {

    console.log(e.data);

    var data = JSON.parse(e.data);

    var row ="<div class='outgoing-message'><div class='sent-msg'>" +data.message+
              "</div></div>";

    //
    // var rowReceived ="<div class='incoming-message'><div class='received-msg'>" +data.message+
    //     "</div></div>";


    if(data.command==="message"){

        $(".message-chats-display").append(row);
    }

};


$(document).ready(function () {

    var userData =  [];

    $("#ul-list li").click(function (e) {

        var receiverId =  $(this).attr('id');
        var userId  =  $("#userId").val();


        var usernameDisplay =$(this).find('.username').text();
        var image =$(this).find('.image').text();


        userData.push(receiverId);
        userData.push(userId);
        userData.push(usernameDisplay);

        $(".c-content").html("");

        var content= "<div class='c-content-header'>  <img src='"+image+"' class='rounded-circle user_img' width='40' height='40'>"+
            "  "+usernameDisplay+
            "</div>"+
            "<div class='message-chats-display'>" +
            "" +
            "<input type='hidden' value='"+receiverId+"' id='receiver-id'>"+
            "<input type='hidden' value='"+userId+"' id='sender-id'>"+
            // "<input type='hidden' value='"+senderName+"' id='sender-name'>"+

            "" +
            // "<div class='outgoing-message'><div class='sent-msg'>" +
            // "hello world , how are you this time" +
            // "</div></div>" +
            // "" +
            // " <div class='incoming-message'><div class='received-msg'>" +
            // "hello world , how are you this time gggdshdghsd " +
            // "niko byeeeeeeeeeeeee</div>" +
            "</div>"  +
            "" +
            "<div class='c-textField-box'>" +
            " <form method='post'><div class='row'><div class='col-md-10'><textarea id='chat-msg' style='margin-top: 5px; height: 40px;' class='form-control' placeholder='Enter message'></textarea></div>" +
            "<div class='col-md-2'><button id='send' type='button' class='btn btn-primary send' style='margin-top: 5px; height: 40px;'>Send</button></div>" +
            "</div></form>" +
            "</div>";

        $(".c-content").html(content);

    });


    $('.c-content').on("click","button.send",function (e) {

       var message =  $('#chat-msg').val();
        var senderId =  $('#sender-id').val();
        var receiverId =  $('#receiver-id').val();

        console.log(userData);

        userData=[];
        // alert(message+" sender "+senderId+" reciver "+receiverId);

        var senderMsg ="<div class='incoming-message'><div class='received-msg'>" +message+
            "</div></div>";

        $(".message-chats-display").append(senderMsg);

        conn.send(JSON.stringify({command: "message", from:senderId, to: receiverId, message: message}));



        // $("#chat-msg").val("");

    });



});