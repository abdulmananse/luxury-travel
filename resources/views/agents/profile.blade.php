<x-app-layout>

    @section('title')
        | Profile
    @endsection

    <section class="backgroundColor">
        <div class="container profile">
            <div class="d-flex row profile-company">
                <div class="col-md-4 profile-left">
                    <h4 class="active profile-form-agency">Profile</h4>
                </div>

                <div class="col-md-8 d-flex profile-form" style="flex-direction: column">
                    <form method="POST" action="{{ route('agents.update') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $agent->id }}" />

                        <div class="d-flex form-input">
                            <div class="col-lg-6 left-input">
                                <label>Your Agency</label>
                                <input placeholder="Company Name" type="text" name="company_name"
                                    value="{{ old('company_name', $agent->company_name) }}" />
                                {!! $errors->first('company_name', '<label class="error">:message</label>') !!}

                                <label>Your First Name</label>
                                <input placeholder="John" type="text" name="first_name"
                                    value="{{ old('first_name', $agent->first_name) }}" />
                                {!! $errors->first('first_name', '<label class="error">:message</label>') !!}

                                <label>Your Last Name</label>
                                <input placeholder="Doe" type="text" name="last_name"
                                    value="{{ old('last_name', $agent->last_name) }}" />
                                {!! $errors->first('last_name', '<label class="error">:message</label>') !!}

                                <label>Profile Photo</label>
                                <div class="upload position-relative">
                                    <input class="custom-file-input" type="file" placeholder="Upload"
                                        id="photoGalleryAgent" name="photo">
                                    <div id="upload-title-agent" class="upload-style">Upload</div>
                                    <img class="upload-img-agent" src="{{ asset('img') }}/invalid-arrowtop@3x.png" />
                                </div>
                                @if ($agent->image)
                                    <img width="70" height="70" src="{{ $agent->image }}" />
                                @endif
                            </div>
                            <div class="col-lg-6 right-input">
                                <label>Username</label>
                                <input placeholder="Username" type="text" disabled name="username"
                                    value="{{ old('username', $agent->username) }}" />
                                {!! $errors->first('username', '<label class="error">:message</label>') !!}

                                <label>Your Email</label>
                                <input placeholder="john@example.com" disabled type="email" name="email"
                                    value="{{ old('email', $agent->email) }}" />
                                {!! $errors->first('email', '<label class="error">:message</label>') !!}

                                <label>Your Phone</label>
                                <input placeholder="Phone" type="tel" id="phone" name="phone"
                                    value="{{ old('phone', $agent->phone) }}" />
                                {!! $errors->first('phone', '<label class="error">:message</label>') !!}

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
