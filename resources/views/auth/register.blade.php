<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div>
                <x-jet-label for="national_id" value="{{ __('National_ID') }}" />
                <x-jet-input id="national_id" class="block mt-1 w-full" type="text" name="national_id"
                    :value="old('national_id')" required autofocus autocomplete="national_id" />
            </div>

            <div>
                <x-jet-label for="country" value="{{ __('Country') }}" />
                <x-jet-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')"
                    required autofocus autocomplete="country" />
            </div>

            <div>
                <x-jet-label for="gender" value="{{ __('Gender') }}" />
                <x-jet-input id="gender" class="block mt-1 w-full" type="text" name="gender" :value="old('gender')"
                    required autofocus autocomplete="gender" />
            </div>

            {{-- <div>
                <x-jet-label value="{{ __('Gender') }}" /><br>
                <x-jet-label for="male" value="{{ __('Male') }}" />
                <x-jet-input id="male" class=" mt-1" type="radio" name="gender" :value="old('gender')" required
                    autofocus autocomplete="gender" />
                <x-jet-label for="female" value="{{ __('Female') }}" />
                <x-jet-input id="female" class=" mt-1" type="radio" name="gender" :value="old('gender')"
                    required autofocus autocomplete="gender" />
            </div> --}}


            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Terms of Service') . '</a>',
    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Privacy Policy') . '</a>',
]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
