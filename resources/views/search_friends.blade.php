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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>
<body>

<div class="main-container">

    <div class="navbar-body">

        <div class="profile-picture">


        </div>
        <div class="search-friend-box">
            <form action="{{url('/user/search')}}" method="get">

                <input type="text" placeholder="Find friends" id="search-friend" name="friend">

                <button type="submit" id="friend-submit" name="sfm" value="Search-form">Search</button>

            </form>


        </div>
        <div class="app-actions-events">

            <ul class="event-ul">
                <li><a href="{{url('chat')}}" class="btn btn-primary">Home</a></li>
                <li><a href="#" class="btn btn-primary">Requests <label style="color: white">(7)</label></a></li>

            </ul>

        </div>
    </div>
    {{--<div id="livesearch-results">sdsds</div>--}}

    <div class="content-body">

        <div class="search-c-sidebar" style="background-color: black">

            <div class="c-users-list">

                <ul class="c-users" id="ul-list">

                </ul>

            </div>

        </div>
        <div class="c-content-bar">

            <div class="c-content">


                <div class="search-result" style="background-color: white;">
                    <input type="hidden" value="{{ Auth::user()->id }}" id="search-userId">

                    <div class="search-header">
                        <span>Result</span>
                    </div>
                    @foreach($friendResult as $friend)
                        <div class="search-content">

                            <div class="s-rofile-picture">

                                <img  src="{{URL::asset($friend['image_path'])}}" class="rounded-img">

                            </div>

                            <div class="s-right-content">

                                <p>{{$friend['name']}}</p>

                            </div>

                            <div class="user-search-actions">
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                <div class="action-request  action-request-{{$friend['id']}}">
                                    <input type="hidden" id="search-friendId-{{$friend['id']}}" value="{{$friend['id']}}">

                                    {{--@if(in_array($friend['id'],$friendsId))--}}

                                    {{--<button type="button" id="friend-{{$friend['id']}}" class="friend">--}}

                                    {{--<i class="fas fa-check"></i>Friend--}}

                                    {{--</button>--}}
                                    {{--<button type="button" id="send-unfriend-request-{{$friend['id']}}" class="send-unfriend-request">--}}
                                    {{--Unfriend--}}
                                    {{--</button>--}}

                                    {{--@elseif(in_array($friend['id'],$pending))--}}

                                    {{--<button type="button" id="send-unfriend-request-{{$friend['id']}}" class="request-sent-cancel-{{$friend['id']}}">--}}
                                    {{--<i class='fas fa-user-plus'></i> Request Sent--}}
                                    {{--</button>--}}
                                    {{--<button class="'cancel-request" id="cancel-request-{{$friend['id']}}">Cancel now</button>--}}



                                    @if(\App\Http\Controllers\FriendController::checkFriend($friend['id'])==-1)


                                        @if(\App\Http\Controllers\FriendController::checkFriendRequest($friend['id'])==1)

                                            <button type="button" id="cancel-request-accept-{{$friend['id']}}" class="accept-request">
                                                <i class='fas fa-user-plus'></i> Accept
                                            </button>

                                            <button class="cancel-request" id="btn-cancel-request-{{$friend['id']}}">Cancel now</button>
                                        {{--@else--}}
                                        {{--<button type="button" id="send-friend-request-{{$friend['id']}}" class="send-friend-request">--}}
                                            {{--<i class="fas fa-user-plus"></i>--}}
                                            {{--Add Friend--}}
                                        {{--</button>--}}
                                        @endif

                                    @elseif(\App\Http\Controllers\FriendController::checkFriend($friend['id'])==0)

                                        <button type="button" id="cancel-request-label-{{$friend['id']}}">
                                            <i class='fas fa-user-plus'></i> Request Sent
                                        </button>
                                        <button class="cancel-request" id="btn-cancel-request-{{$friend['id']}}">Cancel now</button>


                                    @elseif(\App\Http\Controllers\FriendController::checkFriend($friend['id'])==1)
                                        <button type="button" id="friend-{{$friend['id']}}" class="friend">

                                            <i class="fas fa-check"></i>Friend

                                        </button>
                                        <button type="button" id="send-unfriend-request-{{$friend['id']}}" class="send-unfriend-request">
                                            Unfriend
                                        </button>
                                    @endif

                                    {{--@endif--}}


                                </div>
                            </div>

                        </div>
                        <div class="loader">

                        </div>
                        <hr>
                    @endforeach
                </div>


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