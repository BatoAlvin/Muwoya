
@extends('layouts.navigation')

@section('content')

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Change Password</h4>
                                    <form  method="POST" action="{{ route('changepassword.store')}}" class="form-group">
                                        <div class="card-body">
                                        @if (session('status'))
                                        <div class="alert alert-success" role='alert'>
                                            {{ session('status')}}
                                        </div>
                                        @elseif (session('error'))
                                        <div class="alert alert-danger" role='alert'>
                                            {{ session('error')}}
                                        </div>
                                            @endif

                                        @csrf

                                        <div class="form-group">
                                            <label><strong>Old Password</strong></label>
                                            <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror">
                                            @error('current_password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label><strong>New Password</strong></label>
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label><strong>Confirm Password</strong></label>
                                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                                            @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">


                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Change Password</button>
                                        </div>
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


</body>

 @endsection
