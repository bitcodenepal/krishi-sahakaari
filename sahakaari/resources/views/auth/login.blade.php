<!DOCTYPE html>
<html lang="en">
<head>
    <title>टंकीसिनवारी कृषि उपज बजार ब्यबस्थापन सहकारी संस्था ली.</title>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('css/font-awesome.min.css') }}"/>
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
        <h2>टंकीसिनवारी कृषि उपज बजार ब्यबस्थापन सहकारी संस्था ली.</h2>
    </div>
    <div class="login-box">
        <form class="login-form" action="{{ route('login') }}" method="POST" role="form">
            @csrf
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
            <div class="form-group">
                <label class="control-label" for="email">Email Address (इमेल ठेगाना)</label>
                <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email"
                       placeholder="Email address" autofocus
                       value="{{ old('email') }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="control-label" for="password">Password (पासवोर्ड)</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" id="password"
                       name="password" placeholder="Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><span
                        class="label-text"> Remember Me</span>
                </label>
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN
                </button>
            </div>
        </form>
    </div>
</section>
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
