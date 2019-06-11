<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/main.css') }}">
{{--<link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/search.css') }}">--}}

<!-- jQuery library -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">



</head>
<body>

<div class="main-container">

    <div class="navbar-body">

        <div class="profile-picture">

           <span style="color: white">App</span>
        </div>
        <div class="search-friend-box">
            <form action="{{url('/user/search')}}" method="get">

                <input type="text" placeholder="Find friends" id="search-friend" name="friend">

                <button type="submit" id="friend-submit" name="sfm" value="Search-form">Search</button>

            </form>


        </div>
        <div class="app-actions-events">

            {{--<ul class="event-ul">--}}
                {{--<li><a href="#" class="btn btn-primary">Home</a></li>--}}
                {{--<li><a href="#" class="btn btn-primary">Requests <label style="color: white">(7)</label></a></li>--}}

                {{--<li id="notification_li">--}}

                    {{--<span id="notification_count">3</span>--}}
                    {{--<a href="#" id="notificationLink" class="">Notification</a>--}}

                    {{--<div id="notificationContainer">--}}
                        {{--<div id="notificationTitle">Notifications</div>--}}
                        {{--<div id="notificationsBody" class="notifications">--}}
                            {{--<p>hellow</p>--}}
                        {{--</div>--}}
                        {{--<div id="notificationFooter"><a href="#">See All</a></div>--}}
                    {{--</div>--}}

                {{--</li>--}}
            {{--</ul>--}}

            <div class="ul-element">
                <ul>
                    <li><a href="#" class="li">Home</a>
                    </li>
                    <li><a href="{{url('/friend')}}" class="li">Friends</a>
                    </li>
                    {{--<li id="noti_Container">--}}

                    {{--</li>--}}

                </ul>

            </div>

            <div class="not-container">

                <div id="noti_Counter"></div>   <!--SHOW NOTIFICATIONS COUNT.-->

                <!--A CIRCLE LIKE BUTTON TO DISPLAY NOTIFICATION DROPDOWN.-->
                <div id="noti_Button">N</div>

                <!--THE NOTIFICAIONS DROPDOWN BOX.-->
                <div id="notifications">
                    <h3>Notifications</h3>
                    <div style="height:300px;">


                    </div>
                    <div class="seeAll"><a href="#">See All</a></div>
                </div>
            </div>


        </div>
    </div>
    {{--<div id="livesearch-results">sdsds</div>--}}

    <div class="content-body">

        <div class="c-sidebar">

            <div class="c-users-list">

                <ul class="c-users" id="ul-list">

                    @foreach($friends as $friend)

                        <li class="active" id="{{$friend->friend_id}}"><a href="#">

                                <input type="hidden" value="{{ Auth::user()->id }}" id="userId">

                                <div class="img_cont">
                                    <img  src="{{URL::asset($friend->image_path)}}" class="rounded-circle user_img" width="50" height="50">
                                    <span class="online_icon"></span>
                                </div>

                                <div class=" user_info">
                                    <span class="username">{{$friend->name}}</span>
                                    <span class="image" hidden>{{$friend->image_path}}</span>
                                    <p>online</p>
                                </div>

                            </a>
                        </li>

                    @endforeach
                </ul>

            </div>

        </div>
        <div class="c-content-bar">

             <div class="c-content">

             </div>

        </div>
        <div class="far-right-bar">

            <p>updates feeds</p>
        </div>
    </div>
</div>
</body>

{{--<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>--}}
<script src="{{ \Illuminate\Support\Facades\URL::asset('public/js/chat.js')}} " type="text/javascript"></script>
<script src="{{ \Illuminate\Support\Facades\URL::asset('public/js/liveSearch.js')}} " type="text/javascript"></script>

</html>