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
    <link rel="stylesheet" href="{{ asset('css/style.css?_v=' . rand(1000, 999999)) }}">
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
                    @can('Company')
                        <a class="agents-a {{ Route::current()->uri == 'companies' ? 'active' : '' }}"
                            href="{{ route('companies.index') }}">Companies</a>
                    @endcan
                    @can('Manage Agents')
                        <a class="agents-a {{ Route::current()->uri == 'agents' ? 'active' : '' }}"
                            href="{{ route('agents.index') }}">Agents</a>
                    @endcan
                    @can('Search Properties')
                        <a class="agents-a {{ Route::current()->uri == 'search' ? 'active' : '' }}"
                            href="{{ route('search') }}">Property Search</a>
                    @endcan
                    @hasanyrole(['Company', 'Contact_Person'])
                        <a class="profile-a" href="{{ route('profile') }}">Profile</a>
                    @endhasanyrole
                    <a class="logout" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </section>
    @endauth

    {{ $slot }}

    <footer>
        <div class="container footer-padding d-flex" style="flex-direction: column">
            <div class="d-flex row footer-top">
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
                        <a href="mailto:contact@luxurytravelportal.com">
                            <p>Email Us</p>
                        </a>
                        <a href="tel:+16506201059">
                            <p>+1 650 620 1059</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 footer-right">
                    <a href="home-page.html"><img src="{{ asset('img') }}/footerlogo@3x.png" /></a>
                    <h5 class="info-company">
                        Veskiposti tn 2- 1002, Harju maakond<br>
                        Talinn 10138 - Estonia.<br>
                        ID: 16696009
                    </h5>
                </div>
            </div>
            <div class="d-flex justify-content-between footer-bottom align-items-center"
                style="border-top: solid 1px #0b3841">
                <a href="home-page.html"><img src="{{ asset('img') }}/logo@3x.png"
                        style="width: 152px; height: 58px" /></a>
                <div class="social-icon">
                    <a href="https://www.linkedin.com/company/luxury-travel-portal/"><img
                            src="{{ asset('img') }}/iconmonstr-linkedin-1@3x.png"
                            style="width: 29px; height: 29px" /></a>
                    <a href=" https://www.instagram.com/luxurytravelportal/" target="_blank"><img
                            src="{{ asset('img') }}/iconmonstr-instagram-11@3x.png"
                            style="width: 29px; height: 28px" /></a>
                    <a href="https://www.youtube.com/channel/UC9hwyZ4Ufa0W82KQsxIPPwQ"><img
                            src="{{ asset('img') }}/iconmonstr-youtube-6@3x.png"
                            style="width: 30px; height: 26px" /></a>
                </div>
                <p style="font-size: 12px !important">
                    Copyright 2023, LUXTRAPOR OÜ
                </p>
            </div>
        </div>
    </footer>

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
        // uploade photo company
        const photoGallery = document.querySelector("#photoGalleryCompany");
        const uploadStyle = document.querySelector("#upload-title-company");
        const uploadImg = document.querySelector('.upload-img-company');
        if (photoGallery != null) {
            photoGallery.addEventListener("change", function() {
                const fileName = this.files[0].name;
                if (fileName.length >= 28) {
                    const titleImg = fileName.substring(0, 27) + '...';
                    uploadStyle.textContent = titleImg;
                } else {
                    uploadStyle.textContent = fileName;
                }
                uploadStyle.innerHTML +=
                    '<img class="delete-img" src="https://luxurytravelportal.com/img/icons8-close-50.png"/>';
                uploadImg.style.display = 'none';

                document.querySelector('.delete-img').addEventListener("click", function() {
                    photoGallery.value = null;
                    uploadStyle.textContent = 'Upload';
                    uploadImg.style.display = 'block';
                });
            });
        }

        // uploade photo contact
        const photoGalleryContact = document.querySelector("#photoGalleryContact");
        const uploadStyleContact = document.querySelector("#upload-title-contact");
        const uploadImgContact = document.querySelector('.upload-img-contact');

        if (photoGalleryContact != null) {
            photoGalleryContact.addEventListener("change", function() {
                const fileName = this.files[0].name;
                if (fileName.length >= 28) {
                    const titleImg = fileName.substring(0, 27) + '...';
                    uploadStyleContact.textContent = titleImg;
                } else {
                    uploadStyleContact.textContent = fileName;
                }
                uploadStyleContact.innerHTML +=
                    '<img class="delete-img" src="https://luxurytravelportal.com/img/icons8-close-50.png"/>';
                uploadImgContact.style.display = 'none';

                document.querySelector('.delete-img').addEventListener("click", function() {
                    photoGalleryContact.value = null;
                    uploadStyleContact.textContent = 'Upload';
                    uploadImgContact.style.display = 'block';
                });
            });
        }

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
