<x-guest-layout>

    @section('title')
        | Login
    @endsection

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <section class="backgroundColor">
        <div class="container login-height">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="login-page">
                    <div class="email">
                        <x-label for="email" :value="__('Email/Username')" />
                        <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"
                            required autofocus />
                        {!! $errors->first('email', '<label class="error">:message</label>') !!}
                    </div>
                    <div class="pass">
                        <x-label for="password" :value="__('Password')" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" placeholder="•••••••••••" />
                        <p>
                            <a href="{{ route('password.request') }}"
                                style="color: #0b3841; text-decoration: underline">forgot
                                password?</a>
                        </p>
                    </div>
                    <button class="login-btn">Login</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Email Address -->
    {{-- <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div> --}}

    <!-- Password -->
    {{-- <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div> --}}

    <!-- Remember Me -->
    {{-- <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> --}}

    {{-- <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div> --}}

</x-guest-layout>
