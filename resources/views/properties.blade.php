<x-app-layout>

    @section('title')
        | Property Search
    @endsection

    @push('styles')
        <style>
            #daterange.color {
                color: #0b3841 !important;
            }

            #daterange {
                cursor: pointer;
            }
        </style>
    @endpush

    <form method="GET" action="{{ route('search') }}" class="row1 g-31 form-input1 search-form">
        <section class="backgroundColor">
            <div class="container">
                <div class="property">
                    <div class="d-flex drop-menu destination-drop">
                        <p class="select-search">DESTINATION</p>
                        <div class="select-destionation destination-label">
                            <p class="value-drop {{ @request()->city ? 'color' : '' }}">
                                {{ @request()->city ? @request()->city : 'Any' }}</p>
                            <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                        </div>
                        <div class="dropdown-open">
                            <span
                                class="custom-option select-destination-name {{ (@request()->city == 'any' or @request()->city == '') ? 'active' : '' }}"
                                data-value="">Any</span>
                            @foreach ($cities as $city)
                                <span
                                    class="custom-option select-destination-name {{ @request()->city == $city ? 'active' : '' }}"
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
                        <input id="daterange" type="text" name="daterange" class="{{ @$startDate ? 'color' : '' }}"
                            inputmode="none" />
                    </div>
                    <div class="d-flex drop-menu destination-drop guests-drop ml-4">
                        <p class="select-search">GUESTS</p>
                        <div class="select-destionation guests-label">
                            <p class="value-drop {{ @request()->guests ? 'color' : '' }}">
                                {{ @request()->guests ? @request()->guests . ' Guests' : 'Any' }}</p>

                            <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                        </div>
                        <div class="dropdown-open">
                            <span
                                class="custom-option select-guest-name {{ (@request()->guests == 'any' or @request()->guests == '') ? 'active' : '' }}"
                                data-value="">Any</span>

                            <span class="custom-option select-guest-name {{ @request()->guests == 1 ? 'active' : '' }}"
                                data-value="1">1 Guest</span>
                            @for ($i = 2; $i <= $maxGuests; $i++)
                                <span
                                    class="custom-option select-guest-name {{ @request()->guests == $i ? 'active' : '' }}"
                                    data-value="{{ $i }}">{{ $i }} Guests</span>
                            @endfor
                            <input type="text" class="d-none" name="guests" value="{{ @request()->guests }}" />
                        </div>
                    </div>
                    <input type="text" class="d-none" name="sort_by" value="{{ @request()->sort_by }}" />
                    <div class="d-flex drop-menu guests-border">
                        <p class="select-search">CLIENT BUDGET</p>
                        <div id="select-budget" class="select-destionation">
                            <p class="budget-value-drop {{ @request()->price ? 'color' : '' }}">
                                {{ @request()->price ? '$' . @request()->price : 'Any' }}
                            </p>
                            <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                        </div>
                        <div class="dropdown-open guests-open budget">
                            <p class="price-range">{{ @request()->price ? '$' . request()->price : 'Any' }}</p>
                            <input type="range" min="0" max="100000" step="100"
                                value="{{ @request()->price ? request()->price : 0 }}" id="price" name="price" />
                            <div class="budget-applay">
                                <button class="budget-applay-button">Apply</button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex drop-menu">
                        <button class="search-btn" id="property-search">Search</button>
                    </div>
                </div>
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
                            <span selected="" class="custom-option select-sortby"
                                data-value="Price Low to High">Price
                                Low to High</span>
                            <span selected class="custom-option select-sortby"
                                data-value="Property Name A to Z">Property
                                Name A to Z</span>
                            <span selected class="custom-option select-sortby" data-value="No. of Guests">No. of
                                Guests</span>
                        </div>
                        <div class="select-drop show-filter">
                            <p>Show filters</p>
                            <img class="arrow-filter" src="{{ asset('img') }}/downninvalid-name@3x.png" />
                        </div>
                    </div>

                    <div class="property-filter">
                        <div class="filter-menu">
                            <div class="d-flex drop-menu property_type-drop">
                                <p class="select-search">PROPERTY TYPE</p>
                                <div class="select-destionation property_type-label">
                                    <p class="value-drop {{ @request()->property_type ? 'color' : '' }}">
                                        {{ @request()->property_type ? @request()->property_type : 'Any' }}
                                    </p>
                                    <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                                </div>
                                <div class="dropdown-open">
                                    <span class="custom-option select-property_type-name" data-value="">Any</span>
                                    @foreach ($propertyTypes as $propertyType)
                                        <span class="custom-option select-property_type-name"
                                            data-value="{{ $propertyType }}">{{ $propertyType }}</span>
                                    @endforeach
                                    <input type="text" class="d-none" name="property_type"
                                        value="{{ @request()->property_type }}" />
                                </div>
                            </div>
                            <div class="d-flex drop-menu bathrooms-drop">
                                <p class="select-search">BATHROOMS</p>
                                <div class="select-destionation bathrooms-label">
                                    <p class="value-drop {{ @request()->bathrooms ? 'color' : '' }}">
                                        {{ @request()->bathrooms ? @request()->bathrooms . ' Bathrooms' : 'Any' }}</p>
                                    <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                                </div>
                                <div class="dropdown-open">
                                    <span class="custom-option select-bathroom-name" data-value="">Any</span>
                                    @for ($i = 1; $i <= $bathrooms; $i++)
                                        <span class="custom-option select-bathroom-name"
                                            data-value="{{ $i }}">{{ $i }} Bathrooms</span>
                                    @endfor
                                    <input type="text" class="d-none" name="bathrooms"
                                        value="{{ @request()->bathrooms }}" />
                                </div>
                            </div>
                        </div>
                        <div class="d-flex drop-menu btn-filter">
                            <a href="{{ route('search') }}" class="search-btn clear">Clear</a>
                            <button type="submit" class="search-btn applay">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <section id="search-results" class="background-color">

        @if (count($properties))
            <div class="container availabile">
                <h3>Available Properties</h3>
                <div class="properties-card">
                    @forelse($properties as $property)
                        <?php
                        $propertyModel = App\Models\Property::with('images')->find($property->id);
                        //dd($property);

                        $totalPrice = 'On Request';
                        $totalPriceWithVat = 0;
                        $payout = 'On Request';
                        $houseFee = 0;
                        $taxes = 0;
                        $securityDeposit = strpos(strtolower($property->security_deposit), 'Night') !== false ? $property->average : (int) str_replace(['$', ','], '', $property->security_deposit);
                        $gratuatyFee = $property->gratuity_fee ? (int) str_replace('%', '', $property->gratuity_fee) : 0;
                        $occupacyFee = $property->occupancy_fee ? (int) str_replace('%', '', $property->occupancy_fee) : 0;
                        $municipalFee = $property->municipal_fee ? (int) str_replace('%', '', $property->municipal_fee) : 0;
                        $vatPercentage = $property->vat_rate ? (int) str_replace('%', '', $property->vat_rate) : 0;
                        if ($property->total_price > 0) {
                            $taxes = $vatPercentage > 0 ? ((int) round(($property->total_price * $vatPercentage) / 100)) : 0;
                            $houseFee = (int) round(($property->total_price * $municipalFee) / 100);
                            $totalPrice = (int) round($property->total_price + $taxes + $houseFee);
                            if ($contactPerson->commission != null) {
                                $payout = round(($property->total_price * (int) str_replace('%', '', $contactPerson->commission)) / 100);
                            }
                        }
                        ?>
                        <div class="card-info">
                            <div class="card-img">
                                <div class="shadow-left"></div>

                                <div class="properties-slide-left">
                                    <img class="prev" src="{{ asset('img') }}/slider--invalid-name@3x.png" />
                                </div>

                                <div class="properties-slides">
                                    @if (count($propertyModel->images) > 0)
                                        @foreach ($propertyModel->images as $image)
                                            <img src="{{ asset('storage/' . $image->name) }}" />
                                        @endforeach
                                    @else
                                        <img src="{{ asset('img') }}/4sliderbitmap-copy-3@3x.png" />
                                        <img src="{{ asset('img') }}/2slider1bitmap@3x.png" />
                                        <img src="{{ asset('img') }}/4sliderbitmap-copy-3@3x.png" />
                                        <img src="{{ asset('img') }}/2slider1bitmap@3x.png" />
                                    @endif
                                </div>

                                <div class="shadow-right"></div>

                                <div class="properties-slide">
                                    <img class="next" src="{{ asset('img') }}/slider--invalid-name@3x.png" />
                                </div>
                            </div>

                            <div class="card-content">
                                @if ($contactPerson->image)
                                    <img class="profile-picture" src="{{ $contactPerson->image }}" />
                                @else
                                    <img class="profile-picture" src="{{ asset('img') }}/100k-ai-faces-6.jpg" />
                                @endif
                                <h4>{{ hasRole('Contact_Person') ? $property->name : $property->property_id }}</h4>
                                <div class="vila-info d-flex">
                                    <div class="name-vila col-lg-6">
                                        <p style="margin: 0px;">{{ $property->destination }},</p>
                                        <p>{{ $property->community }}</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="publisher-contact d-flex">
                                            <p class="publisher">Publisher:</p>
                                            <p>{{ $contactPerson->company_name }}</p>
                                        </div>
                                        <div class="publisher-contact d-flex">
                                            <p class="contact-card">Contact:</p>
                                            <p>{{ $contactPerson->name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bedrooms">
                                    <div class="publisher-contact d-flex">
                                        <p class="contact-card">Bedrooms:</p>
                                        <p>{{ $property->no_of_bedrooms }}</p>
                                    </div>

                                    <div class="publisher-contact d-flex">
                                        <p class="contact-card">Guest Total:</p>
                                        <p>
                                            @if ($property->total_price > 0)
                                                {!! $property->currency_symbol !!}{{ number_format((float) $totalPrice) }}
                                            @else
                                                On Request
                                            @endif
                                        </p>
                                    </div>
                                    <div class="publisher-contact d-flex">
                                        <p class="contact-card">Max Guests:</p>
                                        <p>{{ $property->max_guests }}</p>
                                    </div>

                                    <div class="publisher-contact d-flex">
                                        <p class="contact-card">Commission:</p>
                                        <p>{{ $contactPerson->commission }}%</p>
                                    </div>
                                    <div class="publisher-contact d-flex">
                                        <p class="contact-card">Bathrooms:</p>
                                        <p>{{ $property->no_of_bathrooms }}</p>
                                    </div>

                                    <div class="publisher-contact d-flex">
                                        <p class="contact-card">Payout:</p>
                                        <p>
                                            @if ($payout > 0 && $payout !== 'On Request' && $property->total_price > 0)
                                                {!! $property->currency_symbol !!}{{ number_format((float) $payout) }}
                                            @else
                                                On Request
                                            @endif
                                        </p>
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
                                    @if (count($propertyModel->images) > 0)
                                        <img src="{{ asset('storage/' . @$propertyModel->images[0]->name) }}" />
                                    @else
                                        <img src="{{ asset('img') }}/4sliderbitmap-copy-3@3x.png" />
                                    @endif
                                </div>
                                <div class="card-content">
                                    @if ($contactPerson->image)
                                        <img class="profile-picture" src="{{ $contactPerson->image }}" />
                                    @else
                                        <img class="profile-picture" src="{{ asset('img') }}/100k-ai-faces-6.jpg" />
                                    @endif
                                    <h4>Download</h4>
                                    <div class="download-file">
                                        <div>
                                            <p>PDF</p>
                                            <a target="_blank" href="{{ $property->pdf_link }}">Download</a>
                                        </div>
                                        <div>
                                            <p>Rates</p>
                                            <a target="_blank" href="{{ $property->price_pdf_link }}">Download</a>
                                        </div>
                                        <div>
                                            <p>HQ Photos</p>
                                            <a target="_blank"
                                                href="{{ file_exists(storage_path('app/public/' . $property->property_id . '.zip')) ? config('app.url') . '/storage/' . $property->property_id . '.zip' : $property->images_folder_link }}">Download</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-btn ical">
                                    <p>iCal link:</p>
                                    <div class="ical-link">
                                        <input value="{{ $property->ical_link }}" />
                                        <button class="ical-copy-btn">Copy</button>
                                    </div>
                                </div>
                            </div>
                            <div class="download-card-request-open">
                                <div class="arrow-back arrow-back-request">
                                    <img src="{{ asset('img') }}/arrowinvalid-name@3x.png" />
                                    <p>Back</p>
                                </div>
                                <div class="card-img download-card">
                                    @if ($propertyModel->thumb)
                                        <img src="{{ $propertyModel->thumb }}" />
                                    @else
                                        <img src="{{ asset('img') }}/4sliderbitmap-copy-3@3x.png" />
                                    @endif
                                </div>
                                <div class="card-content">
                                    @if ($contactPerson->image)
                                        <img class="profile-picture" src="{{ $contactPerson->image }}" />
                                    @else
                                        <img class="profile-picture" src="{{ asset('img') }}/100k-ai-faces-6.jpg" />
                                    @endif
                                    <h4>Request to Book</h4>
                                    <div class="bedrooms">
                                        <div class="publisher-contact d-flex">
                                            <p class="contact-card">Checkin:</p>
                                            <p>{{ $startDate != '' ? date('d / M / Y', strtotime($startDate)) : '-' }}
                                            </p>
                                        </div>
                                        <div class="publisher-contact d-flex icon-i">
                                            <p class="contact-card">Guest Pays:</p>
                                            <div class="cost-info">
                                                @if ($property->total_price > 0)
                                                    <p>
                                                        {!! $property->currency_symbol !!}{{ number_format((float) $totalPrice) }}
                                                    </p>
                                                @else
                                                    <p>On Request</p>
                                                @endif
                                                <img class="info-i open-price-all"
                                                    src="{{ asset('img') }}/infoinvalid-name@3x.png" />
                                                <div class="all-price-one">
                                                    <img class="close-price" src="./img/icons8-close-50.png">
                                                    <div class="price-info">
                                                        <div class="price-top">
                                                            <div class="d-flex justify-content-between price-margin">
                                                                <p>Accomodation</p>
                                                                <p>
                                                                    @if ($property->total_price > 0)
                                                                        {!! $property->currency_symbol !!}{{ number_format((float) $property->total_price) }}
                                                                    @else
                                                                        On Request
                                                                    @endif
                                                                </p>
                                                            </div>
                                                            @if ($houseFee)
                                                                <div
                                                                    class="d-flex justify-content-between price-margin">
                                                                    <p>House Fee</p>
                                                                    <p>
                                                                        {!! $property->currency_symbol !!}{{ number_format((float) $houseFee) }}
                                                                    </p>
                                                                </div>
                                                            @endif
                                                            <div class="d-flex justify-content-between price-margin">
                                                                <p>Taxes</p>
                                                                <p>
                                                                    @if ($taxes && $vatPercentage > 0 && $property->total_price > 0)
                                                                        {!! $property->currency_symbol !!}{{ number_format((float) $taxes) }}
                                                                    @else
                                                                        On Request
                                                                    @endif
                                                                </p>
                                                            </div>
                                                            @if ($securityDeposit)
                                                                <div
                                                                    class="d-flex justify-content-between price-margin deposit">
                                                                    <p style="text-color: rgba(11, 56, 65, 0.5)">Sec.
                                                                        Deposit</p>
                                                                    <p style="text-color: rgba(11, 56, 65, 0.5)">
                                                                        {!! $property->currency_symbol !!}{{ number_format((float) $securityDeposit) }}
                                                                    </p>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="price-bottom">
                                                            <p class="your-payout">Guest Pays</p>
                                                            <p class="price-green">
                                                                @if ($property->total_price > 0)
                                                                    {!! $property->currency_symbol !!}{{ number_format((float) $totalPrice) }}
                                                                @else
                                                                    On Request
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="publisher-contact d-flex">
                                            <p class="contact-card">Checkout:</p>
                                            <p>{{ $endDate != '' ? date('d / M / Y', strtotime($endDate)) : '-' }}</p>
                                        </div>
                                        <div class="publisher-contact d-flex icon-i">
                                            <p class="contact-card">Your Payout:</p>
                                            <div class="cost-info">
                                                <p>
                                                    @if ($payout > 0 && $payout !== 'On Request' && $property->total_price > 0)
                                                        {!! $property->currency_symbol !!}{{ number_format((float) $payout) }}
                                                    @else
                                                        On Request
                                                    @endif
                                                </p>
                                                <img class="info-i open-price-all"
                                                    src="./img/infoinvalid-name@3x.png" />
                                                <div class="all-price-one">
                                                    <img class="close-price"
                                                        src="{{ asset('img') }}/icons8-close-50.png">
                                                    <div class="price-info">
                                                        <div class="price-top">
                                                            <div class="d-flex justify-content-between price-margin">
                                                                <p>Accomodation</p>
                                                                <p>
                                                                    @if ($property->total_price > 0)
                                                                        {!! $property->currency_symbol !!}{{ number_format((float) $property->total_price) }}
                                                                    @else
                                                                        On Request
                                                                    @endif
                                                                </p>
                                                            </div>
                                                            <div class="d-flex justify-content-between price-margin">
                                                                <p>Your Fee</p>
                                                                <p>{{ $contactPerson->commission }}%</p>
                                                            </div>
                                                        </div>
                                                        <div class="price-bottom">
                                                            <p class="your-payout">Your Payout</p>
                                                            <p class="price-green">
                                                                @if ($payout > 0 && $payout !== 'On Request' && $property->total_price > 0)
                                                                    {!! $property->currency_symbol !!}{{ number_format((float) $payout) }}
                                                                @else
                                                                    On Request
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="publisher-contact d-flex">
                                            <p class="contact-card">Nights:</p>
                                            <p>{{ ($startDate != '' ? count($rangeDatesArray) : '-') }}</p>
                                        </div>
                                        <div class="publisher-contact d-flex icon-i">
                                            <p class="contact-card">Property:</p>
                                            <div class="cost-info">
                                                <p>{{ hasRole('Contact_Person') ? $property->name : $property->property_id }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-request">
                                        <form class="request-form">
                                            @csrf
                                            <p>Message for {{ $contactPerson->first_name }}:</p>
                                            <input type="hidden" name="user_id" value="{{ $contactPerson->id }}" />
                                            <input type="hidden" name="property_id" class="property-id"
                                                value="{{ hasRole('Contact_Person') ? $property->name : $property->property_id }}" />
                                            <input type="hidden" name="total_price" value="{{ $totalPrice }}" />
                                            <input type="hidden" name="commission" value="{{ $payout }}" />
                                            <input type="hidden" name="nights"
                                                value="{{ count($rangeDatesArray) }}" />
                                            <input type="hidden" name="check_in"
                                                value="{{ $startDate != '' ? date('d/M/Y', strtotime($startDate)) : '' }}" />
                                            <input type="hidden" name="check_out"
                                                value="{{ $endDate != '' ? date('d/M/Y', strtotime($endDate)) : '' }}" />
                                            <textarea rows="4" name="message" maxlength="250" class="request-textarea"></textarea>
                                        </form>
                                        <p class="request-info">
                                            {{ $contactPerson->name }} from {{ $contactPerson->company_name }} will
                                            reach out to you.
                                        </p>
                                    </div>
                                </div>
                                <div class="card-btn-request">
                                    <button class="request download send-request">Submit request</button>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>

                <div class="row justify-content-center float-end pt-3 pagina w-100">
                    {!! $properties->onEachSide(1)->appends($_GET)->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        @else
            <div class="container">
                <div class="search-no-available">
                    <h3>No Available Properties</h3>
                    <p>We didn't find any properties based on your chosen filterset.</p>
                    <button onclick="window.location.href='{{ route('search') }}'">Reset Filters & Search</button>
                </div>
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
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script type="text/javascript" src="{{ asset('js') }}/script.js{{ '?_v=' . rand(1000, 999999) }}"></script>
        <script>
            $(document).ready(function() {

                $('.select-destination-name').click(function() {
                    var value = $(this).attr('data-value');
                    $('.destination-label p').html((value == '') ? 'Any' : value);
                    $('.destination-label p').addClass("color");
                    $('input[name=city]').val($(this).attr('data-value'));
                    $(".destination-drop").find(".dropdown-open").find("span").removeClass("active");
                    $(this).addClass("active");
                    $(".destination-drop").find(".dropdown-open").addClass("active");
                });
                $('.select-guest-name').click(function() {
                    var value = $(this).attr('data-value');
                    $('.guests-label p').html((value == '') ? 'Any' : value + ' Guests');
                    $('.guests-label p').addClass("color");
                    $('input[name=guests]').val($(this).attr('data-value'));
                    $(".guests-drop").find(".dropdown-open").find("span").removeClass("active");
                    $(this).addClass("active");
                });
                $('.select-property_type-name').click(function() {
                    var value = $(this).attr('data-value');
                    $('.property_type-label p').html((value == '') ? 'Any' : value);
                    $('.property_type-label p').addClass("color");
                    $('input[name=property_type]').val($(this).attr('data-value'));
                    $(".property_type-drop").find(".dropdown-open").find("span").removeClass("active");
                    $(this).addClass("active");
                });
                $('.select-bathroom-name').click(function() {
                    var value = $(this).attr('data-value');
                    $('.bathrooms-label p').html((value == '') ? 'Any' : value + ' Bathrooms');
                    $('.bathrooms-label p').addClass("color");
                    $('input[name=bathrooms]').val($(this).attr('data-value'));
                    $(".bathrooms-drop").find(".dropdown-open").find("span").removeClass("active");
                    $(this).addClass("active");
                });

                $('.select-sortby').click(function() {
                    $('input[name=sort_by]').val($(this).attr('data-value'));
                    $('form.search-form').submit();
                });

                $(".send-request").click(function(e) {
                    e.preventDefault();
                    const _self = $(this);
                    const _parent = _self.parents(".download-card-request-open");
                    const textarea = _parent.find(".request-textarea");
                    const propertyId = _parent.find(".property-id").val();
                    const _form = _parent.find('.request-form');
                    const formData = _form.serialize();

                    if (textarea.val() == '') {
                        errorMessage('Request message is required');
                        return false;
                    }

                    _self.LoadingOverlay('show');

                    $.ajax({
                        type: 'post',
                        // url: 'https://luxurytravelportal.com/send-request',
                        url: '{{ url("send-request") }}',
                        processData: false,
                        dataType: 'json',
                        data: formData,
                        success: function(res) {
                            if (res.success) {
                                textarea.val('');
                                successMessage('Request successfully sent');
                                $(".arrow-back-request").click();
                            } else {
                                errorMessage('Request not sent');
                            }
                        },
                        error: function(request, status, error) {
                            showAjaxErrorMessage(request);
                        },
                        complete: function(res) {
                            _self.LoadingOverlay('hide');
                        }
                    });
                });

            });



            $("#daterange").daterangepicker({
                    autoApply: true,
                    opens: "center",
                    @if ($startDate != '')
                        startDate: '{{ $startDate != '' ? date('m/d/Y', strtotime($startDate)) : '' }}',
                        endDate: '{{ $endDate != '' ? date('m/d/Y', strtotime($endDate)) : '' }}',
                    @else
                        autoUpdateInput: false,
                    @endif
                },
                function(start, end, label) {
                    $("#daterange").val(start.format("MM/DD/YYYY") + ' - ' + end.format("MM/DD/YYYY"));
                    console.log(
                        "New date range selected: " +
                        start.format("YYYY-MM-DD") +
                        " to " +
                        end.format("YYYY-MM-DD") +
                        " (predefined range: " +
                        label +
                        ")"
                    );

                    $("#daterange").addClass('color');
                }
            );


            /**
             * Show Success Message
             * @param message
             * @param title
             */
            function successMessage(message, title) {
                if (!title) title = "Success!";
                toastr.remove();
                toastr.success(message, '', {
                    closeButton: true,
                    timeOut: 4000,
                    progressBar: true,
                    newestOnTop: true
                });
            }


            /**
             * Show Ajax Error Message
             * @param response
             */
            function showAjaxErrorMessage(response, form = false) {
                const responseJson = JSON.parse(response.responseText);
                const errors = responseJson.errors;

                if (errors !== undefined) {
                    Object.keys(errors).forEach(function(item) {
                        for (let value of errors[item]) {
                            errorMessage(value);
                        }
                    });
                } else if (responseJson.message !== undefined) {
                    errorMessage(responseJson.message);
                }

            }

            /**
             * Show Error Message
             * @param message
             * @param title
             */
            function errorMessage(message, title) {
                if (!title) title = "Error!";
                toastr.remove();
                toastr.error(message, '', {
                    closeButton: true,
                    timeOut: 4000,
                    progressBar: true,
                    newestOnTop: true
                });
            }
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

</x-app-layout>
