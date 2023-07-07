<x-app-layout>
    @push('Styles')
        <style>
            [x-cloak] {
                display: none;
            }
        </style>
    @endpush

    <div>
        <div class="flex h-screen overflow-y-hidden bg-white" x-data="setup()"
             x-init="$refs.loading.classList.add('hidden')">
            <!-- Loading screen -->
            <div
                x-ref="loading"
                class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50"
                style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
            >
                Loading.....
            </div>

            <!-- Sidebar backdrop -->
            <div
                x-show.in.out.opacity="isSidebarOpen"
                class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden"
                style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
            ></div>

            <!-- Sidebar -->
            <aside
                x-cloak
                x-transition:enter="transition transform duration-300"
                x-transition:enter-start="-translate-x-full opacity-30  ease-in"
                x-transition:enter-end="translate-x-0 opacity-100 ease-out"
                x-transition:leave="transition transform duration-300"
                x-transition:leave-start="translate-x-0 opacity-100 ease-out"
                x-transition:leave-end="-translate-x-full opacity-0 ease-in"
                class="fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform bg-white border-r shadow-lg lg:z-auto lg:static lg:shadow-none"
                :class="{'-translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen}"
            >
                <!-- sidebar header -->
                <div class="flex items-center justify-between flex-shrink-0 p-2"
                     :class="{'lg:justify-center': !isSidebarOpen}">
          <span class="p-2 text-xl font-semibold leading-8 tracking-wider uppercase whitespace-nowrap">
            S<span :class="{'lg:hidden': !isSidebarOpen}">Admin </span>D<span
                  :class="{'lg:hidden': !isSidebarOpen}">ashboard</span>
          </span>
                    <button @click="toggleSidbarMenu()" class="p-2 rounded-md lg:hidden">
                        <svg
                            class="w-6 h-6 text-gray-600"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <!-- Sidebar links -->
                <nav class="flex-1 overflow-hidden hover:overflow-y-auto">
                    <ul class="p-2 overflow-hidden">
                        <li>
                            <a href="{{route('boarding-owner.dashboard')}}"
                               class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                               :class="{'justify-center': !isSidebarOpen}">
                <span>
                <i class="fa-duotone fa-grid-horizontal"></i>
                </span>
                                <span :class="{ 'lg:hidden': !isSidebarOpen }">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('super-admin.boarding-house.index')}}"
                               class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                               :class="{'justify-center': !isSidebarOpen}">
                <span>
                    <i class="fa-regular fa-house"></i>
                </span>
                                <span :class="{ 'lg:hidden': !isSidebarOpen }">Boarding Places</span>
                            </a>
                        </li>
                        <li>
                            <a href="/"
                               class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                               :class="{'justify-center': !isSidebarOpen}">
                <span>
                    <i class="fa-duotone fa-comment-question"></i>
                </span>
                                <span :class="{ 'lg:hidden': !isSidebarOpen }">Questions</span>
                            </a>
                        </li>
                        <!-- Sidebar Links... -->
                    </ul>
                </nav>
                <!-- Sidebar footer -->
                <div class="flex-shrink-0 p-2 border-t max-h-14">
                    <button
                        class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider uppercase bg-gray-100 border rounded-md focus:outline-none focus:ring"
                    >
            <span>
              <svg
                  class="w-6 h-6"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
              >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                />
              </svg>
            </span>
                        <span :class="{'lg:hidden': !isSidebarOpen}"> Logout </span>
                    </button>
                </div>
            </aside>

            <div class="flex flex-col flex-1 h-full overflow-hidden">
                <!-- Navbar -->
                <header class="flex-shrink-0 border-b">
                    <div class="flex items-center justify-between p-2">
                        <!-- Navbar left -->
                        <div class="flex items-center space-x-3">
                            <span class="p-2 text-xl font-semibold tracking-wider uppercase lg:hidden">K-WD</span>
                            <!-- Toggle sidebar button -->
                            <button @click="toggleSidbarMenu()" class="p-2 rounded-md focus:outline-none focus:ring">
                                <svg
                                    class="w-4 h-4 text-gray-600"
                                    :class="{'transform transition-transform -rotate-180': isSidebarOpen}"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13 5l7 7-7 7M5 5l7 7-7 7"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Mobile search box -->
                        <div
                            x-show.transition="isSearchBoxOpen"
                            class="fixed inset-0 z-10 bg-black bg-opacity-20"
                            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
                        >
                            <div
                                @click.away="isSearchBoxOpen = false"
                                class="absolute inset-x-0 flex items-center justify-between p-2 bg-white shadow-md"
                            >
                                <div class="flex items-center flex-1 px-2 space-x-2">
                                    <!-- search icon -->
                                    <span>
                    <svg
                        class="w-6 h-6 text-gray-500"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                      <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                      />
                    </svg>
                  </span>
                                    <input
                                        type="text"
                                        placeholder="Search"
                                        class="w-full px-4 py-3 text-gray-600 rounded-md focus:bg-gray-100 focus:outline-none"
                                    />
                                </div>
                                <!-- close button -->
                                <button @click="isSearchBoxOpen = false" class="flex-shrink-0 p-4 rounded-md">
                                    <svg
                                        class="w-4 h-4 text-gray-500"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Desktop search box -->
                        <div class="items-center hidden px-2 space-x-2 md:flex-1 md:flex md:mr-auto md:ml-5">
                            <!-- search icon -->
                            <span>
                <svg
                    class="w-5 h-5 text-gray-500"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                  <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                  />
                </svg>
              </span>
                            <input
                                type="text"
                                placeholder="Search"
                                class="px-4 py-3 rounded-md hover:bg-gray-100 lg:max-w-sm md:py-2 md:flex-1 focus:outline-none md:focus:bg-gray-100 md:focus:shadow md:focus:border"
                            />
                        </div>

                        <!-- Navbar right -->
                        <div class="relative flex items-center space-x-3">
                            <!-- Search button -->
                            <button
                                @click="isSearchBoxOpen = true"
                                class="p-2 bg-gray-100 rounded-full md:hidden focus:outline-none focus:ring hover:bg-gray-200"
                            >
                                <svg
                                    class="w-6 h-6 text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                    />
                                </svg>
                            </button>

                            <div class="items-center hidden space-x-3 md:flex">
                                <!-- Notification Button -->
                                <div class="relative" x-data="{ isOpen: false }">
                                    <!-- red dot -->
                                    <div class="absolute right-0 p-1 bg-red-400 rounded-full animate-ping"></div>
                                    <div class="absolute right-0 p-1 bg-red-400 border rounded-full"></div>
                                    <button
                                        @click="isOpen = !isOpen"
                                        class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring"
                                    >
                                        <svg
                                            class="w-6 h-6 text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                                            />
                                        </svg>
                                    </button>

                                    <!-- Dropdown card -->
                                    <div
                                        @click.away="isOpen = false"
                                        x-show.transition.opacity="isOpen"
                                        class="absolute w-48 max-w-md mt-3 transform bg-white rounded-md shadow-lg -translate-x-3/4 min-w-max"
                                    >
                                        <div class="p-4 font-medium border-b">
                                            <span class="text-gray-800">Notification</span>
                                        </div>
                                        <ul class="flex flex-col p-2 my-2 space-y-1">
                                            <li>
                                                <a href="#"
                                                   class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Link</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                   class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Another
                                                    Link</a>
                                            </li>
                                        </ul>
                                        <div
                                            class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                                            <a href="#">See All</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Services Button -->
                                <div x-data="{ isOpen: false }">
                                    <button
                                        @click="isOpen = !isOpen"
                                        class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring"
                                    >
                                        <svg
                                            class="w-6 h-6 text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                                            />
                                        </svg>
                                    </button>

                                    <!-- Dropdown -->
                                    <div
                                        @click.away="isOpen = false"
                                        @keydown.escape="isOpen = false"
                                        x-show.transition.opacity="isOpen"
                                        class="absolute mt-3 transform bg-white rounded-md shadow-lg -translate-x-3/4 min-w-max"
                                    >
                                        <div class="p-4 text-lg font-medium border-b">Web apps & services</div>
                                        <ul class="flex flex-col p-2 my-3 space-y-3">
                                            <li>
                                                <a href="#"
                                                   class="flex items-start px-2 py-1 space-x-2 rounded-md hover:bg-gray-100">
                          <span class="block mt-1">
                            <svg
                                class="w-6 h-6 text-gray-500"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                              <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z"/>
                              <path
                                  fill="#fff"
                                  d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
                              />
                              <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
                              />
                            </svg>
                          </span>
                                                    <span class="flex flex-col">
                            <span class="text-lg">Atlassian</span>
                            <span class="text-sm text-gray-400">Lorem ipsum dolor sit.</span>
                          </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                   class="flex items-start px-2 py-1 space-x-2 rounded-md hover:bg-gray-100">
                          <span class="block mt-1">
                            <svg
                                class="w-6 h-6 text-gray-500"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                              <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                              />
                            </svg>
                          </span>
                                                    <span class="flex flex-col">
                            <span class="text-lg">Slack</span>
                            <span class="text-sm text-gray-400"
                            >Lorem ipsum, dolor sit amet consectetur adipisicing elit.</span
                            >
                          </span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div
                                            class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                                            <a href="#">Show all apps</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Options Button -->
                                <div class="relative" x-data="{ isOpen: false }">
                                    <button
                                        @click="isOpen = !isOpen"
                                        class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring"
                                    >
                                        <svg
                                            class="w-6 h-6 text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
                                            />
                                        </svg>
                                    </button>

                                    <!-- Dropdown card -->
                                    <div
                                        @click.away="isOpen = false"
                                        x-show.transition.opacity="isOpen"
                                        class="absolute w-40 max-w-sm mt-3 transform bg-white rounded-md shadow-lg -translate-x-3/4 min-w-max"
                                    >
                                        <div class="p-4 font-medium border-b">
                                            <span class="text-gray-800">Options</span>
                                        </div>
                                        <ul class="flex flex-col p-2 my-2 space-y-1">
                                            <li>
                                                <a href="#"
                                                   class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Link</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                   class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Another
                                                    Link</a>
                                            </li>
                                        </ul>
                                        <div
                                            class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                                            <a href="#">See All</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- avatar button -->
                            <div class="relative" x-data="{ isOpen: false }">
                                <button @click="isOpen = !isOpen"
                                        class="p-1 bg-gray-200 rounded-full focus:outline-none focus:ring">
                                    <img
                                        class="object-cover w-8 h-8 rounded-full"
                                        src="https://avatars0.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                                        alt="Ahmed Kamel"
                                    />
                                </button>
                                <!-- green dot -->
                                <div class="absolute right-0 p-1 bg-green-400 rounded-full bottom-3 animate-ping"></div>
                                <div
                                    class="absolute right-0 p-1 bg-green-400 border border-white rounded-full bottom-3"></div>

                                <!-- Dropdown card -->
                                <div
                                    @click.away="isOpen = false"
                                    x-show.transition.opacity="isOpen"
                                    class="absolute mt-3 transform -translate-x-full bg-white rounded-md shadow-lg min-w-max"
                                >
                                    <div class="flex flex-col p-4 space-y-1 font-medium border-b">
                                        <span class="text-gray-800">Ahmed Kamel</span>
                                        <span class="text-sm text-gray-400">ahmed.kamel@example.com</span>
                                    </div>
                                    <ul class="flex flex-col p-2 my-2 space-y-1">
                                        <li>
                                            <a href="#"
                                               class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Link</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Another
                                                Link</a>
                                        </li>
                                    </ul>
                                    <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                                        <a href="#">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Main content -->
                <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
                    @yield('main')
                </main>
                <!-- Main footer -->
                <footer class="flex items-center justify-between flex-shrink-0 p-4 border-t max-h-14">
                    <div>CodeMastery &copy; 2023</div>
                    <div class="text-sm flex items-center">
                        Made with 💙️ by
                        <a
                            class="text-blue-400 underline"
                            href="https://www.lashendev.tk"
                            target="_blank"
                            rel="noopener noreferrer"
                        > <span class="flex items-center px-2"> LASH <img
                                    src="https://lashendev.tk/images/logo.png" alt="" class="p-2" width="45"
                                    height="45"></span></a
                        >
                    </div>
                    <div>
                        {{--                        <a--}}
                        {{--                            href="#"--}}
                        {{--                            target="_blank"--}}
                        {{--                            class="flex items-center space-x-1"--}}
                        {{--                        >--}}
                        {{--                            <svg class="w-6 h-6 text-gray-400" viewBox="0 0 16 16" fill="currentColor"--}}
                        {{--                                 aria-hidden="true">--}}
                        {{--                                <path--}}
                        {{--                                    fill-rule="evenodd"--}}
                        {{--                                    d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"--}}
                        {{--                                ></path>--}}
                        {{--                            </svg>--}}
                        {{--                            <span class="hidden text-sm md:block">View</span>--}}
                        {{--                        </a>--}}
                    </div>
                </footer>
            </div>

            <!-- Setting panel button -->
            <div>
                <button
                    @click="isSettingsPanelOpen = true"
                    class="fixed right-0 px-4 py-2 text-sm font-medium text-white uppercase transform rotate-90 translate-x-8 bg-gray-600 top-1/2 rounded-b-md"
                >
                    Settings
                </button>
            </div>

            <!-- Settings panel -->
            <div
                x-show="isSettingsPanelOpen"
                @click.away="isSettingsPanelOpen = false"
                x-transition:enter="transition transform duration-300"
                x-transition:enter-start="translate-x-full opacity-30  ease-in"
                x-transition:enter-end="translate-x-0 opacity-100 ease-out"
                x-transition:leave="transition transform duration-300"
                x-transition:leave-start="translate-x-0 opacity-100 ease-out"
                x-transition:leave-end="translate-x-full opacity-0 ease-in"
                class="fixed inset-y-0 right-0 flex flex-col bg-white shadow-lg bg-opacity-20 w-80"
                style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
            >
                <div class="flex items-center justify-between flex-shrink-0 p-2">
                    <h6 class="p-2 text-lg">Settings</h6>
                    <button @click="isSettingsPanelOpen = false" class="p-2 rounded-md focus:outline-none focus:ring">
                        <svg
                            class="w-6 h-6 text-gray-600"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="flex-1 max-h-full p-4 overflow-hidden hover:overflow-y-scroll">
                    <span>Settings Content</span>
                    <!-- Settings Panel Content ... -->
                </div>
            </div>
        </div>
    </div>
    @push('Scripts')
        <script>
            const setup = () => {
                function getSidebarStateFromLocalStorage() {
                    // if it already there, use it
                    if (window.localStorage.getItem('isSidebarOpen')) {
                        return JSON.parse(window.localStorage.getItem('isSidebarOpen'))
                    }

                    // else return the initial state you want
                    return false
                }

                function setSidebarStateToLocalStorage(value) {
                    window.localStorage.setItem('isSidebarOpen', value)
                }

                return {
                    loading: true,
                    isSidebarOpen: getSidebarStateFromLocalStorage(),
                    toggleSidbarMenu() {
                        this.isSidebarOpen = !this.isSidebarOpen
                        setSidebarStateToLocalStorage(this.isSidebarOpen)
                    },
                    isSettingsPanelOpen: false,
                    isSearchBoxOpen: false,
                }
            }
        </script>
    @endpush
</x-app-layout>