<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Register-Easylearnbd</title>

    <link rel="stylesheet" href="{{url('asset/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i')}}">
    <link rel="stylesheet" href="{{url('asset/fonts/fontawesome-all.min.css')}}">


</head>



<body class="bg-gradient-primary">
<div class="container">
    <div class="card shadow-lg o-hidden border-0 my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-5 d-none d-lg-flex">
                    <div class="flex-grow-1 bg-register-image" style="background-image: url({{ asset('asset/img/reg-min.jpg') }});"></div>
                </div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h4 class="text-dark mb-4">Create an Account!</h4>
                        </div>
                        <form class="user" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input
                                        class="form-control form-control-user @error('first_name') is-invalid @enderror"
                                        type="text"
                                        id="first_name"
                                        placeholder="First Name"
                                        name="first_name"
                                        value="{{ old('first_name') }}"
                                        required
                                        autocomplete="first_name"
                                        autofocus>

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-6">
                                    <input
                                        class="form-control form-control-user @error('last_name') is-invalid @enderror"
                                        type="text"
                                        id="last_name"
                                        placeholder="Last Name"
                                        name="last_name"
                                        value="{{ old('last_name') }}"
                                        required
                                        autocomplete="last_name"
                                        autofocus>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <input
                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                    type="email"
                                    id="email"
                                    aria-describedby="emailHelp"
                                    placeholder="Email Address"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input
                                        class="form-control form-control-user @error('password') is-invalid @enderror"
                                        type="password"
                                        id="password"
                                        placeholder="Password"
                                        name="password"
                                        required
                                        autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-sm-6">
                                    <input
                                        class="form-control form-control-user"
                                        type="password"
                                        id="password-confirm"
                                        placeholder="Repeat Password"
                                        name="password_confirmation"
                                        required
                                        autocomplete="new-password">
                                </div>


                            </div><button class="btn btn-primary btn-block text-white btn-user" type="submit">Register Account</button>
                            <hr><a class="btn btn-primary btn-block text-white btn-google btn-user" role="button"><i class="fab fa-google"></i>&nbsp; Register with Google</a><a class="btn btn-primary btn-block text-white btn-facebook btn-user" role="button"><i class="fab fa-facebook-f"></i>&nbsp; Register with Facebook</a>
                            <hr>
                        </form>
                        <div class="text-center"><a class="small" href="{{url('/password/reset')}}">Forgot Password?</a></div>
                        <div class="text-center"><a class="small" href="{{url('/login') }}">Already have an account? Login!</a></div>
                        <div class="text-center"><a class="small" href="{{url('/')}}">Home</a></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>







