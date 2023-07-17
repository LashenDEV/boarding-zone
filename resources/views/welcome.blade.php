<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Boarding Zone</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="antialiased">
<div
    class="relative sm:flex sm:justify-center sm:items-center min-h-screen selection:bg-red-500 selection:text-white">
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            @auth
                <a href="{{ url('/dashboard') }}"
                   class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}"
                   class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <script src="//unpkg.com/alpinejs" defer></script>

    <main>
        <section class="bg-white dark:bg-gray-900">
            <nav x-data="{ isOpen: false }" class="container mx-auto p-6 lg:flex lg:items-center lg:justify-between">
                <div class="flex items-center justify-between">
                    <div>
                        <a class="text-2xl font-bold text-gray-800 hover:text-gray-700 dark:text-white dark:hover:text-gray-300 lg:text-5xl"
                           href="#">BORDING ZONE</a>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex lg:hidden">
                        <button x-cloak @click="isOpen = !isOpen" type="button"
                                class="text-gray-500 hover:text-gray-600 focus:text-gray-600 focus:outline-none dark:text-gray-200 dark:hover:text-gray-400 dark:focus:text-gray-400"
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
                     class="absolute inset-x-0 z-20 w-full bg-white px-6 py-4 shadow-md transition-all duration-300 ease-in-out dark:bg-gray-900 lg:relative lg:top-0 lg:mt-0 lg:flex lg:w-auto lg:translate-x-0 lg:items-center lg:bg-transparent lg:p-0 lg:opacity-100 lg:shadow-none lg:dark:bg-transparent">
                    <div class="lg:-px-8 flex flex-col space-y-4 lg:mt-0 lg:flex-row lg:space-y-0">
                        <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8"
                           href="#">Home</a>
                        <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8"
                           href="#">Service</a>
                        <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8"
                           href="#">About</a>
                        <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8"
                           href="#">Contact Us</a>
                        <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8"
                           href="#">Logins</a>
                    </div>

                    <a class="mt-4 block rounded-lg bg-blue-600 px-6 py-2.5 text-center font-medium capitalize leading-5 text-white hover:bg-blue-500 lg:mt-0 lg:w-auto"
                       href="#"> Book a Place </a>
                </div>
            </nav>

            <div class="container mx-auto px-6 py-16 text-center">
                <div class="mx-auto max-w-lg">

                </div>

                <div class="mt-10 flex justify-center">
                    <img class="h-100 w-full rounded-xl object-cover lg:w-6/5"
                         src="{{ URL::asset('asserts\images\home\home-cover.JPG') }}"/>
                </div>
            </div>
        </section>

        <section class="bg-white dark:bg-gray-900">
            <div class="container mx-auto px-6 py-10">
                <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-5xl">Our
                    Key Features</h1>

                <p class="mt-4 text-center text-gray-500 dark:text-gray-300">Take a look at some of our key features</p>

                <div class="grid grid-cols-3 gap-36 p-24">
                    <div class="flex flex-col justify-center items-center"><i class="fa-solid fa-magnifying-glass fa-5x"
                                                                              style="color: #ffffff;"></i>
                        <h2 class="mt-7 text-xl font-semibold capitalize text-gray-800 dark:text-white">Bording
                            Finder</h2>
                    </div>
                    <div class="flex flex-col justify-center items-center"><i class="fa-solid fa-handshake-angle fa-5x"
                                                                              style="color: #ffffff;"></i>
                        <h2 class="mt-7 text-xl font-semibold capitalize text-gray-800 dark:text-white">Academic Support
                            Service</h2>
                    </div>
                    <div class="flex flex-col justify-center items-center"><i
                            class="fa-solid fa-solid fa-shield-halved fa-5x" style="color: #ffffff;"></i>
                        <h2 class="mt-7 text-xl font-semibold capitalize text-gray-800 dark:text-white">Security
                            Service</h2>
                    </div>
                    <div class="flex flex-col justify-center items-center"><i class="fa-solid fa-bullhorn fa-5x"
                                                                              style="color: #ffffff;"></i>
                        <h2 class="mt-7 text-xl font-semibold capitalize text-gray-800 dark:text-white">Boarding
                            Adverticesment</h2>
                    </div>
                    <div class="flex flex-col justify-center items-center"><i class="fa-solid fa-dumbbell fa-5x"
                                                                              style="color: #ffffff;"></i>
                        <h2 class="mt-7 text-xl font-semibold capitalize text-gray-800 dark:text-white">Recreational &
                            Fitness Services</h2>
                    </div>
                    <div class="flex flex-col justify-center items-center"><i class="fa-solid fa-plate-utensils fa-5x"
                                                                              style="color: #ffffff;"></i>
                        <h2 class="mt-7 text-xl font-semibold capitalize text-gray-800 dark:text-white">Food
                            Services</h2>
                    </div>

                </div>
            </div>


            <section class="bg-white dark:bg-gray-900">

                <div class="h-[32rem] bg-gray-100 dark:bg-gray-800 columns-2">

                    <img class="scale-95 translate-y-6 translate-x-12 skew-y-0 h-100 w-full rounded-xl object-cover lg:w-3/4"
                         src="{{ URL::asset('asserts\images\map\map.JPG') }}">

                    <div class="container mx-auto px-6 py-10">
                        <div>


                            <h1 class="text-justify text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-5xl">
                                About Our Service</h1>

                            <p class="scale-100 translate-y-6 translate-x-0.1 mx-auto mt-6 max-w-3xl text-gray-500 dark:text-gray-300">

                                Airlines have been toying with boarding plans and line-jumping shortcuts since
                                they began charging for checked bags 10 years ago. Here, the latest changes
                                and how to make them work for you.
                                Airlines have been toying with boarding plans and line-jumping shortcuts since
                                they began charging for checked bags 10 years ago. Here, the latest changes
                                and how to make them work for you.
                                -jumping shortcuts s
                                For airlines, time on the ground is money. Financially speaking, planes only earn
                                revenue for their companies when they are in the air, ferrying paying passengers.
                                Which is one strong incentive to speed up boarding, deplaning and turnaround
                                time.
                                For airlines, time on the ground is money. Financially speaking, planes only earn
                                revenue for their companies when they are in the air, ferrying paying passengers.
                                Which is one strong incentive to speed up boarding, deplaning and turnaround
                                time.
                            </p>
                        </div>

                        {{--                        <div class="mx-auto mt-6 flex justify-center">--}}
                        {{--                            <span class="inline-block h-1 w-40 rounded-full bg-blue-500"></span>--}}
                        {{--                            <span class="mx-1 inline-block h-1 w-3 rounded-full bg-blue-500"></span>--}}
                        {{--                            <span class="inline-block h-1 w-1 rounded-full bg-blue-500"></span>--}}
                        {{--                        </div>--}}


                    </div>

                </div>
                <img class="scale-90 rounded-xl object-cover "
                     src="{{ URL::asset('asserts/images/other pic/Capture123.JPG') }}">
{{--}}<section class="bg-white dark:bg-gray-900">
    <div class="container mx-auto px-6 py-10">
        <div class="text-center">
            <h1 class="text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl">From the blog</h1>

            <p class="mx-auto mt-4 max-w-lg text-gray-500">Salami mustard spice tea fridge authentic Chinese food dish
                salt tasty liquor. Sweet savory foodtruck pie.</p>
        </div>

        <div class="mt-8 grid grid-cols-1 gap-8 md:mt-16 md:grid-cols-2 xl:grid-cols-3">
            <div>
                <div class="relative">
                    <img class="h-64 w-full rounded-lg object-cover object-center lg:h-80"
                         src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                         alt=""/>

                    <div class="absolute bottom-0 flex bg-white p-3 dark:bg-gray-900">
                        <img class="h-10 w-10 rounded-full object-cover object-center"
                             src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                             alt=""/>

                        <div class="mx-4">
                            <h1 class="text-sm text-gray-700 dark:text-gray-200">Tom Hank</h1>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Creative Director</p>
                        </div>
                    </div>
                </div>

                <h1 class="mt-6 text-xl font-semibold text-gray-800 dark:text-white">What do you want to know about
                    UI</h1>

                <hr class="my-6 w-32 text-blue-500"/>

                <p class="text-sm text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Blanditiis fugit dolorum amet dolores praesentium, alias nam? Tempore</p>

                <a href="#" class="mt-4 inline-block text-blue-500 underline hover:text-blue-400">Read more</a>
            </div>

            <div>
                <div class="relative">
                    <img class="h-64 w-full rounded-lg object-cover object-center lg:h-80"
                         src="https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                         alt=""/>

                    <div class="absolute bottom-0 flex bg-white p-3 dark:bg-gray-900">
                        <img class="h-10 w-10 rounded-full object-cover object-center"
                             src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                             alt=""/>

                        <div class="mx-4">
                            <h1 class="text-sm text-gray-700 dark:text-gray-200">arthur melo</h1>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Creative Director</p>
                        </div>
                    </div>
                </div>

                <h1 class="mt-6 text-xl font-semibold text-gray-800 dark:text-white">All the features you want to
                    know</h1>

                <hr class="my-6 w-32 text-blue-500"/>

                <p class="text-sm text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Blanditiis fugit dolorum amet dolores praesentium, alias nam? Tempore</p>

                <a href="#" class="mt-4 inline-block text-blue-500 underline hover:text-blue-400">Read more</a>
            </div>

            <div>
                <div class="relative">
                    <img class="h-64 w-full rounded-lg object-cover object-center lg:h-80"
                         src="https://images.unsplash.com/photo-1597534458220-9fb4969f2df5?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1374&q=80"
                         alt=""/>

                    <div class="absolute bottom-0 flex bg-white p-3 dark:bg-gray-900">
                        <img class="h-10 w-10 rounded-full object-cover object-center"
                             src="https://images.unsplash.com/photo-1531590878845-12627191e687?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80"
                             alt=""/>

                        <div class="mx-4">
                            <h1 class="text-sm text-gray-700 dark:text-gray-200">Amelia. Anderson</h1>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Lead Developer</p>
                        </div>
                    </div>
                </div>

                <h1 class="mt-6 text-xl font-semibold text-gray-800 dark:text-white">Which services you get from Meraki
                    UI</h1>

                <hr class="my-6 w-32 text-blue-500"/>

                <p class="text-sm text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Blanditiis fugit dolorum amet dolores praesentium, alias nam? Tempore</p>

                <a href="#" class="mt-4 inline-block text-blue-500 underline hover:text-blue-400">Read more</a>
            </div>
        </div>
    </div>
