<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>GMF </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="{{ asset('css\style.css')}}" rel="stylesheet" type="text/css">


</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form  method="POST" action="{{ route('login') }}" class="form-group">
                                        @csrf
                                        
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="email"  id="email" name="email" class="form-control" required>
                                            @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password" required>
                                            @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">

                                            <div class="form-group">
                                                <a href="{{ route('password.request')}}">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me in</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('vendor\global\global.min.js') }}"></script>
    <script src="{{ asset('js\quixnav-init.js') }}"></script>
    <script src="{{ asset('js\custom.min.js') }}"></script>

</body>

</html>
