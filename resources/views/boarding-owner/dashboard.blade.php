@extends('layouts.boarding-owner')
@section('main')
    <!-- Main content header -->
    {{--    <div--}}
    {{--        class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row"--}}
    {{--    >--}}
    {{--        <h1 class="text-2xl font-semibold whitespace-nowrap">Dashboard</h1>--}}
    {{--        <div class="space-y-6 md:space-x-2 md:space-y-0">--}}
    {{--            <a--}}
    {{--                href=""--}}
    {{--                target="_blank"--}}
    {{--                class="inline-flex items-center justify-center px-4 py-1 space-x-1 bg-gray-200 rounded-md shadow hover:bg-opacity-20"--}}
    {{--            >--}}
    {{--                                  <span>--}}
    {{--                                    <svg class="w-4 h-4 text-gray-500" viewBox="0 0 16 16" fill="currentColor"--}}
    {{--                                         aria-hidden="true">--}}
    {{--                                      <path--}}
    {{--                                          fill-rule="evenodd"--}}
    {{--                                          d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"--}}
    {{--                                      ></path>--}}
    {{--                                    </svg>--}}
    {{--                                  </span>--}}
    {{--                <span>View on Github</span>--}}
    {{--            </a>--}}
    {{--            <a--}}
    {{--                href="https://kamona-wd.github.io/kwd-dashboard/"--}}
    {{--                target="_blank"--}}
    {{--                class="inline-flex items-center justify-center px-4 py-1 space-x-1 bg-red-500 text-white rounded-md shadow animate-bounce hover:bg-red-600"--}}
    {{--            >--}}
    {{--                <span>See Dark & Light version</span>--}}
    {{--            </a>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <!-- Start Content -->
    <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">
        <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
            <div class="flex items-start justify-between">
                <div class="flex flex-col space-y-2">
                    <span class="text-gray-400">Total Boarding Places</span>
                    <h1 class="text-2xl p-5 font-bold">{{$boarding_places->count()}}</h1>
                </div>
                <div>
                    <img src="{{asset('asserts/gifs/boarding_place.gif')}}" class="h-32 w-full" alt="">
                </div>
            </div>
        </div>
        <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
            <div class="flex items-start justify-between">
                <div class="flex flex-col space-y-2">
                    <span class="text-gray-400">Total Earnings</span>
                    <h1 class="text-2xl p-5 font-bold">Rs. 5000</h1>
                </div>
                <div>
                    <img src="{{asset('asserts/gifs/dollar.gif')}}" class="h-32 w-full" alt="">
                </div>
            </div>
        </div>
        <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
            <div class="flex items-start justify-between">
                <div class="flex flex-col space-y-2">
                    <span class="text-gray-400">Total Boarders</span>
                    <h1 class="text-2xl p-5 font-bold">12</h1>
                </div>
                <div>
                    <img src="{{asset('asserts/gifs/waving.gif')}}" class="h-32 w-full" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Table see (https://tailwindui.com/components/application-ui/lists/tables) -->
    <h3 class="mt-6 text-xl">Boarders</h3>
    <div class="flex flex-col mt-6">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                    <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >
                                Name
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >
                                Boarding Name
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >
                                Payment Status
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >
                                Role
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">
                                        <img
                                            class="w-10 h-10 rounded-full"
                                            src="https://avatars0.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                                            alt=""
                                        />
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Ahmed Kamel
                                        </div>
                                        <div class="text-sm text-gray-500">ahmed.kamel@example.com
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Jayagama B
                                </div>
                                <div class="text-sm text-gray-500">Jayagama</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"
                            >
                              Done
                            </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">Student UWU</td>
                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
