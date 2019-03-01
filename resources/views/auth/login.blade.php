@extends('template.login')

@section('content')
<!-- Begin Form -->
<div class="authentication-form mx-auto">
    <div class="logo-centered">
        <a href="db-default.html">
            <img src="assets/img/logo.png" alt="logo">
        </a>
    </div>
    {{-- <h3>Sign In To Elisyam</h3> --}}
    <form role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <div class="group material-input">
            <input type="email" name="email" autofocus required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Email</label>
        </div>
        <div class="group material-input">
            <input type="password" name="password" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Password</label>
        </div>
   
    <div class="row">
        {{-- <div class="col text-left">
            <div class="styled-checkbox">
                <input type="checkbox" name="checkbox" id="remeber">
                <label for="remeber">Remember me</label>
            </div>
        </div> --}}
        <div class="col text-right">
            <a href="pages-forgot-password.html">Forgot Password ?</a>
        </div>
    </div>
    <div class="sign-btn text-center">
        
        <button type="submit" class="btn btn-lg btn-gradient-01">
            Login
        </button>
    </div>
</form>
    <div class="register">
        Don't have an account? 
        <br>
        <a href="register/">Create an account</a>
    </div>
</div>
<!-- End Form -->               
@endsection

<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
