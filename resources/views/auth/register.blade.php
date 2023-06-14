<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/register.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="form-container">
            <div class="form-header">
                <div class="text-center mt-4 mb-2 name">
                    Form Register
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-field d-flex align-items-center">
                            <span class="far fa-user"></span>
                            <input id="name" type="text" placeholder="Masukkan Username"
                                @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"
                                required autocomplete="Username" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-field d-flex align-items-center">
                            <span class="far fa-user"></span>
                            <input id="email" type="email" placeholder="Masukkan Email"
                                @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-field d-flex align-items-center">
                            <span class="far fa-key"></span>
                            <input id="password" type="password" placeholder="Masukkan Password"
                                @error('password') is-invalid
                    @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-field d-flex align-items-center">
                            <span class="far fa-key"></span>
                            <input id="password-confirm" type="password" placeholder="Konfirmasi Password"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                    <div class="logo-container">
                        <div class="logo">
                            <img src="{{ asset('storage/images/assets/Gadget.png') }}" alt="logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
