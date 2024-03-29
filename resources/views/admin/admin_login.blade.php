<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login-Admin</title>

    <link rel="stylesheet" href="{{url('asset/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i')}}">
    <link rel="stylesheet" href="{{url('asset/fonts/fontawesome-all.min.css')}}">

</head>

<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-flex">
                            <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;asset/img/dogs/image3.jpeg&quot;);"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">Welcome Back Admin!</h4>
                                </div>

{{--                                @error('error')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{ $error }}</strong>--}}
{{--                                        </span>--}}
{{--                                @enderror--}}

                                <form class="user" method="POST" action="{{url('admin/login')}}">
                                    @csrf
                                    <div class="form-group">
                                        <input class="form-control form-control-user @error('email') is-invalid @enderror"
                                               type="email"
                                               id="exampleInputEmail"
                                               aria-describedby="emailHelp"
                                               value="{{ old('email') }}"
                                               required
                                               autocomplete="email" a
                                               utofocus
                                               placeholder="Enter Email Address..."
                                               name="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror


                                    </div>

                                    <div class="form-group">
                                        <input class="form-control form-control-user @error('password') is-invalid @enderror"
                                               type="password"
                                               id="exampleInputPassword"
                                               placeholder="Password"
                                               name="password"
                                               required
                                               autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
{{--                                    <div class="form-group">--}}
{{--                                        <div class="custom-control custom-checkbox small">--}}
{{--                                            <div class="form-check">--}}
{{--                                                <input--}}
{{--                                                    class="form-check-input custom-control-input"--}}
{{--                                                    type="checkbox"--}}
{{--                                                    name="remember"--}}
{{--                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                                <label class="form-check-label" for="remember">--}}
{{--                                                    {{ __('Remember Me') }}--}}
{{--                                                </label>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <button
                                        class="btn btn-primary btn-block text-white btn-user"
                                        type="submit"> {{ __('Login') }}</button>
                                    <hr>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
