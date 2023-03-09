<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />


    @stack('styles')

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    {{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</head>

<body>
    <header>
        <div class="container text-center">
            <a href="{{ route('homepage') }}"><img src="{{ asset('img/logologo@3x.png') }}" /></a>
            <div class="login text-right">
                <p>Login</p>
            </div>
            <div class="border-header" style="border-top: none"></div>
        </div>
    </header>

    <div>
        {{ $slot }}
    </div>

    <footer style="border-top: 1px solid #0b3841">
        <div class="container footer-padding d-flex" style="flex-direction: column">
            <div class="d-flex row footer-top" style="width: 100%">
                <div class="col-lg-7 d-flex footer-left">
                    <div class="col-lg-4">
                        <h4>Links</h4>
                        <p>Register as a Publisher</p>
                        <p>Register as an Agency</p>
                        <p>About Us</p>
                        <p>Link Hover</p>
                    </div>
                    <div class="col-lg-4">
                        <h4>Other</h4>
                        <p>About Us</p>
                        <p>Careers</p>
                        <p>Leadership</p>
                        <p>Privacy Notice</p>
                        <p>Cookie Policy</p>
                        <p>Sustainability</p>
                    </div>
                    <div class="col-lg-4">
                        <h4>Contact Us</h4>
                        <p>Email Us</p>
                        <p>+1 222 333-4444</p>
                        <p>Link</p>
                    </div>
                </div>
                <div class="col-lg-5 footer-right">
                    <a href="home-page.html"><img src="{{ asset('img/footerlogo@3x.png') }}" /></a>
                    <h5>
                        Blakely Tower - Jumeirah Beach Road - Dubai Marina - Dubai -
                        United Arab Emirates
                    </h5>
                </div>
            </div>
            <div class="d-flex justify-content-between footer-bottom align-items-center"
                style="border-top: solid 1px #0b3841">
                <a href="home-page.html"><img src="{{ asset('img/logo@3x.png') }}"
                        style="width: 152px; height: 58px" /></a>
                <div class="social-icon">
                    <a href="instagram.com/luxurytravelportal"><img
                            src="{{ asset('img/iconmonstr-instagram-11@3x.png') }}"
                            style="width: 29px; height: 28px" /></a>
                    <img src="{{ asset('img/iconmonstr-linkedin-1@3x.png') }}" style="width: 29px; height: 29px" />
                    <img src="{{ asset('img/iconmonstr-youtube-6@3x.png') }}" style="width: 30px; height: 26px" />
                </div>
                <p>COPYRIGHT 2023, LTP SYSTEMS OÜ</p>
            </div>
        </div>
    </footer>

    @stack('scripts')

    @include('layouts.notification')
</body>

</html>
