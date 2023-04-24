<x-guest-layout>

    <style>
        .text-red-600 {
            color: #ab0a0a;
        }
    </style>

    <section class="" style="background-color: #fff8f0;">
        <div class="">
            <div class="signUp">
                <div class="align-self-center flex-column signUp-left">
                    <img class="contactUsImage" alt="" width=50%; height=auto; src="./img/signUpPeople.png">
                    <h3>Sign up as an Owner, DMC, or rental company.</h3>
                    <p>If you rent multiple homes, and want to build strong and lasting relationships with travel
                        agents, please reach out.</p>
                    <p class="contactluxur"><a
                            href="mailto:partners@luxurytravelportal.com">partners@luxurytravelportal.com</a></p>
                </div>

                <div class="contact-form-side align-self-center flex-column">
                    <div class="container-contact-form">
                        <form id="contact" method="POST" action="{{ route('register') }}">
                            @csrf

                            <h4>Sign up to publish homes</h4>

                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <div class="row">
                                <div class="col-lg-6 first-input firstName">
                                    <div class="form-group">
                                        <label style="display: inline-block;" for="first_name">First Name</label>
                                        <input placeholder="John" type="text" tabindex="1" name="first_name"
                                            value="{{ old('first_name') }}" required autofocus>
                                    </div>
                                </div>

                                <div class="col-lg-6 first-input lastName">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input placeholder="Doe" type="text" tabindex="2" name="last_name"
                                            value="{{ old('last_name') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 first-input">
                                    <div class="form-group">
                                        <label for="company_name">Company Name</label>
                                        <input placeholder="Example LLC" type="text" tabindex="3"
                                            name="company_name" value="{{ old('company_name') }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 first-input">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input placeholder="johndoe@example.com" type="email" tabindex="4"
                                            name="email" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 first-input">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input placeholder="+12223334444" type="tel" tabindex="5" name="phone"
                                            value="{{ old('phone') }}" required>
                                    </div>
                                </div>
                                <div class="form-group submitSignUp">
                                    <button name="submit" type="submit" id="contact-submit"
                                        data-submit="...Sending">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
