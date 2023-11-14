@extends('layouts.client')
@section('main')
    <!-- Start Content -->
    <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">
        <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
            <div class="flex items-start justify-between">
                <div class="flex flex-col space-y-2">
                    <span class="text-gray-400">My Boarding Places</span>
                    @if($my_boarding_place == 'null')
                        <h1 class="text-2xl p-5 font-bold">{{$my_bsoarding_place->name}}</h1>
                    @else
                        <a class="text-red-400 bold" href="{{route('welcome')}}">Register New Boarding</a>
                    @endif
                </div>
                <div>
                    <img src="{{asset('asserts/gifs/boarding_place.gif')}}" class="h-32 w-full" alt="">
                </div>
            </div>
        </div>
        <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
            <div class="flex items-start justify-between">
                <div class="flex flex-col space-y-2">
                    <span class="text-gray-400">My Boarders</span>
                    @if($my_boarding_place == 'null')
                        <h1 class="text-2xl p-5 font-bold">1</h1>
                    @else
                        No data available
                    @endif
                </div>
                <div>
                    <img src="{{asset('asserts/gifs/waving.gif')}}" class="h-32 w-full" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Table see (https://tailwindui.com/components/application-ui/lists/tables) -->
    <h3 class="mt-6 text-xl">Boarding Mates</h3>
    <div class="flex flex-col mt-6">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                    @if($same_reserved_boarding == 'null')
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
                            @foreach($same_reserved_boarding as $my_boarder)
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
                                                    class="text-sm font-medium text-gray-900">{{\App\Models\User::where('id', $my_boarder->boarder_id)->first()['name']}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{\App\Models\User::where('id', $my_boarder->boarder_id)->first()['email']}}</td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$my_boarding_place->name}}
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
                    @else
                        <div class="justify-center">
                            <center class="p-24 m-auto">
                                <svg class="emoji-404 " enable-background="new 0 0 226 249.135" height="249.135"
                                     id="Layer_1" overflow="visible" version="1.1" viewBox="0 0 226 249.135" width="226"
                                     xml:space="preserve"><circle cx="113" cy="113" fill="#FFE585" r="109"/>
                                    <line enable-background="new    " fill="none" opacity="0.29" stroke="#6E6E96"
                                          stroke-linecap="round" stroke-linejoin="round" stroke-width="8" x1="88.866"
                                          x2="136.866" y1="245.135" y2="245.135"/>
                                    <line enable-background="new    " fill="none" opacity="0.17" stroke="#6E6E96"
                                          stroke-linecap="round" stroke-linejoin="round" stroke-width="8" x1="154.732"
                                          x2="168.732" y1="245.135" y2="245.135"/>
                                    <line enable-background="new    " fill="none" opacity="0.17" stroke="#6E6E96"
                                          stroke-linecap="round" stroke-linejoin="round" stroke-width="8" x1="69.732"
                                          x2="58.732" y1="245.135" y2="245.135"/>
                                    <circle cx="68.732" cy="93" fill="#6E6E96" r="9"/>
                                    <path
                                        d="M115.568,5.947c-1.026,0-2.049,0.017-3.069,0.045  c54.425,1.551,98.069,46.155,98.069,100.955c0,55.781-45.219,101-101,101c-55.781,0-101-45.219-101-101  c0-8.786,1.124-17.309,3.232-25.436c-3.393,10.536-5.232,21.771-5.232,33.436c0,60.199,48.801,109,109,109s109-48.801,109-109  S175.768,5.947,115.568,5.947z"
                                        enable-background="new    " fill="#FF9900" opacity="0.24"/>
                                    <circle cx="156.398" cy="93" fill="#6E6E96" r="9"/>
                                    <ellipse cx="67.732" cy="140.894" enable-background="new    " fill="#FF0000"
                                             opacity="0.18" rx="17.372" ry="8.106"/>
                                    <ellipse cx="154.88" cy="140.894" enable-background="new    " fill="#FF0000"
                                             opacity="0.18" rx="17.371" ry="8.106"/>
                                    <path
                                        d="M13,118.5C13,61.338,59.338,15,116.5,15c55.922,0,101.477,44.353,103.427,99.797  c0.044-1.261,0.073-2.525,0.073-3.797C220,50.802,171.199,2,111,2S2,50.802,2,111c0,50.111,33.818,92.318,79.876,105.06  C41.743,201.814,13,163.518,13,118.5z"
                                        fill="#FFEFB5"/>
                                    <circle cx="113" cy="113" fill="none" r="109" stroke="#6E6E96"
                                            stroke-width="8"/></svg>
                                <div class=" tracking-widest mt-4">
                                    <span
                                        class="text-gray-500 text-5xl block"><span>No Boarding Mates Could Be Found</span></span>
                                    <span class="text-gray-500 text-xl">Sorry, We couldn't find what you are looking for!, Please Come Back Later</span>

                                </div>
                            </center>
                            <center class="mt-6">
                                <a href="{{route('dashboard')}}"
                                   class="text-gray-500 font-mono text-xl bg-gray-200 p-3 rounded-md hover:shadow-md">Go
                                    back to
                                    Dashboard</a>
                            </center>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
