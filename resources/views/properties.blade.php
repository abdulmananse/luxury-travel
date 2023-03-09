<x-app-layout>

    <section class="backgroundColor">
        <div class="container">
            <form method="GET" action="{{ route('search') }}" class="row g-3 form-input search-form">
                <div class="property">
                    <div class="d-flex drop-menu destination-drop">
                        <p class="select-search">DESTINATION</p>
                        <div class="select-destionation destination-label">
                            <span>{{ @request()->city ? @request()->city : 'Destination' }}</span>
                            <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                        </div>
                        <div class="dropdown-open">
                            @foreach ($cities as $city)
                                <span class="custom-option select-destination-name"
                                    data-value="{{ $city }}">{{ $city }}</span>
                            @endforeach
                            <input type="text" class="d-none" name="city" value="{{ @request()->city }}" />
                        </div>
                    </div>
                    <div class="date-input">
                        <div class="d-flex drop-menu" style="flex-direction: row; justify-content: space-between">
                            <p class="select-search">ARRIVAL</p>
                            <p class="select-search">DEPARTURE</p>
                        </div>
                        <input id="daterange" type="text" name="daterange" value="" inputmode="none" />
                    </div>
                    <div class="d-flex drop-menu destination-drop ml-4">
                        <p class="select-search">GUESTS</p>
                        <div class="select-destionation guests-label">
                            <span>{{ @request()->guests ? @request()->guests : 'Guests' }}</span>
                            <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                        </div>
                        <div class="dropdown-open">
                            @for ($i = 1; $i <= $maxGuests; $i++)
                                <span class="custom-option select-guest-name"
                                    data-value="{{ $i }}">{{ $i }}</span>
                            @endfor
                            <input type="text" class="d-none" name="guests" value="{{ @request()->guests }}" />
                        </div>
                    </div>
                    <input type="text" class="d-none" name="sort_by" value="{{ @request()->sort_by }}" />
                    <div class="d-flex drop-menu guests-border">
                        <p class="select-search">CLIENT BUDGET</p>
                        <div class="select-destionation">
                            <p class="value-drop">test</p>
                            <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                        </div>
                        <div class="dropdown-open guests-open budget">
                            <p>$ 10,000</p>
                            <input type="range" min="0" max="100" step="1" value="50"
                                id="price" />
                            <div class="budget-applay">
                                <button class="budget-applay-button">Applay</button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex drop-menu">
                        <button class="search-btn">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="backgroundColor">
        <div class="container">
            <div class="sort">
                <div class="sort-filter">
                    <div class="select-destionation sort-by">
                        <p>{{ @request()->sort_by ? @request()->sort_by : 'Sort by' }}</p>
                        <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                    </div>
                    <div class="dropdown-open">
                        <span selected="" class="custom-option select-sortby" data-value="Price Low to High">Price
                            Low to High</span>
                        <span selected class="custom-option select-sortby" data-value="Property Name A to Z">Property
                            Name A to Z</span>
                        <span selected class="custom-option select-sortby" data-value="No. of Guests">No. of
                            Guests</span>
                    </div>
                    <div class="select-drop show-filter">
                        <p>Show filter</p>
                        <img class="arrow-filter" src="{{ asset('img') }}/downninvalid-name@3x.png" />
                    </div>
                </div>

                <div class="property-filter">
                    <div class="filter-menu">
                        <div class="d-flex drop-menu">
                            <p class="select-search">PROPERTY TYPE</p>
                            <div class="select-destionation">
                                <p class="value-drop">test</p>
                                <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                            </div>
                            <div class="dropdown-open">
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                            </div>
                        </div>
                        <div class="d-flex drop-menu">
                            <p class="select-search">BATHROOMS</p>
                            <div class="select-destionation">
                                <p class="value-drop">test</p>
                                <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                            </div>
                            <div class="dropdown-open">
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                            </div>
                        </div>
                        <div class="d-flex drop-menu">
                            <p class="select-search">DESTINATION</p>
                            <div class="select-destionation">
                                <p class="value-drop">test</p>
                                <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                            </div>
                            <div class="dropdown-open">
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                            </div>
                        </div>
                        <div class="d-flex drop-menu">
                            <p class="select-search">DESTINATION</p>
                            <div class="select-destionation">
                                <p class="value-drop">test</p>
                                <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                            </div>
                            <div class="dropdown-open">
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                            </div>
                        </div>
                        <div class="d-flex drop-menu">
                            <p class="select-search">DESTINATION</p>
                            <div class="select-destionation">
                                <p class="value-drop">test</p>
                                <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                            </div>
                            <div class="dropdown-open">
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                            </div>
                        </div>
                        <div class="d-flex drop-menu">
                            <p class="select-search">DESTINATION</p>
                            <div class="select-destionation">
                                <p class="value-drop">test</p>
                                <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                            </div>
                            <div class="dropdown-open">
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                            </div>
                        </div>
                        <div class="d-flex drop-menu">
                            <p class="select-search">DESTINATION</p>
                            <div class="select-destionation">
                                <p class="value-drop">test</p>
                                <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                            </div>
                            <div class="dropdown-open filter-drop">
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                            </div>
                        </div>
                        <div class="d-flex drop-menu">
                            <p class="select-search">DESTINATION</p>
                            <div class="select-destionation">
                                <p class="value-drop">test</p>
                                <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                            </div>
                            <div class="dropdown-open">
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                                <span>test</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex drop-menu btn-filter">
                        <button class="search-btn clear">Clear</button>
                        <button class="search-btn applay">Applay</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="backgroundColor">


        @if ($properties)
            <div class="container availabile">
                <h3>Available Properties</h3>
                <div class="properties-card">
                    @forelse($properties as $property)
                        <div class="card-info">
                            <div class="card-img">
                                <div class="shadow-left"></div>
                                <img src="{{ asset('img') }}/4sliderbitmap-copy-3@3x.png" />
                                <div class="shadow-right"></div>
                                <div class="properties-slide">
                                    <img src="{{ asset('img') }}/sliderinvalid-name@3x.png" />
                                </div>
                            </div>
                            <div class="card-content">
                                <img class="profile-picture" src="{{ asset('img') }}/100k-ai-faces-6.jpg" />
                                <h4>{{ $property->name }}</h4>
                                <div class="vila-info d-flex">
                                    <div class="name-vila col-lg-5">
                                        <p>{{ $property->property_id }}</p>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="publisher-contact d-flex">
                                            <p class="publisher">Publisher:</p>
                                            <p>Tripwix</p>
                                        </div>
                                        <div class="publisher-contact d-flex">
                                            <p class="contact-card">Contact:</p>
                                            <p>Roberto Carneiro</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bedrooms">
                                    <div class="publisher-contact d-flex">
                                        <p class="contact-card">Bedrooms:</p>
                                        <p>{{ $property->no_of_bedrooms }}</p>
                                    </div>
                                    <div class="publisher-contact d-flex">
                                        <p class="contact-card">Max Guests:</p>
                                        <p>{{ $property->max_guests }}</p>
                                    </div>
                                    <div class="publisher-contact d-flex">
                                        <p class="contact-card">Bathrooms:</p>
                                        <p>{{ $property->no_of_bathrooms }}</p>
                                    </div>
                                    <div class="publisher-contact d-flex">
                                        <p class="contact-card">Guest Total:</p>
                                        <p>$19,567</p>
                                    </div>
                                    <div class="publisher-contact d-flex">
                                        <p class="contact-card">Comission:</p>
                                        <p>10%</p>
                                    </div>
                                    <div class="publisher-contact d-flex">
                                        <p class="contact-card">Payout:</p>
                                        <p>$1,700</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-btn">
                                <button class="request">Request</button>
                                <button class="download">Download</button>
                            </div>
                            <div class="download-card-open">
                                <div class="arrow-back arrow-back-download">
                                    <img src="{{ asset('img') }}/arrowinvalid-name@3x.png" />
                                    <p>Back</p>
                                </div>
                                <div class="card-img download-card">
                                    <img src="{{ asset('img') }}/4sliderbitmap-copy-3@3x.png" />
                                </div>
                                <div class="card-content">
                                    <img class="profile-picture" src="{{ asset('img') }}/100k-ai-faces-6.jpg" />
                                    <h4>Download</h4>
                                    <div class="download-file">
                                        <div>
                                            <p>PDF</p>
                                            <button>Download</button>
                                        </div>
                                        <div>
                                            <p>Rates</p>
                                            <button>Download</button>
                                        </div>
                                        <div>
                                            <p>HQ Photos</p>
                                            <button>Download</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-btn ical">
                                    <p>iCal link:</p>
                                    <div class="ical-link">
                                        <input placeholder="https://balbalbalbdnl/%@&£/&^(hdhbdhkjs…." />
                                        <button>Copy</button>
                                    </div>
                                </div>
                            </div>
                            <div class="download-card-request-open">
                                <div class="arrow-back arrow-back-request">
                                    <img src="{{ asset('img') }}/arrowinvalid-name@3x.png" />
                                    <p>Back</p>
                                </div>
                                <div class="card-img download-card">
                                    <img src="{{ asset('img') }}/4sliderbitmap-copy-3@3x.png" />
                                </div>
                                <div class="card-content">
                                    <img class="profile-picture" src="{{ asset('img') }}/100k-ai-faces-6.jpg" />
                                    <h4>Request to Book</h4>
                                    <div class="bedrooms">
                                        <div class="publisher-contact d-flex">
                                            <p class="contact-card">Checkin:</p>
                                            <p>02 / Jan / 23</p>
                                        </div>
                                        <div class="publisher-contact d-flex icon-i">
                                            <p class="contact-card">Guest Pays:</p>
                                            <div class="cost-info">
                                                <p>$19,567</p>
                                                <img class="info-i"
                                                    src="{{ asset('img') }}/infoinvalid-name@3x.png" />
                                            </div>
                                        </div>
                                        <div class="publisher-contact d-flex">
                                            <p class="contact-card">Checkout:</p>
                                            <p>06 / Jan / 23</p>
                                        </div>
                                        <div class="publisher-contact d-flex icon-i">
                                            <p class="contact-card">Your Payout:</p>
                                            <div class="cost-info">
                                                <p>$1,700</p>
                                                <img class="info-i"
                                                    src="{{ asset('img') }}/infoinvalid-name@3x.png" />
                                            </div>
                                        </div>
                                        <div class="publisher-contact d-flex">
                                            <p class="contact-card">Nights:</p>
                                            <p>4</p>
                                        </div>
                                        <div class="publisher-contact d-flex icon-i">
                                            <p class="contact-card">Property:</p>
                                            <div class="cost-info">
                                                <p>Villa Isabella</p>
                                                <img class="info-i"
                                                    src="{{ asset('img') }}/infoinvalid-name@3x.png" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-request">
                                        <p>Message for Roberto:</p>
                                        <textarea rows="4" maxlength="50"></textarea>
                                        <p class="request-info">
                                            Roberto Carneiro from Tripwix will reach out to you.
                                        </p>
                                    </div>
                                </div>
                                <div class="card-btn-request">
                                    <button class="request download">Submit request</button>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        @else
            <div class="container">
                <div class="search-no-available">
                    <h3>No Available Properties</h3>
                    <p>We didn’t find any properties based on your chosen filterset.</p>
                    <button>Reset Filters & Search</button>
                </div>
            </div>
        @endif



        @if ($properties)
            <div class="row justify-content-center float-end pt-3 pagina">
                {!! $properties->appends($_GET)->links('pagination::bootstrap-4') !!}
            </div>
        @endif

        {{-- <div class="pagination-container">
                <button class="prev-btn">Previous</button>
                <button class="next-btn">Next</button>
            </div>
            <div class="pagination"></div> --}}
    </section>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css') }}/daterangepicker.css" />
    @endpush

    @push('scripts')
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script type="text/javascript" src="{{ asset('js') }}/script.js"></script>
        <script>
            $(document).ready(function() {

                $('.select-destination-name').click(function() {
                    $('.destination-label span').html($(this).attr('data-value'));
                    $('input[name=city]').val($(this).attr('data-value'));
                });
                $('.select-guest-name').click(function() {
                    $('.guests-label span').html($(this).attr('data-value'));
                    $('input[name=guests]').val($(this).attr('data-value'));
                });
                $('.select-sortby').click(function() {
                    $('input[name=sort_by]').val($(this).attr('data-value'));
                    $('form.search-form').submit();
                });
            });

            $("#daterange").daterangepicker({
                    autoApply: true,
                    opens: "center",
                },
                function(start, end, label) {
                    console.log(
                        "New date range selected: " +
                        start.format("YYYY-MM-DD") +
                        " to " +
                        end.format("YYYY-MM-DD") +
                        " (predefined range: " +
                        label +
                        ")"
                    );
                }
            );
        </script>
    @endpush

</x-app-layout>
