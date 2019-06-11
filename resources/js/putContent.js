

$("#ul-list li").click(function (e) {


    var id =  $(this).attr('id');

    var content= "<div class='content-header'> Hello content header "+id +
                  "</div>"+
                   "<div class='message-chats-display'> hellow messages"+id+"</div>"+
                   "<div class='textField-box'>hellow text field box</div>"
    ;

    $("#content").html(content);


});