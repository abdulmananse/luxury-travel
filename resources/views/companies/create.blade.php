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
                    <form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="company" style="display: {{ @$tab != 'contact' ? 'flex' : 'none' }};">
                            <div class="col-lg-6 left-input">
                                <label>Company Name</label>
                                <input type="text" name="company_name" placeholder="Company Name" />
                                {!! $errors->first('company_name', '<label class="error">:message</label>') !!}

                                <label>Company Email</label>
                                <input type="text" name="company_email" placeholder="Company Email" />
                                {!! $errors->first('company_email', '<label class="error">:message</label>') !!}

                                <label>Company Phone</label>
                                <input type="text" name="company_phone" placeholder="Company Phone" />
                                {!! $errors->first('company_phone', '<label class="error">:message</label>') !!}

                                <label>Company Website</label>
                                <input type="text" name="company_website" placeholder="Company Website" />
                                {!! $errors->first('company_website', '<label class="error">:message</label>') !!}

                            </div>
                            {{-- <div class="col-lg-6 right-input">
                                <label>Profile Photo</label>
                                <div class="upload position-relative">
                                    <input class="custom-file-input" type="file" placeholder="Upload"
                                        id="photoGallery" name="photo">
                                    <div class="upload-style">Upload</div>
                                    <img src="./img/invalid-arrowtop@3x.png" />
                                </div>
                                <label>Comission Amount</label>
                                <div class="select-comission">
                                    <p class="value-drop">dropdown</p>
                                    <img src="./img/downninvalid-name@3x.png" />
                                </div>
                                <div class="comissionOpen">
                                    <span>test</span>
                                    <span>test</span>
                                    <span>test</span>
                                    <span>test</span>
                                    <span>test</span>
                                    <span>test</span>
                                </div>  
                            </div> --}}
                        </div>
                        @if (@$company)
                            <input type="hidden" name="tab" value="contact" />
                            <input type="hidden" name="id" value="{{ $company->id }}" />
                            <div class="contact" style="display: {{ @$tab == 'contact' ? 'flex' : 'none' }};">
                                <div class="col-lg-6 left-input">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" placeholder="First Name"
                                        value="{{ $firstName }}" />
                                    {!! $errors->first('first_name', '<label class="error">:message</label>') !!}

                                    <label>Last Name</label>
                                    <input type="text" name="last_name" placeholder="Last Name"
                                        value="{{ $lastName }}" />
                                    {!! $errors->first('last_name', '<label class="error">:message</label>') !!}

                                    <label>Contact Email</label>
                                    <input type="email" name="email" placeholder="Email"
                                        value="{{ $company->email }}" />
                                    {!! $errors->first('email', '<label class="error">:message</label>') !!}

                                </div>
                                <div class="col-lg-6 right-input">
                                    <label>Your Phone</label>
                                    <input type="tel" name="phone" placeholder="Phone"
                                        value="{{ $company->phone }}" />
                                    {!! $errors->first('phone', '<label class="error">:message</label>') !!}

                                    <label>Profile Photo</label>
                                    <div class="upload position-relative">
                                        <input class="custom-file-input" type="file" placeholder="Upload"
                                            id="photoGallery" name="photo">
                                        <div id="upload-img-contact" class="upload-style">Upload</div>
                                        <img id="upload-img-contact" src="./img/invalid-arrowtop@3x.png" />
                                    </div>
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
