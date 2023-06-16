<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/contact.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="form-container">
            <div class="form-header">
                <div class="text-center mt-4 mb-2 name">
                    Contact Us
                </div>
            </div>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('contact.submit') }}">
                        @csrf


                        <div class="form-field d-flex align-items-center">
                            <span class="far fa-user"></span>
                            <input id="name" type="text" placeholder="Enter Your Name"
                                class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                                required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-field d-flex align-items-center">
                            <span class="far fa-envelope"></span>
                            <input id="email" type="email" placeholder="Enter Your Email"
                                class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-field d-flex align-items-center">
                            <span class="fas fa-phone"></span>
                            <input id="phone" type="tel" placeholder="Enter Your Phone Number"
                                class="@error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"
                                required autocomplete="phone">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-field d-flex align-items-center">
                            <textarea id="message" placeholder="Your Message" class="@error('message') is-invalid @enderror" name="message"
                                required style="height: 150px;">{{ old('message') }}</textarea>

                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                Submit
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
                    <div class="contact-button-container">
                        <button class="button">
                            <div class="button-container">
                                <span class="button-text">
                                    <span>Contact</span>
                                    <i class="fa-solid fa-phone"></i>
                                </span>
                                <span class="button-links">
                                    <a href="https://www.instagram.com/_u/fadly_agustin_">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                    <a href="https://www.facebook.com/profile.php?">
                                        <i class="fa-brands fa-facebook"></i>
                                    </a>
                                    <a href="https://www.linkedin.com/feed/">
                                        <i class="fa-brands fa-linkedin"></i>
                                    </a>
                                </span>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FontAwesome JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>

</html>
