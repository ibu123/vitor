<x-guest-layout>

    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" id="register-form" action="{{ route('register') }}">
            @csrf
            <input type="hidden" name="g_recaptcha_response" id="g-recaptcha-response">
            <!-- Full Name -->
            <div>
                <x-label for="first_name" :value="__('First Name')" />

                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
            </div>

             <!-- Last Name -->
             <div class="mt-4">
                <x-label for="last_name" :value="__('Last Name')" />

                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Date Of Birth -->
            <div class="mt-4">
                <x-label for="dob" :value="__('Date Of Birth')" />

                <x-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
    @push('js')
      <script src="https://www.google.com/recaptcha/api.js?render={!! env('RECAPTCHA_CLIENT_KEY') !!}"></script>

    @endpush
    @section('js')
        <script>
            $("form").validate({
                rules : {
                    "first_name" : {
                        required:true,
                        maxlength: 255
                    },
                    "last_name" : {
                        required:true,
                        maxlength: 255
                    },
                    "email" : {
                        required : true,
                        email: true
                    }
                }
            });

            grecaptcha.ready(function() {
                grecaptcha.execute('{{ env("RECAPTCHA_CLIENT_KEY") }}', {action:'send_form'})
                .then(function(token) {
                    document.getElementById('g-recaptcha-response').value = token;
                });
            });
        </script>
    @endsection
</x-guest-layout>