</section>

<div class="bg-white dark:bg-gray-900">
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl">Pricing
            Plan</h1>

        <p class="mx-auto mt-4 max-w-2xl text-center text-gray-500 dark:text-gray-300 xl:mt-6">Lorem ipsum, dolor sit
            amet consectetur adipisicing elit. Alias quas magni libero consequuntur voluptatum velit amet id repudiandae
            ea, deleniti laborum in neque eveniet.</p>

        <div class="mt-6 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 xl:mt-12 xl:gap-12">
            <div class="w-full space-y-8 rounded-lg border border-gray-100 p-8 text-center dark:border-gray-700">
                <p class="font-medium uppercase text-gray-500 dark:text-gray-300">Free</p>

                <h2 class="text-5xl font-bold uppercase text-gray-800 dark:text-gray-100">$0</h2>

                <p class="font-medium text-gray-500 dark:text-gray-300">Life time</p>

                <button
                    class="mt-10 w-full transform rounded-md bg-blue-600 px-4 py-2 capitalize tracking-wide text-white transition-colors duration-300 hover:bg-blue-500 focus:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                    Start Now
                </button>
            </div>

            <div class="w-full space-y-8 rounded-lg bg-blue-600 p-8 text-center">
                <p class="font-medium uppercase text-gray-200">Premium</p>

                <h2 class="text-5xl font-bold uppercase text-white dark:text-gray-100">$40</h2>

                <p class="font-medium text-gray-200">Per month</p>

                <button
                    class="mt-10 w-full transform rounded-md bg-white px-4 py-2 capitalize tracking-wide text-blue-500 transition-colors duration-300 hover:bg-gray-100 focus:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-200 focus:ring-opacity-80">
                    Start Now
                </button>
            </div>

            <div class="w-full space-y-8 rounded-lg border border-gray-100 p-8 text-center dark:border-gray-700">
                <p class="font-medium uppercase text-gray-500 dark:text-gray-300">Enterprise</p>

                <h2 class="text-5xl font-bold uppercase text-gray-800 dark:text-gray-100">$100</h2>

                <p class="font-medium text-gray-500 dark:text-gray-300">Life time</p>

                <button
                    class="mt-10 w-full transform rounded-md bg-blue-600 px-4 py-2 capitalize tracking-wide text-white transition-colors duration-300 hover:bg-blue-500 focus:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                    Start Now
                </button>
            </div>
        </div>
    </div>
