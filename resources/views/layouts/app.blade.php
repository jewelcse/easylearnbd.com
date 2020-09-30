<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Easylearnbd') }}</title>
    <style>

        #textPrevent,
        #emailSetting{
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }






    </style>

    <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{url('assets/css/mediumish.css')}}" rel="stylesheet">
    <link href="{{url('css/custom.css')}}" rel="stylesheet">

    <link href="{{url('assets/css/Footer-Dark.css')}}" rel="stylesheet">

    <link href="{{url('assets/tags/bootstrap-tagsinput.css')}}" rel="stylesheet">


    <link href="{{url('css/prism.css')}}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

{{--    <link rel="stylesheet" href="{{url('asset/bootstrap/css/bootstrap.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i')}}">--}}
{{--    <link rel="stylesheet" href="{{url('asset/fonts/fontawesome-all.min.css')}}">--}}


</head>
<body>

        <!-- Begin Nav-->
        <nav class="navbar navbar-toggleable-md navbar-light bg-white fixed-top mediumnavigation">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                    aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container">
                <!-- Begin Logo -->
                <a id="textPrevent" class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{url('assets/img/logo.png')}}" alt="logo">
                </a>
                <!-- End Logo -->
                <div class="collapse navbar-collapse" id="navbarsExampleDefault">

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <!-- Begin Search -->
{{--                            <form class="form-inline my-2 my-lg-0">--}}
{{--                                <input class="form-control mr-sm-2" type="text" placeholder="Search" style="width: 400px;margin-left: 30px">--}}
{{--                                <span class="search-icon">--}}
{{--						        <svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25">--}}
{{--							        <path d="M20.067 18.933l-4.157-4.157a6 6 0 1 0-.884.884l4.157 4.157a.624.624 0 1 0 .884-.884zM6.5 11c0-2.62 2.13-4.75 4.75-4.75S16 8.38 16 11s-2.13 4.75-4.75 4.75S6.5 13.62 6.5 11z"></path>--}}
{{--						        </svg>--}}
{{--					        </span>--}}
{{--                            </form>--}}
                            <!-- End Search -->
                        </li>
                    </ul>


                    <!-- Begin Menu -->
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('story.create') }}">Create Story</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link btn btn-outline-success" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                            </li>--}}
{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link btn btn-outline-success" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="position: relative;padding-left:50px;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img
                                        style="width:32px; height:32px;position:absolute;top: 5px;left: 10px;border-radius: 50%"
                                        class="rounded-circle"
                                        src="{{ URL::to('/') }}/images/{{Auth::user()->avater}}" >

                                    {{ Auth::user()->first_name." "}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{route('user.profile')}}">Profile</a>
                                    <a class="dropdown-item" href="{{route('story.index')}}">State</a>
                                    <a class="dropdown-item" href="{{route('author.stories')}}">Stories</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endguest

                    </ul>
                    <!-- End Menu -->

                </div>
            </div>
        </nav>
        <!-- End Nav -->

        <div class="">
            @yield('content')
        </div>

        <!-- Begin Footer-->
        <div class="footer bg">
            <div class="container">
                <div class="row" style="color: black">
                    <div class="col-sm-6 col-md-3 item">

                        <ul>

                            @guest
                                <h3 class="text-center">Be part of Our Community! now,</h3>
                                <li class="nav-item">
                                    <a class="nav-link btn btn-outline-success" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-outline-success" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <h3 class="text-center">Make Awesome</h3>
<span>Thanks! for joining with us, let's publish your story </span>
                            @endguest

                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item style="color: black"">
                        <h3>About</h3>
                        <ul>
                            <li>
                                <a href="#">Company</a>
                            </li>
                            <li>
                                <a href="#">Team</a>
                            </li>
                            <li>
                                <a href="#">Careers</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text" style="color: black">
                        <h3>Company Name</h3>
                        <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut vehicula rhoncus elementum. Etiam
                            quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo.</p>
                    </div>
                    <div class="col item social" style="color: black">
                        <a href="#">
                            <i class="icon ion-social-facebook"></i>
                        </a>
                        <a href="#">
                            <i class="icon ion-social-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="icon ion-social-snapchat"></i>
                        </a>
                        <a href="#">
                            <i class="icon ion-social-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>



{{--            <div class="row">--}}
{{--                <p class="col-md-3">--}}
{{--                    Copyright &copy; 2020 Easylearnbd.com--}}
{{--                </p>--}}

{{--                <p class="col-md-2"><a href="">About us</a></p>--}}
{{--                <p class="col-md-2"><a href="">Contact us</a></p>--}}
{{--                <p class="col-md-2"><a href="">Privacy Policy</a></p>--}}
{{--                <p class="col-md-2"><a href="">Terms and Conditions</a></p>--}}
{{--                <p class="col-md-2">--}}
{{--                    Inspired by--}}
{{--                    <a target="_blank" href="https://www.medium.com">Medium.com</a>--}}
{{--                </p>--}}
{{--            </div>--}}


            <div class="clearfix"></div>
        </div>
        <!-- End Footer-->


        <script src="{{url('assets/js/jquery.min.js')}}"></script>
        <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{url('assets/js/ie10-viewport-bug-workaround.js')}}"></script>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
            crossorigin="anonymous"></script>

{{--        Tinymcse editor script--}}

        <script src="{{url('tinymce/plugin/tinymce/tinymce.min.js')}}"></script>
        <script src="{{url('tinymce/plugin/tinymce/init-tinymce.js')}}"></script>

{{--        codesmaple design script--}}

{{--        <script src="{{url('tinymce/plugin/prism.js')}}"></script>--}}

        <script src="{{url('assets/tags/bootstrap-tagsinput.js')}}"> </script>
        <script SRC="{{url('js/prism.js')}}"></script>




</body>
</html>
