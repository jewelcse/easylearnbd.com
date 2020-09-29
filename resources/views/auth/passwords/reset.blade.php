

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Forgot password-Easylearnbd</title>

    <link rel="stylesheet" href="{{url('asset/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i')}}">
    <link rel="stylesheet" href="{{url('asset/fonts/fontawesome-all.min.css')}}">

</head>

<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-6col-xl-6">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">Reset Password</h4>
                                </div>
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form class="user" method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="form-group">
                                        <input class="form-control form-control-user @error('email') is-invalid @enderror"
                                               type="email"
                                               id="exampleInputEmail"
                                               aria-describedby="emailHelp"
                                               value="{{ $email ?? old('email') }}"
                                               required
                                               autocomplete="email" a
                                               utofocus
                                               readonly
                                               placeholder="Enter Email Address..."
                                               name="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-md-12">
                                            <input id="password" type="password" placeholder="Enter new password..." class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">

                                        <div class="col-md-12">
                                            <input id="password-confirm" type="password" placeholder="Confirm password..." class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <button
                                        class="btn btn-primary btn-block text-white btn-user"
                                        type="submit"> {{ __('Reset Password') }}</button>
                                </form>
                                <br>
                                <div class="text-center"><a class="small" href="{{url('/')}}">Home</a></div>
                                <div class="text-center"><a class="small" href="{{url('/register')}}">Create an Account</a></div>
                                <div class="text-center"><a class="small" href="{{url('/login')}}">Login</a></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>










