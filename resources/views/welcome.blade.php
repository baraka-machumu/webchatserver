<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/main.css') }}">
    {{--<link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/search.css') }}">--}}

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>

<div class="main-container">


    <div class="sidebar">

        <div class="user-body">

            <div class="search-body">
                <form>

                    <div class="form-inline">
                        <input type="text" class="form-control" placeholder="&#128269; Search..." style="width: 90%; margin-right: 5%; margin-top: 1%; margin-left: 5%">
                    </div>
                </form>
            </div>

            <div class="users-list">


                <ul class="contacts" id="ul-list">


                    <li class="active" id="1"><a href="#">

                            <div class="img_cont">
                                <img src="{{URL::asset('public/images/avatar.png')}}" class="rounded-circle user_img" width="50" height="50">
                                <span class="online_icon"></span>
                            </div>

                            <div class=" user_info">
                                <span>Maryam Naz</span>
                                <p>Maryam is online</p>
                            </div>

                        </a>
                    </li>
                    <li class="active" id="2"><a href="#">

                            <div class="img_cont">
                                <img src="{{URL::asset('public/images/avatar.png')}}"  class="rounded-circle user_img" width="50" height="50">
                                <span class="online_icon"></span>
                            </div>

                            <div class=" user_info">
                                <span>Maryam Naz</span>
                                <p>Maryam is online</p>
                            </div>

                        </a>
                    </li>
                </ul>

            </div>

        </div>

    </div>

    <div class="content" id="content">

        <span style="background-color: #f4f6f9; height: 100px;">Hellow Dating chat app.</span>

    </div>

</div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="{{ \Illuminate\Support\Facades\URL::asset('public/js/chat.js')}} " type="text/javascript"></script>

</html>