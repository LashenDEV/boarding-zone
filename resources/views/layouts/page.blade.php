<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Boarding Zone</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/styles.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    @stack('Styles')
</head>
<body class="antialiased">
<nav x-data="{ isOpen: false }" class="container mx-auto p-6 lg:flex lg:items-center lg:justify-between">
    <div class="flex items-center justify-between">
        <div>
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="h-20 w-20">
                    <x-application-mark class="block"/>
                </a>
                <a class="text-2xl font-bold text-gray-800 hover:text-gray-700   lg:text-4xl"
                   href="/">BORDING ZONE</a>
            </div>

        </div>

        <!-- Mobile menu button -->
        <div class="flex lg:hidden">
            <button x-cloak @click="isOpen = !isOpen" type="button"
                    class="text-gray-500 hover:text-gray-600 focus:text-gray-600 focus:outline-none  "
                    aria-label="toggle menu">
                <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16"/>
                </svg>

                <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
    <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']"
         class="absolute inset-x-0 z-20 w-full bg-white px-6 py-4 shadow-md transition-all duration-300 ease-in-out lg:relative lg:top-0 lg:mt-0 lg:flex lg:w-auto lg:translate-x-0 lg:items-center lg:bg-transparent lg:p-0 lg:opacity-100 lg:shadow-none ">
        <div class="lg:-px-8 flex flex-col space-y-4 lg:mt-0 lg:flex-row lg:space-y-0">
            <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500   lg:mx-8"
               href="/">Home</a>
            <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500   lg:mx-8"
               href="{{url('/#our-features')}}">Service</a>
            <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500   lg:mx-8"
               href="{{route('about-us')}}">About Us</a>
            <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500   lg:mx-8"
               href="{{route('contact-us')}}">Contact Us</a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="font-semibold text-gray-600 hover:text-gray-900   focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                       class="font-semibold text-gray-600 hover:text-gray-900   focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="ml-4 font-semibold text-gray-600 hover:text-gray-900   focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</nav>
<main>
    @yield('main')
</main>

<footer class="bg-white">
    <div class="container mx-auto px-6 py-12">
        <hr class="my-6 border-gray-200  md:my-10"/>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <div>
                <p class="font-semibold text-gray-800 ">Quick Link</p>

                <div class="mt-5 flex flex-col items-start space-y-2">
                    <a href="/"
                       class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline  ">Home</a>
                    <a href="/"
                       class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline  ">About
                        Us</a>
                    <a href="/"
                       class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline  ">Contact
                        Us</a>
                </div>
            </div>

            <div>
                <p class="font-semibold text-gray-800 ">Suppliers</p>

                <div class="mt-5 flex flex-col items-start space-y-2">
                    <a href="/"
                       class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline  ">Arpico</a>
                    <a href="/"
                       class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline  ">Keels</a>
                    <a href="/"
                       class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline  ">BOC</a>
                </div>
            </div>

            <div>
                <p class="font-semibold text-gray-800 ">Services</p>

                <div class="mt-5 flex flex-col items-start space-y-2">
                    <a href="/"
                       class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline  ">Security</a>
                    <a href="/"
                       class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline  ">Food
                        Supply</a>
                    <a href="/"
                       class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline  ">Fitness</a>
                </div>
            </div>

            <div>
                <p class="font-semibold text-gray-800 ">Contact Us</p>

                <div class="mt-5 flex flex-col items-start space-y-2">
                    <a href="/"
                       class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline  ">+94
                        55 447 4978</a>
                    <a href="/"
                       class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline  ">info@boardingzone.com</a>
                </div>
            </div>
        </div>

        <hr class="my-6 border-gray-200  md:my-10"/>

        <div class="flex flex-col items-center justify-between sm:flex-row">
            <a href="/"
               class="text-2xl font-bold text-gray-800 transition-colors duration-300 hover:text-gray-700  ">Boarding
                Zone</a>

            <p class="mt-4 text-sm text-gray-500  sm:mt-0">BoardingZone © Copyright 2023. All
                Rights
                Reserved.</p>
        </div>
    </div>
</footer>
@livewireScripts
@stack('Scripts')
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>
