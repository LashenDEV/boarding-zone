<x-guest-layout>
    <x-slot name="logo">
        <x-authentication-card-logo />
    </x-slot>

    @if (session('status'))
        <div class="mb-4 text-sm font-medium text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST"    action="{{ route('login') }}">
        @csrf

        <!-- Container -->
        <div class="flex relative flex-wrap justify-center content-center min-h-screen bg-gray-200" >
            <!-- Login component -->
            <div class="flex flex-row-reverse shadow-md">
                <!-- Login form -->
                <div class="flex flex-wrap justify-center content-center bg-white rounded-l-md md:w-1/2 lg:w-1/3 xl:w-1/4">
                    <div class="p-4 w-full d-flex content-center">
                        <!-- Heading -->
                        <a href="{{ route('home') }}" class="h-20 w-20">
                        <x-application-mark class="block"/>
                        </a>
                        
                        <h1 class="text-xl font-semibold">Welcome back</h1>
                        <small class="text-gray-400">Welcome back! Please enter your details</small>

                        <x-validation-errors class="mb-4" />


                        <div class="mt-4">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autofocus autocomplete="username" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="current-password" />
                        </div>

                        <div class="flex justify-between items-center mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-checkbox id="remember_me" name="remember" />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="mt-4">
                            <button class="block px-4 py-2 w-full text-center text-white bg-purple-700 rounded-md hover:bg-purple-900">{{ __('Log in') }}</button>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="w-full text-center">
                        <span class="text-xs font-semibold text-gray-400">Don't have an account?</span>
                        <a href="{{route('register')}}" class="text-xs font-semibold text-purple-700">Register</a>
                    </div>
                </div>

                <!-- Login banner -->
                <div class="hidden h-screen md:block md:w-1/2 lg:w-2/3 xl:w-3/4">
                    <img class="object-cover w-full h-full rounded-r-md" src="{{ URL::asset('asserts/images/auth/login-cover.jpg') }}">
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
