<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}

        @yield('title')
    </title>

    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css?_v=' . rand(1000, 999999)) }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />


    @stack('styles')

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
</head>

<body>
    <header>
        <div class="container text-center">
            <a href="{{ route('homepage') }}"><img src="{{ asset('img/logologo@3x.png') }}" /></a>
            @guest
                <a href="{{ route('login') }}" class="login text-right">
                    <p>Login</p>
                </a>
                <div class="border-header" style="border-top: none"></div>
            @endguest
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

    @include('layouts.footer')

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3FSR3SGD5Y"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-3FSR3SGD5Y');
    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type='text/javascript' src="{{ asset('js/loadingoverlay.min.js') }}"></script>

    @stack('scripts')

    @include('layouts.notification')
    <script>
        // uploade photo agent
        const photoGalleryAgent = document.querySelector("#photoGalleryAgent");
        const uploadStyleAgent = document.querySelector("#upload-title-agent");
        const uploadImgAgent = document.querySelector('.upload-img-agent');

        if (photoGalleryAgent != null) {
            photoGalleryAgent.addEventListener("change", function() {
                const fileName = this.files[0].name;
                if (fileName.length >= 28) {
                    const titleImg = fileName.substring(0, 27) + '...';
                    uploadStyleAgent.textContent = titleImg;
                } else {
                    uploadStyleAgent.textContent = fileName;
                }
                uploadStyleAgent.innerHTML +=
                    '<img class="delete-img" src="https://luxurytravelportal.com/img/icons8-close-50.png"/>';
                uploadImgAgent.style.display = 'none';

                document.querySelector('.delete-img').addEventListener("click", function() {
                    photoGalleryAgent.value = null;
                    uploadStyleAgent.textContent = 'Upload';
                    uploadImgAgent.style.display = 'block';
                });
            });
        }
    </script>
</body>

</html>
