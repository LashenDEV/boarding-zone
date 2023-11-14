@extends('layouts.page')
@section('main')
    <main>
        <section class="bg-white :bg-gray-900">
            <div class="text-center">
                <div class="flex justify-center">
                    <img class="h-100 w-full object-cover lg:w-6/5"
                         src="{{asset('asserts/images/home/Bz.png')}}"/>
                </div>
            </div>
        </section>

        <!--Featured Section-->
        <section class="text-gray-700 body-font">
            <div class="container mx-auto flex px-5 py-12 md:flex-row flex-col items-center">
                <div
                    class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center"
                    data-aos="slide-right" data-aos-offset="100" data-aos-duration="1000">
                    <h1 class="title-font sm:text-4xl text-3xl mb-2 font-semibold text-gray-800 italic">Welcome to
                        BOARDINGZONE!</h1>
                    </h2>
                    <h2 class="title-font sm:text-2xl text-3xl mb-12 font-light text-gray-700 italic">
                        Your Gateway to Ideal Boarding...
                    </h2>
                    <h3 class="title-font sm:text-2xl text-xl mb-4 font-medium text-gray-700">🏡 Find Your Perfect
                        Boarding Home
                    </h3>
                    <p class="mb-8 leading-relaxed">Discover a smooth and personalized experience in locating the best
                        boarding facility for your requirements.
                        Our platform links you with a wide variety of boarding alternatives, ensuring that you feel at
                        ease wherever you travel.</p>
                    <div class="flex justify-center">
                        <a href="{{url('/#boarding-places')}}">
                            <button
                                class="inline-flex text-white bg-indigo-500  py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded-lg text-lg">
                                View Boardings
                            </button>
                        </a>
                        <a href="{{url('/#our-features')}}">
                            <button
                                class="ml-4 inline-flex text-gray-700 bg-gray-200 py-2 px-4 focus:outline-none hover:bg-gray-300 rounded-lg text-lg">
                                More Features
                            </button>
                        </a>
                    </div>
                </div>
                    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6" data-aos="slide-left" data-aos-offset="150"
                         data-aos-duration="1000">
                    <img class="object-cover object-center rounded w-full h-full" alt="hero"
                         src="{{asset('asserts/images/home/IMG 4.jpg')}}">
                </div>
            </div>
            <section class="text-gray-700 body-font border-t border-gray-200 py-12" data-aos="fade"
                     data-aos-offset="150" data-aos-duration="1000">
                <div class="container px-5 mx-auto flex flex-wrap">
                    <div class="lg:w-1/2 w-full mb-10 lg:mb-0 rounded-lg overflow-hidden">
                        <img alt="feature" class="object-cover object-center h-full w-full"
                             src="{{asset('asserts/images/home/room.jpg')}}">
                    </div>
                    <div class="flex flex-col flex-wrap lg:py-6 mb-10 lg:w-1/2 lg:pl-12 lg:text-left text-center">
                        <div class="flex flex-col mb-12 lg:items-start items-center" data-aos="slide-left" data-aos-easing="ease-in-out"
                             data-aos-offset="100" data-aos-duration="1000">
                            <div class="flex-grow">
                                <h2 class="text-gray-900 text-lg title-font font-medium mb-3">🌴 Discover Paradise:</h2>
                                <p class="leading-relaxed text-base">Explore our chosen collection of boarding spots in
                                    the midst of Sri Lanka's breathtaking sceneries.
                                    We've got your perfect stay covered, from lush tea estates to gorgeous beaches.
                                </p>
                                <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                         stroke-linejoin="round"
                                         stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col mb-12 lg:items-start items-center" data-aos="slide-left" data-aos-easing="ease-in-out"
                             data-aos-offset="100" data-aos-duration="1000">
                            <div class="flex-grow">
                                <h2 class="text-gray-900 text-lg title-font font-medium mb-3">🏡 Diverse
                                    Accommodations:</h2>
                                <p class="leading-relaxed text-base">Whether you're looking for the peace and quiet of a
                                    tiny accommodation,
                                    the comforts of a seaside house, or the cultural appeal of a historic residence,
                                    Boardingzone has a variety of accommodations to fit any traveler's preferences.
                                </p>
                                <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                         stroke-linejoin="round"
                                         stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col mb-12 lg:items-start items-center" data-aos="slide-left" data-aos-easing="ease-in-out"
                             data-aos-offset="150" data-aos-duration="1000">
                            <div class="flex-grow">
                                <h2 class="text-gray-900 text-lg title-font font-medium mb-3">🌐 Book with
                                    Confidence: </h2>
                                <p class="leading-relaxed text-base">Feel confident as you capture your share of our
                                    country calmness.
                                    You'll have more time to look forward to the joys of the next journey with our
                                    simple reservation procedure and secure payment options.
                                </p>
                                <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                         stroke-linejoin="round"
                                         stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col mb-12 lg:items-start items-center" data-aos="slide-left" data-aos-easing="ease-in-out"
                             data-aos-offset="150" data-aos-duration="1000">
                            <div class="flex-grow">
                                <h2 class="text-gray-900 text-lg title-font font-medium mb-3">🌳 Eco-Friendly
                                    Retreats:</h2>
                                <p class="leading-relaxed text-base">Find environmentally aware accommodations that have
                                    a positive impact on the surrounding area. Choose eco-friendly accommodation where
                                    each reservation helps to protect Sri Lanka's beautiful landscape for future
                                    generations.

                                </p>
                                <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                         stroke-linejoin="round"
                                         stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <!--End of Featured Section-->

        <!--Boarding Section-->
        <section class="text-gray-700 body-font border-t border-gray-200 py-12 boarding-section" data-aos="fade"
                 data-aos-offset="100" data-aos-duration="1000" id="boarding-places">
            <div class="container mx-auto">
                <livewire:boarding-places/>
            </div>
        </section>


        <!--Our Key Features Section-->
        <section class="text-gray-900 body-font border-t border-gray-200" id="our-features" data-aos="fade" data-aos-easing="ease-in-out"
                 data-aos-offset="150" data-aos-duration="1300">
            <div class="mx-auto px-5 py-24">
                <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 :text-white lg:text-5xl">
                    Our Key Features
                </h1>
                <p class="mt-4 text-center text-gray-500 :text-gray-300">Take a look at some of our key features</p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-24 p-12 text-blue-500">
                    <div class="flex flex-col justify-center items-center" data-aos="fade-up" data-aos-easing="ease-in-out"
                         data-aos-offset="150" data-aos-duration="1300" >
                        <i class="fa-solid fa-magnifying-glass fa-5x"></i>
                        <h2 class="mt-7 text-xl font-semibold capitalize text-gray-600 :text-white mb-2">Bording
                            Finder</h2>
                        <p class="font-light text-gray-800 text-center align-middle">Boardingzone gives you access to a
                            range of locations, including peaceful towns to busy metropolitan cores. Navigate our
                            extensive database to find the ideal area that complements your tastes and way of life.
                        </p>
                    </div>
                    <div class="flex flex-col justify-center items-center" data-aos="fade-up" data-aos-easing="ease-in-out"
                         data-aos-offset="150" data-aos-duration="1300">
                        <i class="fa-solid fa-handshake-angle fa-5x"></i>
                        <h2 class="mt-7 text-xl font-semibold capitalize text-gray-600 :text-white mb-2">Academic
                            Support Service</h2>
                        <p class="font-light text-gray-800 text-center align-middle">Our user-friendly design makes it
                            simple to choose your optimal boarding area.
                            Boardingzone makes it easy to find your future home, whether you're a student, professional,
                            or somewhere in between.
                        </p>
                    </div>
                    <div class="flex flex-col justify-center items-center" data-aos="fade-up" data-aos-easing="ease-in-out"
                         data-aos-offset="150" data-aos-duration="1300">
                        <i class="fa-solid fa-solid fa-shield-halved fa-5x"></i>
                        <h2 class="mt-7 text-xl font-semibold capitalize text-gray-600 :text-white mb-2">Security
                            Service</h2>
                        <p class="font-light text-gray-800 text-center align-middle">
                            Boardingzone lists the most secure boarding facilities and
                            we guarantee the security of your information.
                            Implementing strong encryption techniques, upgrading software on a regular basis are
                            critical tasks we follow.
                        </p>
                    </div>
                    <div class="flex flex-col justify-center items-center" data-aos="fade-up" data-aos-easing="ease-in-out"
                         data-aos-offset="150" data-aos-duration="1300">
                        <i class="fa-solid fa-bullhorn fa-5x"></i>
                        <h2 class="mt-7 text-xl font-semibold capitalize text-gray-600 :text-white mb-2">Boarding
                            Adverticesment</h2>
                        <p class="font-light text-gray-800 text-center align-middle">
                            You may post and browse boarding advertisements with confidence, knowing that our strong
                            security procedures focus on the safety and privacy of all users.
                        </p>
                    </div>
                    <div class="flex flex-col justify-center items-center" data-aos="fade-up" data-aos-easing="ease-in-out"
                         data-aos-offset="150" data-aos-duration="1300">
                        <i class="fa-solid fa-dumbbell fa-5x"></i>
                        <h2 class="mt-7 text-xl font-semibold capitalize text-gray-600 :text-white mb-2">Recreational &
                            Fitness Services</h2>
                        <p class="font-light text-gray-800 text-center align-middle">Bordingzone provides residents
                            entertainment and exercise facilities.
                            Residents can locate fitness centers, gyms, and other entertainment options near their
                            boarding house.
                        </p>
                    </div>
                    <div class="flex flex-col justify-center items-center" data-aos="fade-up" data-aos-easing="ease-in-out"
                         data-aos-offset="150" data-aos-duration="1300">
                        <i class="fa-solid fa-plate-utensils fa-5x"></i>
                        <h2 class="mt-7 text-xl font-semibold capitalize text-gray-600 :text-white mb-2">Food
                            Services</h2>
                        <p class="font-light text-gray-800 text-center align-middle">We're more than simply a boarding
                            service, we enrich your experience by connecting you with hotels that provide outstanding
                            food.
                            experience comfort in a single spot.
                        </p>
                    </div>

                </div>
            </div>
        </section>
        <!--End of Our Key Features Section-->

        <section class="text-gray-700 body-font border-t border-gray-200" data-aos="fade" data-aos-easing="ease-in-out"
                 data-aos-offset="150" data-aos-duration="1300">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                    <h1 class="sm:text-4xl text-3xl title-font mb-2 text-gray-900 font-bold">Our Team</h1>
                    <p class="lg:w-1/2 w-full leading-relaxed text-base">
                        Meet our vibrant team. Each team member brings a distinct set of abilities to the table and is
                        made up of skilled people from different backgrounds.
                    </p>
                </div>
                <div class="flex flex-wrap -m-2">
                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full" ata-aos="fade" data-aos-easing="ease-in-out"
                 data-aos-offset="150" data-aos-duration="1300">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                            <img alt="team"
                                 class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                 src="{{asset('asserts/images/home/saruka.jpg')}}">
                            <div class="flex-grow">
                                <h2 class="text-gray-700 title-font font-bold">M.Saruka </h2>
                                <p class="text-gray-500">Data Architecture & DevOps</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full" ata-aos="fade" data-aos-easing="ease-in-out"
                 data-aos-offset="150" data-aos-duration="1300">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                            <img alt="team"
                                 class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                 src="{{asset('asserts/images/home/lashen.jpg')}}">
                            <div class="flex-grow">
                                <h2 class="text-gray-700 title-font font-bold">K.T.L.Sanjula</h2>
                                <p class="text-gray-500">Project Manager & DevOps</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full" ata-aos="fade" data-aos-easing="ease-in-out"
                 data-aos-offset="150" data-aos-duration="1300">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                            <img alt="team"
                                 class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                 src="{{asset('asserts/images/home/disira.jpg')}}">
                            <div class="flex-grow">
                                <h2 class="text-gray-700 title-font font-bold">J.A.D.H.Jayasinghe</h2>
                                <p class="text-gray-500">Analyst & DevOps</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full" ata-aos="fade" data-aos-easing="ease-in-out"
                 data-aos-offset="150" data-aos-duration="1300">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                            <img alt="team"
                                 class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                 src="{{asset('asserts/images/home/pathum.jpg')}}">
                            <div class="flex-grow">
                                <h2 class="text-gray-700 title-font font-bold">W.M.P.L.Weerakoon</h2>
                                <p class="text-gray-500">DevOps</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full" ata-aos="fade" data-aos-easing="ease-in-out"
                 data-aos-offset="150" data-aos-duration="1300">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                            <img alt="team"
                                 class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                 src="{{asset('asserts/images/home/tharindu.jpg')}}">
                            <div class="flex-grow">
                                <h2 class="text-gray-700 title-font font-bold">S.M.T.K.Samarakoon</h2>
                                <p class="text-gray-500">Data Architecture & DevOps</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full" ata-aos="fade" data-aos-easing="ease-in-out"
                 data-aos-offset="150" data-aos-duration="1300">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                            <img alt="team"
                                 class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                 src="{{asset('asserts/images/home/sharmitha.jpg')}}">
                            <div class="flex-grow">
                                <h2 class="text-gray-700 title-font font-bold">A.Sharmitha</h2>
                                <p class="text-gray-500">Security Tester & Designer</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full" ata-aos="fade" data-aos-easing="ease-in-out"
                 data-aos-offset="150" data-aos-duration="1300">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                            <img alt="team"
                                 class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                 src="{{asset('asserts/images/home/sachithra.jpg')}}">
                            <div class="flex-grow">
                                <h2 class="text-gray-700 title-font font-bold">R.M.Sachithra Suvimal</h2>
                                <p class="text-gray-500">Quality Assurance & Devop</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="text-gray-700 body-font border-t border-gray-200" ata-aos="slide-up" data-aos-easing="ease-in-out"
                 data-aos-offset="150" data-aos-duration="1300">
            <div class="container px-5 py-24 mx-auto">
                <div class="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         class="inline-block w-8 h-8 text-gray-400 mb-8"
                         viewBox="0 0 975.036 975.036">
                        <path
                            d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                    </svg>
                    <p class="leading-relaxed text-lg">"At IslandNest Sri Lanka, our mission is to create a diverse
                        collection of accommodations that represent the spirit of our hospitality and culture.
                        We are committed to giving people more than just a place to stay; we aim to link them with
                        vibrant food suppliers and fitness services suppliers."
                    </p>
                    <span class="inline-block h-1 w-10 rounded bg-indigo-500 mt-8 mb-6"></span>
                    <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm">GROUP 07</h2>
                    <p class="text-gray-500">Project Team</p>
                </div>
            </div>
        </section>

        <!--Contact Us Form-->
        <section
            class="bg-gradient-to-r from-blue-600 via-blue-800 to-blue-900 :from-gray-700 :via-gray-800 :to-gray-900">
            <div class="container mx-auto flex min-h-screen flex-col px-6 py-12">
                <div class="flex-1 lg:-mx-6 lg:flex lg:items-center">
                    <div class="text-white lg:mx-6 lg:w-1/2">
                        <h1 class="text-3xl font-semibold capitalize lg:text-5xl">Get a quote</h1>

                        <p class="mt-6 max-w-xl">We welcome your questions and look forward to hearing from you.</p>

                        <div class="mt-6 space-y-8 md:mt-8">
                            <p class="-mx-2 flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 h-6 w-6 text-white" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>

                                <span
                                    class="mx-2 w-72 text-white"> No 123, Boarding Zone PLC, Passara Road, Badulla, Sri Lanka </span>
                            </p>

                            <p class="-mx-2 flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 h-6 w-6 text-white" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>

                                <span class="mx-2 w-72 truncate text-white">055 563 74 01</span>
                            </p>

                            <p class="-mx-2 flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 h-6 w-6 text-white" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>

                                <span class="mx-2 w-72 truncate text-white">info@boardingzone.com</span>
                            </p>
                        </div>

                        <div class="mt-6 md:mt-8">
                            <h3 class="text-gray-300">Follow us</h3>

                            <div class="-mx-1.5 mt-4 flex">
                                <a class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500"
                                   href="/">
                                    <svg class="h-10 w-10 fill-current" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18.6668 6.67334C18.0002 7.00001 17.3468 7.13268 16.6668 7.33334C15.9195 6.49001 14.8115 6.44334 13.7468 6.84201C12.6822 7.24068 11.9848 8.21534 12.0002 9.33334V10C9.83683 10.0553 7.91016 9.07001 6.66683 7.33334C6.66683 7.33334 3.87883 12.2887 9.3335 14.6667C8.0855 15.498 6.84083 16.0587 5.3335 16C7.53883 17.202 9.94216 17.6153 12.0228 17.0113C14.4095 16.318 16.3708 14.5293 17.1235 11.85C17.348 11.0351 17.4595 10.1932 17.4548 9.34801C17.4535 9.18201 18.4615 7.50001 18.6668 6.67268V6.67334Z"/>
                                    </svg>
                                </a>

                                <a class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500"
                                   href="/">
                                    <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
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
                                   href="/">
                                    <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 10.2222V13.7778H9.66667V20H13.2222V13.7778H15.8889L16.7778 10.2222H13.2222V8.44444C13.2222 8.2087 13.3159 7.9826 13.4826 7.81591C13.6493 7.64921 13.8754 7.55556 14.1111 7.55556H16.7778V4H14.1111C12.9324 4 11.8019 4.46825 10.9684 5.30175C10.1349 6.13524 9.66667 7.2657 9.66667 8.44444V10.2222H7Z"
                                            fill="currentColor"/>
                                    </svg>
                                </a>

                                <a class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500"
                                   href="/">
                                    <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
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
                            class="mx-auto w-full overflow-hidden rounded-xl bg-white px-8 py-10 shadow-2xl :bg-gray-900 lg:max-w-xl">
                            <h1 class="text-2xl font-medium text-gray-700 :text-gray-200">Contact form</h1>

                            <form class="mt-6">
                                <div class="flex-1">
                                    <label class="mb-2 block text-sm text-gray-600 :text-gray-200">Full
                                        Name</label>
                                    <input type="text" placeholder="John Doe"
                                           class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-5 py-3 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 :border-gray-600 :bg-gray-900 :text-gray-300 :focus:border-blue-300"/>
                                </div>

                                <div class="mt-6 flex-1">
                                    <label class="mb-2 block text-sm text-gray-600 :text-gray-200">Email
                                        address</label>
                                    <input type="email" placeholder="johndoe@example.com"
                                           class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-5 py-3 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 :border-gray-600 :bg-gray-900 :text-gray-300 :focus:border-blue-300"/>
                                </div>

                                <div class="mt-6 w-full">
                                    <label
                                        class="mb-2 block text-sm text-gray-600 :text-gray-200">Message</label>
                                    <textarea
                                        class="mt-2 block h-32 w-full rounded-md border border-gray-200 bg-white px-5 py-3 text-gray-700 placeholder-gray-400 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 :border-gray-600 :bg-gray-900 :text-gray-300 :focus:border-blue-300 md:h-48"
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
        </section>
        <!--End of Contact Us Form-->
    </main>
@endsection
