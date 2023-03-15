<x-app-layout>
    <section class="backgroundColor">
        <div class="container profile">
            <div class="d-flex row profile-company">
                <div class="col-md-4 profile-left">
                    <h4 class="active profile-form-agency">Profile</h4>
                </div>

                <div class="col-md-8 d-flex profile-form" style="flex-direction: column">
                    <form method="POST" action="{{ route('agents.createAgent', $email) }}">
                        @csrf
                        <div class="d-flex form-input">

                            <div class="col-lg-6 left-input">
                                <label class="mt-4">Invited by: Tripwix</label>
                                <hr />
                                <label>Your Agency</label>
                                <input placeholder="Company Name" type="text" name="company_name"
                                    value="{{ old('company_name') }}" />
                                {!! $errors->first('company_name', '<label class="error">:message</label>') !!}

                                <label>Your First Name</label>
                                <input placeholder="John" type="text" name="first_name"
                                    value="{{ old('first_name') }}" />
                                {!! $errors->first('first_name', '<label class="error">:message</label>') !!}

                                <label>Your Last Name</label>
                                <input placeholder="Doe" type="text" name="last_name"
                                    value="{{ old('last_name') }}" />
                                {!! $errors->first('last_name', '<label class="error">:message</label>') !!}

                                <label>Password</label>
                                <input placeholder="•••••••••••" type="password" id="password" name="password" />
                                {!! $errors->first('password', '<label class="error">:message</label>') !!}

                                <label>Profile Photo</label>
                                <div class="upload position-relative">
                                    <input class="custom-file-input" type="file" placeholder="Upload"
                                        id="photoGallery" name="photo">
                                    <div class="upload-style">Upload</div>
                                    <img src="./img/invalid-arrowtop@3x.png" />
                                </div>
                            </div>
                            <div class="col-lg-6 right-input">
                                <label class="mt-4">&nbsp;</label>
                                <hr />
                                <label>Username</label>
                                <input placeholder="Username" type="text" name="username"
                                    value="{{ old('username') }}" />
                                {!! $errors->first('username', '<label class="error">:message</label>') !!}

                                <label>Your Email</label>
                                <input readonly placeholder="john@example.com" type="email" name="email"
                                    value="{{ $email }}" />
                                {!! $errors->first('email', '<label class="error">:message</label>') !!}

                                <label>Your Phone</label>
                                <input placeholder="Phone" type="tel" id="phone" name="phone"
                                    value="{{ old('phone') }}" />
                                {!! $errors->first('phone', '<label class="error">:message</label>') !!}

                                <label>Confirm Password</label>
                                <input placeholder="•••••••••••" type="password" name="password_confirmation" />

                            </div>
                        </div>
                        <div class="save-btn">
                            <button type="submit" class="save">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
</x-app-layout>
