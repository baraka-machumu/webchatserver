

$(document).ready(function (e) {


    var users = [];

    $.get('user/json/search',function (data) {

        for(var i=0; i<data.length; i++){

            users.push(data[i].name);
            console.log(data[i].name);
        }

    });

    $("#search-friend").on("keydown",function (e) {

        $( "#search-friend" ).autocomplete({
            source: users,
            select:function (event ,ui) {

                $("#search-friend").val(ui.item.value);
                $("#friend-submit").click();

            }
        });
    });



    $(".send-friend-request").click(function (e) {


        $(".loader").show("fast");

        var friendIdFromButton = this.id.match(/\d+/);


        var userId= $("#search-userId").val();

        var friendId=  $("#search-friendId-"+friendIdFromButton).val();


        // console.log("user id = "+userId+" friend id ="+friendId);
        $.ajax({
            type:"post",
            url:"/webchatserver/friend/request/add",
            data:{userId:userId,friendId:friendId,status:0,  "_token": $('#token').val()},
            success:function (data) {

                if (data==1){

                    console.log(data);

                    var fid = 'cancel-request-'+friendIdFromButton;

                    $("#send-friend-request-"+friendIdFromButton).hide();
                    $(".action-request-"+friendIdFromButton).append("<button class='request-sent-cancel-"+friendIdFromButton+"'><i class='fas fa-user-plus'>" +
                        "</i>Request Sent </button><button id='cancel-request-"+friendIdFromButton+"' class='cancel-request'>Cancel now</button>");


                }
                else {

                    console.log("Fail");
                }
                $(".loader").hide();
            }
        });

    });


        $('.user-search-actions').on("click","button.cancel-request",function (e) {

        var friendId = this.id.match(/\d+/);



        var userId= $("#search-userId").val();



        $.ajax({
                type:"post",
            url:"/webchatserver/friend/request/cancel",
            data:{userId:userId,friendId:friendId,  "_token": $('#token').val()},
            success:function (data) {

                 if(data==1){


                     $("#cancel-request-"+friendId).remove();
                     $(".request-sent-cancel-"+friendId).remove();
                     $("#send-friend-request-"+friendId).show();


                 }


            }

        });

    });
    $('.cancel-request').click(function (e) {


        var friendId = this.id.match(/\d+/);

        var userId= $("#search-userId").val();

        $.ajax({
            type:"post",
            url:"/webchatserver/friend/request/cancel",
            data:{userId:userId,friendId:friendId,  "_token": $('#token').val()},
            success:function (data) {

                if(data==1){

                    $("#cancel-request-label-"+friendId).remove();
                    $("#btn-cancel-request-"+friendId).remove();
                    $("#send-friend-request-"+friendId).show();

                }

            }

        });

    });

    $('.accept-request').click(function (e) {

        var userId = this.id.match(/\d+/);

        var friendId= $("#search-userId").val();

        $.ajax({
            type:"post",
            url:"/webchatserver/friend/request/accept",
            data:{userId:userId,friendId:friendId,  "_token": $('#token').val()},
            success:function (data) {

                if(data==1){

                    $("#cancel-request-accept-"+userId).remove();
                    $("#btn-cancel-request-"+userId).remove();
                    $("#friend-"+userId).show();
                    $("#send-unfriend-request-"+userId).show();

                }

            }

        });

    });


    $('.user-search-actions').on("click","button.send-unfriend-request",function (e) {

        var friendId = this.id.match(/\d+/);

        var userId= $("#search-userId").val();

        $.ajax({
            type:"post",
            url:"/webchatserver/friend/request/unfriend",
            data:{userId:userId,friendId:friendId,  "_token": $('#token').val()},
            success:function (data) {

                console.log("data "+data);
                if(data==1){

                    $("#cancel-request-"+friendId).remove();
                    $(".request-sent-cancel-"+friendId).remove();
                    $("#send-friend-request-"+friendId).show();
                }

            }

        });

    });

    // ANIMATEDLY DISPLAY THE NOTIFICATION COUNTER.
    $('#noti_Counter')
        .css({ opacity: 0 })
        .text('7')  // ADD DYNAMIC VALUE (YOU CAN EXTRACT DATA FROM DATABASE OR XML).
        .css({ top: '-10px' })
        .animate({ top: '-2px', opacity: 1 }, 500);

    $('#noti_Button').click(function () {

        // TOGGLE (SHOW OR HIDE) NOTIFICATION WINDOW.
        $('#notifications').fadeToggle('fast', 'linear', function () {
            if ($('#notifications').is(':hidden')) {
                $('#noti_Button').css('background-color', '#2E467C');
            }
            // CHANGE BACKGROUND COLOR OF THE BUTTON.
            else $('#noti_Button').css('background-color', '#FFF');
        });

        $('#noti_Counter').fadeOut('slow');     // HIDE THE COUNTER.

        return false;
    });

    // HIDE NOTIFICATIONS WHEN CLICKED ANYWHERE ON THE PAGE.
    $(document).click(function () {
        $('#notifications').hide();

        // CHECK IF NOTIFICATION COUNTER IS HIDDEN.
        if ($('#noti_Counter').is(':hidden')) {
            // CHANGE BACKGROUND COLOR OF THE BUTTON.
            $('#noti_Button').css('background-color', '#2E467C');
        }
    });

    $('#notifications').click(function () {
        return false;       // DO NOTHING WHEN CONTAINER IS CLICKED.
    });
});

