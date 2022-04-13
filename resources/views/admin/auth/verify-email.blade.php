@extends('admin.auth.templates.default')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="register-box">
                <div class="register-logo">
                    <a href="{{url('/')}}"><b>Camelia Metal</b></a>
                </div>
                <div class="card">
                    <div class="card-body register-card-body">                        
                        <p class="login-box-msg">Email Verification</p>
                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600">
                                A new email verification link has been emailed to you!
                            </div>
                        @endif
                        <div class="mb-4 font-medium text-sm text-green-600">
                            You must verify your email address to access this page.
                            <form action="{{route('verification.send')}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Resend verification email</button>
                            </form>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </section>    
@endsection
