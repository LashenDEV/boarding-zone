<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">

        </x-slot>

        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="flex md:block relative flex-wrap justify-center content-center min-h-screen bg-gray-200">
                <div class="flex flex-row-reverse shadow-md">
                    <div class="flex flex-wrap justify-center content-center bg-white rounded-l-md md:w-1/2 lg:w-1/3 xl:w-1/4">
                        <div class="p-4 w-full">
                            <h1 class="text-xl font-semibold">Welcome!</h1>
                            <small class="text-gray-400">Please enter your details.</small>


                            <div class="mt-4">
                                <x-label for="name" value="{{ __('First Name') }}" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            </div>
                            <div class="mt-4">
                                <x-label for="name" value="{{ __('Last Name') }}" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            </div>

                            <x-validation-errors class="mb-4" />

                            <div class="mt-4">
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            </div>

                            <div class="mt-4">
                                <x-label for="password" value="{{ __('Password') }}" />
                                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                            </div>

                            <div class="mt-4">
                                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                            </div>

                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <x-label for="terms">
                                        <div class="flex items-center">
                                            <x-checkbox name="terms" id="terms" required />

                                            <div class="ml-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-label>
                                </div>
                            @endif

                            <div class="mt-6">
                                <x-button class="flex justify-center px-4 py-2 w-full text-white bg-black-700 rounded-md hover:bg-black-700">
                                    {{ __('Register') }}
                                </x-button>
                            </div>
                        </div>
                        <div class="w-full p-4 text-center">
                            <span class="text-xs font-semibold text-gray-400">Already Registered? </span>
                            <a class="text-xs font-semibold text-purple-700" href="{{ route('login') }}">
                                {{ __('Log in') }}
                            </a>
                        </div>
                    </div>

                    <div class="hidden h-screen md:block md:w-1/2 lg:w-2/3 xl:w-3/4">
                        <img class="object-cover w-full h-full rounded-r-md" src="{{ URL::asset('asserts/images/auth/login-cover.jpg') }}">
                    </div>
                </div>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