</div>
--}}
{{--}}<section class="bg-white dark:bg-gray-900">
    <div class="container mx-auto max-w-4xl px-6 py-10">
        <h1 class="text-center text-4xl font-semibold text-gray-800 dark:text-white">Frequently asked questions</h1>

        <div class="mt-12 space-y-8">
            <div class="rounded-lg border-2 border-gray-100 dark:border-gray-700">
                <button class="flex w-full items-center justify-between p-8">
                    <h1 class="font-semibold text-gray-700 dark:text-white">How i can play for my appoinment ?</h1>

                    <span class="rounded-full bg-gray-200 text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6"/>
                </svg>
            </span>
                </button>

                <hr class="border-gray-200 dark:border-gray-700"/>

                <p class="p-8 text-sm text-gray-500 dark:text-gray-300">Lorem ipsum dolor sit, amet consectetur
                    adipisicing elit. Voluptas eaque nobis, fugit odit omnis fugiat deleniti animi ab maxime cum
                    laboriosam recusandae facere dolorum veniam quia pariatur obcaecati illo ducimus?</p>
            </div>

            <div class="rounded-lg border-2 border-gray-100 dark:border-gray-700">
                <button class="flex w-full items-center justify-between p-8">
                    <h1 class="font-semibold text-gray-700 dark:text-white">Is the cost of the appoinment covered by
                        private health insurance?</h1>

                    <span class="rounded-full bg-blue-500 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
            </span>
                </button>
            </div>

            <div class="rounded-lg border-2 border-gray-100 dark:border-gray-700">
                <button class="flex w-full items-center justify-between p-8">
                    <h1 class="font-semibold text-gray-700 dark:text-white">Do i need a referral?</h1>

                    <span class="rounded-full bg-blue-500 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
            </span>
                </button>
            </div>

            <div class="rounded-lg border-2 border-gray-100 dark:border-gray-700">
                <button class="flex w-full items-center justify-between p-8">
                    <h1 class="font-semibold text-gray-700 dark:text-white">What are your opening house?</h1>

                    <span class="rounded-full bg-blue-500 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
            </span>
                </button>
            </div>

            <div class="rounded-lg border-2 border-gray-100 dark:border-gray-700">
                <button class="flex w-full items-center justify-between p-8">
                    <h1 class="font-semibold text-gray-700 dark:text-white">What can i expect at my first
                        consultation?</h1>

                    <span class="rounded-full bg-blue-500 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
            </span>
                </button>
            </div>
        </div>
    </div>
