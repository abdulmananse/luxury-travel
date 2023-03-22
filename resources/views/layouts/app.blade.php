<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}

        @yield('title')
    </title>

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css?_v' . rand(1000, 999999)) }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />


    @stack('styles')

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    {{-- <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script> --}}


</head>

<body style="background-color: #fff8f0;">
    <header>
        <div class="container text-center">
            <a href="{{ url('') }}"><img src="{{ asset('img') }}/logologo@3x.png" /></a>
        </div>
    </header>

    @auth
        <section class="backgroundColor">
            <div class="container">
                <div class="agents-menu">
                    {{-- @can('Manage Companies')
                        <a class="agents-a {{ Route::current()->uri == 'companies' ? 'active' : '' }}"
                            href="{{ route('companies.index') }}">Companies</a>
                    @endcan --}}
                    @can('Manage Agents')
                        <a class="agents-a {{ Route::current()->uri == 'agents' ? 'active' : '' }}"
                            href="{{ route('agents.index') }}">Agents</a>
                    @endcan
                    @can('Search Properties')
                        <a class="agents-a {{ Route::current()->uri == 'search' ? 'active' : '' }}"
                            href="{{ route('search') }}">Property Search</a>
                    @endcan
                    <a class="profile-a" href="{{ route('profile') }}">Profile</a>
                    <a class="logout" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </section>
    @endauth

    {{ $slot }}

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
                    <a href="{{ url('') }}"><img src="{{ asset('img/footerlogo@3x.png') }}" /></a>
                    <h5>
                        Blakely Tower - Jumeirah Beach Road - Dubai Marina - Dubai -
                        United Arab Emirates
                    </h5>
                </div>
            </div>
            <div class="d-flex justify-content-between footer-bottom align-items-center"
                style="border-top: solid 1px #0b3841">
                <a href="{{ url('') }}"><img src="{{ asset('img/logo@3x.png') }}"
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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type='text/javascript' src="{{ asset('js/loadingoverlay.min.js') }}"></script>
    @stack('scripts')

    @include('layouts.notification')
</body>

</html>
