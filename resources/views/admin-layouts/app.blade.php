<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Easylearnbd') }}</title>



    <link rel="stylesheet" href="{{url('admin-assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i')}}">
    <link rel="stylesheet" href="{{url('admin-assets/fonts/fontawesome-all.min.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="{{url('assets/tags/bootstrap-tagsinput.css')}}" rel="stylesheet">


    <link href="{{url('css/prism.css')}}" rel="stylesheet">

</head>

<body id="page-top">
<div id="wrapper">
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
        <div class="container-fluid d-flex flex-column p-0">
            <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                <div class="sidebar-brand-text mx-3"><span>Brand</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="nav navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="{{url('admin/dashboard')}}"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="{{url('admin/users')}}"><i class="fas fa-user"></i><span>Users table</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="{{url('admin/stories')}}"><i class="fas fa-table"></i><span>Stories Table</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="{{url('/admin/category')}}"><i class="far fa-user-circle"></i><span>Category</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="{{url('/admin/subscribers')}}"><i class="far fa-user-circle"></i><span>Subscribers</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="{{url('/admin/contact-list')}}"><i class="far fa-user-circle"></i><span>All Contacts</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="https://disqus.com/by/disqus_uqAhm3KPoP/" target="_blank"><i class="far fa-user-circle"></i><span>Comments</span></a></li>
            </ul>
            <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
        </div>
    </nav>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                    <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                        </div>
                    </form>
                    <ul class="nav navbar-nav flex-nowrap ml-auto">
                        <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                            <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto navbar-search w-100">
                                    <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                        <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                            <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" ><span class="badge badge-danger badge-counter" id="notification_count"></span><i class="fas fa-bell fa-fw"></i></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                     role="menu">
                                    <h6 class="dropdown-header">Notifications</h6>

                                    <div id="notification-item">

                                    </div>

{{--                                    <a class="d-flex align-items-center dropdown-item" href="#">--}}
{{--                                        <div class="mr-3">--}}
{{--                                            <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>--}}
{{--                                        </div>--}}
{{--                                        <div><span class="small text-gray-500">December 12, 2019</span>--}}
{{--                                            <p>A new monthly report is ready to download!</p>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}


                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                            <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-envelope fa-fw"></i><span class="badge badge-danger badge-counter">7</span></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                     role="menu">
                                    <h6 class="dropdown-header">alerts center</h6>

                                    <a class="d-flex align-items-center dropdown-item" href="#">
                                        <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="assets/img/avatars/avatar4.jpeg">
                                            <div class="bg-success status-indicator"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate"><span>Hi there! I am wondering if you can help me with a problem I've been having.</span></div>
                                            <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                        </div>
                                    </a>


                                   <a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a></div>
                            </div>
                            <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                        </li>
                        <div class="d-none d-sm-block topbar-divider"></div>
                        <li class="nav-item dropdown no-arrow" role="presentation">
                            <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                    <span class="d-none d-lg-inline mr-2 text-gray-600 small">admin</span>
                                    <img class="border rounded-circle img-profile" src=""></a>

                                <div
                                    class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

<div class="container-fluid">
    @yield('content')
</div>

        </div>
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Brand 2020</span></div>
            </div>
        </footer>

</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>

<script src="{{url('admin-assets/js/jquery.min.js')}}"></script>
<script src="{{url('admin-assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('admin-assets/js/chart.min.js')}}"></script>
<script src="{{url('admin-assets/js/bs-init.js')}}"></script>
<script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js')}}"></script>
<script src="{{url('admin-assets/js/theme.js')}}"></script>


{{--        Tinymcse editor script--}}

<script src="{{url('tinymce/plugin/tinymce/tinymce.min.js')}}"></script>
<script src="{{url('tinymce/plugin/tinymce/init-tinymce.js')}}"></script>



<script src="{{url('assets/tags/bootstrap-tagsinput.js')}}"> </script>
<script SRC="{{url('js/prism.js')}}"></script>

<script>
    $(document).ready(function() {
        $.ajax({
            type: 'GET',
            url: '{{url('/admin/get/notification')}}',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (response) {
                //console.log(response.html);
                $("#notification-item").html(response.html);
                $("#notification_count").html(response.count);
            }

        });
    });


    // onclick="getNotification()"

    {{--function getNotification(){--}}
    {{--    $.ajax({--}}
    {{--        type:'GET',--}}
    {{--        url:'{{url('/admin/get/notification')}}',--}}
    {{--        data:'_token = <?php echo csrf_token() ?>',--}}
    {{--        success:function(response){--}}
    {{--            //console.log(response.html);--}}
    {{--            $("#notification-item").html(response.html);--}}
    {{--            $("#notification_count").html(response.count);--}}

    {{--            //var data = JSON.parse(response);--}}
    {{--             console.log(JSON.stringify(response))--}}
    {{--            //--}}
    {{--            // //console.log(JSON.parse(response))--}}
    {{--            // var data = JSON.stringify(response);--}}
    {{--            // for(var i=0; i<data.length; i++) {--}}
    {{--            // console.log(data.notifications);--}}
    {{--            // }--}}


    {{--            // for (var i=0; data.length;i++){--}}
    {{--            //     console.log(data)--}}
    {{--            // }--}}
    {{--            // for(var i=0; i<data.length; i++){--}}
    {{--            //--}}
    {{--            //     var tr_str = "<tr>" +--}}
    {{--            //         "<td align='center'>" + id + "</td>" +--}}
    {{--            //         "</tr>";--}}
    {{--            //--}}
    {{--            //     $("#notification-item").append(tr_str);--}}
    {{--            // }--}}


    {{--            //$("#notification-item").html(data.html);--}}
    {{--            //console.log(data)--}}
    {{--            //console.log(JSON.stringify(response))--}}
    {{--            //console.log(data.notifications.title);--}}
    {{--            // var title = data--}}
    {{--            //--}}
    {{--            // var st = "";--}}
    {{--            // $.each(data, function(index,value){--}}
    {{--            //     st += "<p>"+data[index].title+"</p>";--}}
    {{--            // });--}}
    {{--            // $("#notification-item").html(st);--}}

    {{--            // for (var i=0; data.length;i++){--}}
    {{--            //     //$("#notification-item").html(data.title);--}}
    {{--            //     console.log(data.title)--}}
    {{--            // }--}}
    {{--        }--}}
    {{--    });--}}
   // }
</script>

</body>
</html>
