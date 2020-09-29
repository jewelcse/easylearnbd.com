


@extends('layouts.app')
{{--<link rel="stylesheet" href="{{url('asset/bootstrap/css/bootstrap.min.css')}}">--}}


@section('content')
    <!-- Begin Site Title
================================================== -->

    <div class="container">
        <h3 class="text-dark mb-4">{{$user->first_name." "}}{{$user->last_name}}'s Profile</h3>
        <div class="row mb-3">
            <div class="col-lg-4">
                <div class="card mb-3">

{{--                    {{ URL::to('/') }}/images/{{$photo}}--}}
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">

                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body text-center shadow">
                        <img
                            style="width:150px; height:150px;border-radius: 50%"
                            class="rounded-circle mb-3 mt-4"
                            src="{{ URL::to('/') }}/images/{{$user->avater}}" >


                                <form action="{{route('user.profile.photoUpload')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <input type="file" name="avater" >
                                </div>

                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success">Edit Photo</button>
                                </div>

                            </div>
                        </form>
{{--                        <div class="mb-3"><button class="btn btn-primary btn-sm" type="button">Change Photo</button></div>--}}
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text-primary font-weight-bold m-0">Projects</h6>
                    </div>
                    <div class="card-body">
                        <h4 class="small font-weight-bold">Server migration<span class="float-right">20%</span></h4>
                        <div class="progress progress-sm mb-3">
                            <div class="progress-bar bg-danger" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"><span class="sr-only">20%</span></div>
                        </div>
                        <h4 class="small font-weight-bold">Sales tracking<span class="float-right">40%</span></h4>
                        <div class="progress progress-sm mb-3">
                            <div class="progress-bar bg-warning" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"><span class="sr-only">40%</span></div>
                        </div>
                        <h4 class="small font-weight-bold">Customer Database<span class="float-right">60%</span></h4>
                        <div class="progress progress-sm mb-3">
                            <div class="progress-bar bg-primary" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><span class="sr-only">60%</span></div>
                        </div>
                        <h4 class="small font-weight-bold">Payout Details<span class="float-right">80%</span></h4>
                        <div class="progress progress-sm mb-3">
                            <div class="progress-bar bg-info" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"><span class="sr-only">80%</span></div>
                        </div>
                        <h4 class="small font-weight-bold">Account setup<span class="float-right">Complete!</span></h4>
                        <div class="progress progress-sm mb-3">
                            <div class="progress-bar bg-success" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="sr-only">100%</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row mb-3 d-none">
                    <div class="col">
                        <div class="card text-white bg-primary shadow">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col">
                                        <p class="m-0">Peformance</p>
                                        <p class="m-0"><strong>65.2%</strong></p>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                </div>
                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-success shadow">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col">
                                        <p class="m-0">Peformance</p>
                                        <p class="m-0"><strong>65.2%</strong></p>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                </div>
                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Profile Settings</p>
                            </div>
                            <div class="card-body">
                                @if (session('status1'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status1') }}
                                    </div>
                                @endif
                                <form method="post" action="{{route('user.profile.update')}}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="first_name"><strong>First Name</strong></label>
                                                <input class="form-control" type="text" placeholder="John" value="{{$user->first_name}}" name="first_name">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="last_name"><strong>Last Name</strong></label>
                                                <input class="form-control" type="text" placeholder="Doe" value="{{$user->last_name}}" name="last_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="email"><strong>Email Address</strong></label>
                                                <input readonly id="emailSetting" class="form-control" type="email" placeholder="user@example.com" value="{{$user->email}}" name="email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="bio"><strong>Bio</strong><span style="color: red">-(must be less than 200 words)</span><br></label>
                                            <textarea
                                                style="height: 100px;"
                                                class="form-control"
                                                rows="4"
                                                name="bio"
                                                id="profile-body">
                                                 {{$user->bio}}
                                                </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group"><button class="btn btn-primary btn-sm ml-3" type="submit">Save Settings</button></div>
                                </form>
                            </div>
                        </div>


{{--                        <div class="card shadow">--}}
{{--                            <div class="card-header py-3">--}}
{{--                                <p class="text-primary m-0 font-weight-bold">Contact Settings</p>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                @if (session('status'))--}}
{{--                                    <div class="alert alert-success" role="alert">--}}
{{--                                        {{ session('status') }}--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                                <form method="post" action="{{url('updateOrCreateUserSettings/')}}">--}}
{{--                                    @csrf--}}
{{--                                    <div class="form-row">--}}
{{--                                        <div class="col">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="address"><strong>Web site</strong></label>--}}
{{--                                                <input--}}
{{--                                                    class="form-control"--}}
{{--                                                    type="text"--}}
{{--                                                    placeholder="www.google.com"--}}
{{--                                                    name="web_link">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="address"><strong>Facebook</strong></label>--}}
{{--                                                <input--}}
{{--                                                    class="form-control"--}}
{{--                                                    type="text"--}}
{{--                                                    placeholder="www.facebook.com"--}}
{{--                                                    name="fb_link">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="address"><strong>Twitter</strong></label>--}}
{{--                                                <input--}}
{{--                                                    class="form-control"--}}
{{--                                                    type="text"--}}
{{--                                                    placeholder="www.twitter.com"--}}
{{--                                                    name="twr_link">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="address"><strong>Instagram</strong></label>--}}
{{--                                                <input--}}
{{--                                                    class="form-control"--}}
{{--                                                    type="text"--}}
{{--                                                    placeholder="www.instagram.com"--}}
{{--                                                    name="insta_link">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="bio"><strong>Bio</strong><br></label>--}}
{{--                                                <textarea--}}
{{--                                                    class="form-control"--}}
{{--                                                    rows="4"--}}
{{--                                                    name="bio">--}}
{{--                                                </textarea>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Save&nbsp;Settings</button></div>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}



                    </div>
                </div>
            </div>
        </div>
    </div>