</section>--}}
{{--}}
<section
    class="min-h-screen bg-gradient-to-r from-blue-600 via-blue-800 to-blue-900 dark:from-gray-700 dark:via-gray-800 dark:to-gray-900">
    <div class="container mx-auto flex min-h-screen flex-col px-6 py-12">
        <div class="flex-1 lg:-mx-6 lg:flex lg:items-center">
            <div class="text-white lg:mx-6 lg:w-1/2">
                <h1 class="text-3xl font-semibold capitalize lg:text-5xl">Get a quote</h1>

                <p class="mt-6 max-w-xl">Ask us everything and we would love to hear from you</p>

                <div class="mt-6 space-y-8 md:mt-8">
                    <p class="-mx-2 flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 h-6 w-6 text-white" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>

                        <span class="mx-2 w-72 truncate text-white"> Cecilia Chapman 711-2880 Nulla St. Mankato Mississippi 96522 </span>
                    </p>

                    <p class="-mx-2 flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 h-6 w-6 text-white" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>

                        <span class="mx-2 w-72 truncate text-white">(257) 563-7401</span>
                    </p>

                    <p class="-mx-2 flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 h-6 w-6 text-white" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>

                        <span class="mx-2 w-72 truncate text-white">acb@example.com</span>
                    </p>
                </div>

                <div class="mt-6 md:mt-8">
                    <h3 class="text-gray-300">Follow us</h3>

                    <div class="-mx-1.5 mt-4 flex">
                        <a class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500"
                           href="#">
                            <svg class="h-10 w-10 fill-current" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18.6668 6.67334C18.0002 7.00001 17.3468 7.13268 16.6668 7.33334C15.9195 6.49001 14.8115 6.44334 13.7468 6.84201C12.6822 7.24068 11.9848 8.21534 12.0002 9.33334V10C9.83683 10.0553 7.91016 9.07001 6.66683 7.33334C6.66683 7.33334 3.87883 12.2887 9.3335 14.6667C8.0855 15.498 6.84083 16.0587 5.3335 16C7.53883 17.202 9.94216 17.6153 12.0228 17.0113C14.4095 16.318 16.3708 14.5293 17.1235 11.85C17.348 11.0351 17.4595 10.1932 17.4548 9.34801C17.4535 9.18201 18.4615 7.50001 18.6668 6.67268V6.67334Z"/>
                            </svg>
                        </a>

                        <a class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500"
                           href="#">
                            <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.2 8.80005C16.4731 8.80005 17.694 9.30576 18.5941 10.2059C19.4943 11.1061 20 12.327 20 13.6V19.2H16.8V13.6C16.8 13.1757 16.6315 12.7687 16.3314 12.4687C16.0313 12.1686 15.6244 12 15.2 12C14.7757 12 14.3687 12.1686 14.0687 12.4687C13.7686 12.7687 13.6 13.1757 13.6 13.6V19.2H10.4V13.6C10.4 12.327 10.9057 11.1061 11.8059 10.2059C12.7061 9.30576 13.927 8.80005 15.2 8.80005Z"
                                    fill="currentColor"/>
                                <path d="M7.2 9.6001H4V19.2001H7.2V9.6001Z" fill="currentColor"/>
                                <path
                                    d="M5.6 7.2C6.48366 7.2 7.2 6.48366 7.2 5.6C7.2 4.71634 6.48366 4 5.6 4C4.71634 4 4 4.71634 4 5.6C4 6.48366 4.71634 7.2 5.6 7.2Z"
                                    fill="currentColor"/>
                            </svg>
                        </a>

                        <a class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500"
                           href="#">
                            <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 10.2222V13.7778H9.66667V20H13.2222V13.7778H15.8889L16.7778 10.2222H13.2222V8.44444C13.2222 8.2087 13.3159 7.9826 13.4826 7.81591C13.6493 7.64921 13.8754 7.55556 14.1111 7.55556H16.7778V4H14.1111C12.9324 4 11.8019 4.46825 10.9684 5.30175C10.1349 6.13524 9.66667 7.2657 9.66667 8.44444V10.2222H7Z"
                                    fill="currentColor"/>
                            </svg>
                        </a>

                        <a class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500"
                           href="#">
                            <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.9294 7.72275C9.65868 7.72275 7.82715 9.55428 7.82715 11.825C7.82715 14.0956 9.65868 15.9271 11.9294 15.9271C14.2 15.9271 16.0316 14.0956 16.0316 11.825C16.0316 9.55428 14.2 7.72275 11.9294 7.72275ZM11.9294 14.4919C10.462 14.4919 9.26239 13.2959 9.26239 11.825C9.26239 10.354 10.4584 9.15799 11.9294 9.15799C13.4003 9.15799 14.5963 10.354 14.5963 11.825C14.5963 13.2959 13.3967 14.4919 11.9294 14.4919ZM17.1562 7.55495C17.1562 8.08692 16.7277 8.51178 16.1994 8.51178C15.6674 8.51178 15.2425 8.08335 15.2425 7.55495C15.2425 7.02656 15.671 6.59813 16.1994 6.59813C16.7277 6.59813 17.1562 7.02656 17.1562 7.55495ZM19.8731 8.52606C19.8124 7.24434 19.5197 6.10901 18.5807 5.17361C17.6453 4.23821 16.51 3.94545 15.2282 3.88118C13.9073 3.80621 9.94787 3.80621 8.62689 3.88118C7.34874 3.94188 6.21341 4.23464 5.27444 5.17004C4.33547 6.10544 4.04628 7.24077 3.98201 8.52249C3.90704 9.84347 3.90704 13.8029 3.98201 15.1238C4.04271 16.4056 4.33547 17.5409 5.27444 18.4763C6.21341 19.4117 7.34517 19.7045 8.62689 19.7687C9.94787 19.8437 13.9073 19.8437 15.2282 19.7687C16.51 19.708 17.6453 19.4153 18.5807 18.4763C19.5161 17.5409 19.8089 16.4056 19.8731 15.1238C19.9481 13.8029 19.9481 9.84704 19.8731 8.52606ZM18.1665 16.5412C17.8881 17.241 17.349 17.7801 16.6456 18.0621C15.5924 18.4799 13.0932 18.3835 11.9294 18.3835C10.7655 18.3835 8.26272 18.4763 7.21307 18.0621C6.51331 17.7837 5.9742 17.2446 5.69215 16.5412C5.27444 15.488 5.37083 12.9888 5.37083 11.825C5.37083 10.6611 5.27801 8.15832 5.69215 7.10867C5.97063 6.40891 6.50974 5.8698 7.21307 5.58775C8.26629 5.17004 10.7655 5.26643 11.9294 5.26643C13.0932 5.26643 15.596 5.17361 16.6456 5.58775C17.3454 5.86623 17.8845 6.40534 18.1665 7.10867C18.5843 8.16189 18.4879 10.6611 18.4879 11.825C18.4879 12.9888 18.5843 15.4916 18.1665 16.5412Z"
                                    fill="currentColor"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-8 lg:mx-6 lg:w-1/2">
                <div
                    class="mx-auto w-full overflow-hidden rounded-xl bg-white px-8 py-10 shadow-2xl dark:bg-gray-900 lg:max-w-xl">
                    <h1 class="text-2xl font-medium text-gray-700 dark:text-gray-200">Contact form</h1>

                    <form class="mt-6">
                        <div class="flex-1">
                            <label class="mb-2 block text-sm text-gray-600 dark:text-gray-200">Full Name</label>
                            <input type="text" placeholder="John Doe"
                                   class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-5 py-3 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300"/>
                        </div>

                        <div class="mt-6 flex-1">
                            <label class="mb-2 block text-sm text-gray-600 dark:text-gray-200">Email address</label>
                            <input type="email" placeholder="johndoe@example.com"
                                   class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-5 py-3 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300"/>
                        </div>

                        <div class="mt-6 w-full">
                            <label class="mb-2 block text-sm text-gray-600 dark:text-gray-200">Message</label>
                            <textarea
                                class="mt-2 block h-32 w-full rounded-md border border-gray-200 bg-white px-5 py-3 text-gray-700 placeholder-gray-400 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300 md:h-48"
                                placeholder="Message"></textarea>
                        </div>

                        <button
                            class="mt-6 w-full transform rounded-md bg-blue-600 px-6 py-3 text-sm font-medium capitalize tracking-wide text-white transition-colors duration-300 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-400 focus:ring-opacity-50">
                            get in touch
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>--}}

