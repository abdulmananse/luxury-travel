<x-app-layout>

    <?php
    $name = explode(' ', @$company->name);
    $firstName = $name[0];
    $lastName = @$name[1];
    ?>

    <section class="backgroundColor">
        <div class="container profile">
            <div class="d-flex row profile-company">
                <div class="col-md-4 profile-left">
                    <h4 class="company-form {{ @$tab != 'contact' ? 'active' : '' }}">Company</h4>
                    <h4 class="contact-form {{ @$tab == 'contact' ? 'active' : '' }}">Contact</h4>
                </div>
                <div class="col-md-8 d-flex profile-form" style="flex-direction: column">
                    <form method="POST" action="{{ route('companies.update') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="tab" value="company" />
                        <input type="hidden" name="id" value="{{ $company->id }}" />

                        <div class="company" style="display: {{ @$tab != 'contact' ? 'flex' : 'none' }};">
                            <div class="col-lg-6 left-input">
                                <label>Company Name</label>
                                <input type="text" name="company_name" placeholder="Company Name"
                                    value="{{ old('company_name', $company->company_name) }}" />
                                {!! $errors->first('company_name', '<label class="error">:message</label>') !!}

                                <label>Company Email</label>
                                <input type="text" name="company_email" placeholder="Company Email"
                                    value="{{ old('company_email', $company->company_email) }}" />
                                {!! $errors->first('company_email', '<label class="error">:message</label>') !!}

                                <label>Company Phone</label>
                                <input type="text" name="company_phone" placeholder="Company Phone"
                                    value="{{ old('company_phone', $company->company_phone) }}" />
                                {!! $errors->first('company_phone', '<label class="error">:message</label>') !!}

                                <label>Company Website</label>
                                <input type="text" name="company_website" placeholder="Company Website"
                                    value="{{ old('company_website', $company->company_website) }}" />
                                {!! $errors->first('company_website', '<label class="error">:message</label>') !!}

                            </div>
                            <div class="col-lg-6 right-input">

                                <label>Commission Amount</label>

                                <select name="commission">
                                    <option value="5" {{ $company->commission == 5 ? 'selected' : '' }}>5%</option>
                                    <option value="10" {{ $company->commission == 10 ? 'selected' : '' }}>10%
                                    </option>
                                    <option value="15" {{ $company->commission == 15 ? 'selected' : '' }}>15%
                                    </option>
                                    <option value="20" {{ $company->commission == 20 ? 'selected' : '' }}>20%
                                    </option>
                                    <option value="25" {{ $company->commission == 25 ? 'selected' : '' }}>25%
                                    </option>
                                </select>

                                <br />
                                <label>Company Logo</label>
                                <div class="upload position-relative">
                                    <input class="custom-file-input" type="file" placeholder="Upload"
                                        id="photoGallery" name="company_logo">
                                    <div class="upload-style">Upload</div>
                                    <img src="{{ asset('img') }}/invalid-arrowtop@3x.png" />
                                </div>

                                @if ($company->company_logo)
                                    <img width="70" height="70" src="{{ $company->company_logo }}" />
                                @endif


                            </div>
                        </div>
                        @if (@$company)

                            <div class="contact" style="display: {{ @$tab == 'contact' ? 'flex' : 'none' }};">
                                <div class="col-lg-6 left-input">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" placeholder="First Name"
                                        value="{{ old('first_name', $company->first_name) }}" />
                                    {!! $errors->first('first_name', '<label class="error">:message</label>') !!}

                                    <label>Last Name</label>
                                    <input type="text" name="last_name" placeholder="Last Name"
                                        value="{{ old('last_name', $company->last_name) }}" />
                                    {!! $errors->first('last_name', '<label class="error">:message</label>') !!}

                                    <label>Contact Email</label>
                                    <input type="email" disabled name="email" placeholder="Email"
                                        value="{{ old('email', $company->email) }}" />
                                    {!! $errors->first('email', '<label class="error">:message</label>') !!}

                                </div>
                                <div class="col-lg-6 right-input">
                                    <label>Your Phone</label>
                                    <input type="tel" name="phone" placeholder="Phone"
                                        value="{{ old('phone', $company->phone) }}" />
                                    {!! $errors->first('phone', '<label class="error">:message</label>') !!}

                                    <label>Profile Photo</label>
                                    <div class="upload position-relative">
                                        <input class="custom-file-input" type="file" placeholder="Upload"
                                            id="photoGallery" name="photo">
                                        <div class="upload-style">Upload</div>
                                        <img src="{{ asset('img') }}/invalid-arrowtop@3x.png" />
                                    </div>

                                    @if ($company->image)
                                        <img width="70" height="70" src="{{ $company->image }}" />
                                    @endif
                                </div>
                            </div>
                        @endif
                        <div class="save-btn">
                            <button class="save">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            const company = document.querySelector('.company-form');
            const contact = document.querySelector('.contact-form');
            const companyForm = document.querySelector('.company');
            const contactForm = document.querySelector('.contact');

            if (company != null) {

                company.addEventListener('click', () => {
                    companyForm.style.display = 'flex';
                    contactForm.style.display = 'none';

                    if (window.innerWidth < 768) {
                        company.style.color = '#fff';
                        contact.style.color = 'rgba(255, 255, 255, 0.5)';
                    } else {
                        company.style.color = '#a65a3f';
                        contact.style.color = '#0b3841';
                    }
                });

                contact.addEventListener('click', () => {
                    companyForm.style.display = 'none';
                    contactForm.style.display = 'flex';

                    if (window.innerWidth < 768) {
                        contact.style.color = '#fff';
                        company.style.color = 'rgba(255, 255, 255, 0.5)';
                    } else {
                        contact.style.color = '#a65a3f';
                        company.style.color = '#0b3841';
                    }


                });
            }
        </script>
    @endpush
</x-app-layout>
