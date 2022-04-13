@extends('auth.templates.default')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="register-box">
                <div class="register-logo">
                    <a href="{{url('/')}}"><b>Camelia Metal</b></a>
                </div>
                <div class="card">
                    <div class="card-body register-card-body">
                        <p class="login-box-msg">Reset Password Form</p>
                        <form action="{{route('password.update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{$request->route('token')}}">
                            @error('email')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                            <div class="input-group mb-3">
                                <input name="email" type="email" class="form-control" placeholder="Email" value="{{old('email',$request->email)}}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            @error('password')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                            <div class="input-group mb-3">
                                <input name="password" type="password" class="form-control" placeholder="Password" value="{{old('password')}}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input name="password_confirmation" type="password" class="form-control" placeholder="Retype password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>    
@endsection
