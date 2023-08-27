@extends('layouts.admin')
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
                    <h1 class="text-2xl p-5 font-bold">{{count($boarding_places)}}</h1>
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
                    <h1 class="text-2xl p-5 font-bold">Rs. 0</h1>
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
                    <h1 class="text-2xl p-5 font-bold">
                        {{count($reserved_boarders_ids)}}
                    </h1>
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
                                Email
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

                            {{--                            <th scope="col" class="relative px-6 py-3">--}}
                            {{--                                <span class="sr-only">Edit</span>--}}
                            {{--                            </th>--}}
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($reserved_boarders_ids as $reserved_boarders_id)
                            <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img
                                                class="w-10 h-10 rounded-full"
                                                src="data:image/png;base64,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"
                                                alt=""
                                            />
                                        </div>
                                        <div class="ml-4">
                                            <div
                                                class="text-sm font-medium text-gray-900">{{\App\Models\User::where('id', $reserved_boarders_id)->first()['name']}}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{\App\Models\User::where('id', $reserved_boarders_id)->first()['email']}}</td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php($boarding_id = (\App\Models\ReservedBoardingPlaces::where('boarder_id', $reserved_boarders_id)->first()['boarding_place_id']))
                                    <div
                                        class="text-sm text-gray-900">{{\App\Models\BoardingPlace::where('id', $boarding_id)->first()['name']}}
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
                                {{--                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">--}}
                                {{--                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>--}}
                                {{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
