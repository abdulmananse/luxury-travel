<x-guest-layout>

    @section('title')
        | Home
    @endsection

    <section class="backgroundColor">
        <div class="container d-flex global-padding align-items-center">
            <div class="row align-items-center">
                <div class="firstSection-left col-xl-6">
                    <a>Invite only</a>
                    <h1>Where the worlds leading travel agents find luxury homes.</h1>
                    <p>
                        Invite travel agents to see your inventory, search, and send you
                        targeted leads.
                    </p>
                    @if (!Auth::user())
                        <button class="signUp-btn" onclick="window.location.href='{{ route('register') }}'">Sign
                            up</button>
                    @endif
                </div>
                <div class="col-xl-6 img-galerry">
                    <div class="left-img">
                        <img class="mb-2 mr-2" src="{{ asset('img') }}/home1bitmap@2x.png" />
                        <img src="{{ asset('img') }}/home1bitmap2@2x.png" />
                    </div>
                    <div class="right-img">
                        <img class="mb-2" src="{{ asset('img') }}/home1bitmap3@2x.png" />
                        <img class="mb-2" src="{{ asset('img') }}/home1rectangle4@2x.png" />
                        <img src="{{ asset('img') }}/home1bitmap5@2x.png" />
                    </div>
                </div>
                <div class="col-xl-6 position-relative firstSection-mobile" style="width: 100%; margin-bottom: 80px">
                    <img class="computer-list-mobile" src="{{ asset('img') }}/bitmap1.png" />
                    <div class="computer-list">
                        <img src="{{ asset('img') }}/computerbitmap@3x.png" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="secondSection backgroundColor">
        <div class="container d-flex">
            <div class="col-lg-6 d-flex global-padding secondBorder">
                <div class="second-info">
                    <h3>$ 15 Million</h3>
                    <p>of bookings have been generated through us.</p>
                </div>
                <div class="second-info">
                    <h3>11,000 Agents</h3>
                    <p>are using our platform to search for homes.</p>
                </div>
            </div>
            <div class="text-justify col-lg-6 global-padding" style="text-align: right">
                <p>
                    We offer agents like you the ability to search and compare a vast
                    inventory of exclusive villas - directly from your trusted sources.
                    With PDFS, HQ Photos, etc - you can quickly find the perfect
                    property for your clients' needs and preferences.
                </p>
            </div>
        </div>
    </section>

    <section class="backgroundColor">
        <div class="container global-padding">
            <img src="{{ asset('img') }}/exclusivebitmap@2x.png" style="width: 100%" />
            <div class="d-flex thirdSection">
                <div class="col-lg-6 thirdBorder">
                    <h3>Exclusive Homes</h3>
                </div>
                <div class="col-lg-6" style="text-align: left">
                    <p>
                        By having access to unique and in-demand exclusive homes, you can
                        offer clients something they won't find anywhere else. This sets
                        you apart from other travel agents and also helps you build trust
                        and loyalty with your clients.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="backgroundColor position-relative">
        <div class="position-relative">
            <div style="border-top: solid 0.5px #0b3841"></div>
            <p class="text-center position-absolute testimonals-border">
                TESTIMONALS
            </p>
        </div>
        <div class="container position-relative">
            <swiper-container class="mySwiper" navigation="true">
                <swiper-slide class="slide d-flex">
                    <div class="slide-left col-lg-6">
                        <img src="{{ asset('img') }}/slider1bitmap@2x.png" />
                    </div>
                    <div class="slide-right col-lg-6">
                        <h2>
                            We rely on Luxury Travel Portal to connect our inventory with
                            5,000+ travel agents. With the help of this platform, agents can
                            quickly search for their ideal homes.
                        </h2>
                        <p class="slide-text-right">EILEEN, C.</p>
                        <p class="mini-text">Publisher, SINGAPORE, JAN 2023</p>
                    </div>
                </swiper-slide>
                <swiper-slide class="slide d-flex">
                    <div class="slide-left col-lg-6">
                        <img src="{{ asset('img') }}/testimonial-2.jpg" />
                    </div>
                    <div class="slide-right col-lg-6">
                        <h2>
                            Our inventory is linked to our preferred travel agents, enabling them to find their
                            preferred accommodations.
                            We have generated thousands of $ through Luxury Travel Portal.
                        </h2>
                        <p class="slide-text-right">TONY, S.</p>
                        <p class="mini-text">Publisher, London, DEC 2022</p>
                    </div>
                </swiper-slide>

            </swiper-container>
        </div>
        <div class="slider-border" style="border-bottom: solid 0.5px #0b3841"></div>
        <div class="slider-border-right" style="border-bottom: solid 0.5px #0b3841"></div>
    </section>

    <section class="destinations-border" style="border-bottom: solid 1px #0b3841"></section>

    <section class="backgroundColor second-slider">
        <div class="container position-relative">
            <h2>Destinations</h2>
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ asset('img') }}/bitmap1@2x.png" />
                        <p>PUNTA DE MITA</p>
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('img') }}/bitmap-copy@2x.png" />
                        <p>SWISS ALPS</p>
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('img') }}/slider2bitmap-copy-23@2x.png" />
                        <p>UTAH</p>
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('img') }}/slider2bitmap-copy-34@2x.png" />
                        <p>ALGARVE</p>
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('img') }}/bitmap1@2x.png" />
                        <p>PUNTA DE MITA</p>
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('img') }}/bitmap-copy@2x.png" />
                        <p>SWISS ALPS</p>
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('img') }}/slider2bitmap-copy-23@2x.png" />
                        <p>UTAH</p>
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('img') }}/slider2bitmap-copy-34@2x.png" />
                        <p>ALGARVE</p>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div class="second-slider-bottom"></div>
        </div>
    </section>

    <section class="backgroundColor pricing-padding">
        <div class="position-relative">
            <div style="border-top: solid 0.5px #0b3841"></div>
            <p class="text-center position-absolute pricing-border">PRICING</p>
        </div>
        <div class="container d-flex pricing-content">
            <div class="d-flex mobile-pricing">
                <div class="pricing col-lg-6 content-padding-left">
                    <div class="d-flex justify-content-between publisher-title">
                        <h2>Publishers</h2>
                        <h2 class="price">$4.99</h2>
                    </div>
                    <p class="m-0 pricing-category">Per property per month</p>
                    <p>
                        Luxury Travel Portal offers publishers a customizable B2B travel
                        agency portal that allows you to connect with an unlimited number
                        of travel agents. Through this portal, your invited agents can
                        access various assets including whitelabel PDFs, iCals, prices,
                        and submit booking requests directly to you.
                    </p>
                </div>
                <div class="border-center"></div>
                <div class="pricing col-lg-6 content-padding-right">
                    <div class="d-flex justify-content-between publisher-title">
                        <h2>Travel Agencies</h2>
                        <h2 class="price">$99</h2>
                    </div>
                    <p class="m-0 pricing-category">per seat per month</p>
                    <p>
                        By giving all your agents access to Luxury Travel Portal, you can
                        save them countless hours of research time. Our platform allows
                        you to quickly view available inventory from the world's largest
                        luxury property rental companies, compare options, and send direct
                        inquiries. With less time spent on research, you can focus on
                        growing your business and generating more revenue.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="backgroundColor"
        style="
          border-top: solid 0.5px #0b3841;
          border-bottom: solid 0.5px #0b3841;
        ">
        <div class="container">
            <div class="newsletter">
                <p>NEWSLETTER</p>
                <h2>Subscribe to get the latest<br />newsletters from us</h2>
                <div class="newsletter-input">
                    <input placeholder="Your email here" />
                    <button>subscribe</button>
                </div>
            </div>
        </div>
    </section>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css') }}/swiper.css" />
    @endpush

    @push('scripts')
        <script src="{{ asset('js') }}/swiper.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <script src="{{ asset('js') }}/home-script.js{{ '?_v=' . rand(1000, 999999) }}"></script>

        <script>
            window.addEventListener("load", function() {
                let width = window.innerWidth;

                if (width < 992 && width > 768) {
                    var swiper = new Swiper(".swiper", {
                        slidesPerView: 2,
                        spaceBetween: 30,
                        slidesPerGroup: 1,
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                        },
                    });
                } else if (width < 768) {
                    var swiper = new Swiper(".swiper", {
                        slidesPerView: 1,
                        spaceBetween: 30,
                        slidesPerGroup: 1,
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                        },
                    });
                } else {
                    var swiper = new Swiper(".swiper", {
                        slidesPerView: 4,
                        spaceBetween: 30,
                        slidesPerGroup: 1,
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                        },
                    });
                }
            });

            window.addEventListener("resize", function() {
                let width = window.innerWidth;

                if (width < 992 && width > 768) {
                    var swiper = new Swiper(".swiper", {
                        slidesPerView: 2,
                        spaceBetween: 30,
                        slidesPerGroup: 1,
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                        },
                    });
                } else if (width < 768) {
                    var swiper = new Swiper(".swiper", {
                        slidesPerView: 1,
                        spaceBetween: 30,
                        slidesPerGroup: 1,
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                        },
                    });
                } else {
                    var swiper = new Swiper(".swiper", {
                        slidesPerView: 4,
                        spaceBetween: 30,
                        slidesPerGroup: 1,
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                        },
                    });
                }
            });
        </script>
        <script>
            window.chatwootSettings = {
                "position": "right",
                "type": "standard",
                "launcherTitle": "Chat with us"
            };
            (function(d, t) {
                var BASE_URL = "https://app.chatwoot.com";
                var g = d.createElement(t),
                    s = d.getElementsByTagName(t)[0];
                g.src = BASE_URL + "/packs/js/sdk.js";
                g.defer = true;
                g.async = true;
                s.parentNode.insertBefore(g, s);
                g.onload = function() {
                    window.chatwootSDK.run({
                        websiteToken: '128s8TU3ijo6dQecRJmFasCx',
                        baseUrl: BASE_URL
                    })
                }
            })(document, "script");
        </script>
    @endpush

</x-guest-layout>
