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
                        <p class="login-box-msg">Forgot Password Form</p>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif
                        <form action="{{route('password.email')}}" method="POST">
                            @csrf
                            @error('email')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                            <div class="input-group mb-3">
                                <input name="email" type="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary btn-block">Send Reset Link</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>    
@endsection