<footer class="bg-white dark:bg-gray-900">
    <div class="container mx-auto px-6 py-12">
        <div class="md:-mx-3 md:flex md:items-center md:justify-between">

            <div class="mt-6 shrink-0 md:mx-3 md:mt-0 md:w-auto">


                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="mx-2 h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"/>
                    </svg>
                </a>
            </div>
        </div>

        <hr class="my-6 border-gray-200 dark:border-gray-700 md:my-10"/>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <div>
                <p class="font-semibold text-gray-800 dark:text-white">Quick Link</p>

                <div class="mt-5 flex flex-col items-start space-y-2">
                    <a href="#"
                       class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Home</a>
                    <a href="#"
                       class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Who
                        We Are</a>
                    <a href="#"
                       class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Our
                        Philosophy</a>
                </div>
            </div>

            <div>
                <p class="font-semibold text-gray-800 dark:text-white">Industries</p>

                <div class="mt-5 flex flex-col items-start space-y-2">
                    <a href="#"
                       class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Retail
                        & E-Commerce</a>
                    <a href="#"
                       class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Information
                        Technology</a>
                    <a href="#"
                       class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Finance
                        & Insurance</a>
                </div>
            </div>

            <div>
                <p class="font-semibold text-gray-800 dark:text-white">Services</p>

                <div class="mt-5 flex flex-col items-start space-y-2">
                    <a href="#"
                       class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Translation</a>
                    <a href="#"
                       class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Proofreading
                        & Editing</a>
                    <a href="#"
                       class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Content
                        Creation</a>
                </div>
            </div>

            <div>
                <p class="font-semibold text-gray-800 dark:text-white">Contact Us</p>

                <div class="mt-5 flex flex-col items-start space-y-2">
                    <a href="#"
                       class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">+880
                        768 473 4978</a>
                    <a href="#"
                       class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">info@merakiui.com</a>
                </div>
            </div>
        </div>

        <hr class="my-6 border-gray-200 dark:border-gray-700 md:my-10"/>

        <div class="flex flex-col items-center justify-between sm:flex-row">
            <a href="#"
               class="text-2xl font-bold text-gray-800 transition-colors duration-300 hover:text-gray-700 dark:text-white dark:hover:text-gray-300">Brand</a>

            <p class="mt-4 text-sm text-gray-500 dark:text-gray-300 sm:mt-0">© Copyright 2021. All Rights Reserved.</p>
        </div>
    </div>
</footer>
</div>
</body>
</html>
