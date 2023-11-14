@section('main')
    <div>
        <div class="container mx-auto my-5 p-5">
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                @if($my_boarding_place !== null)
                    <div class="w-full md:w-3/12 md:mx-2">
                        <!-- Profile Card -->
                        <div class="bg-white p-3 border-t-4 border-green-400">
                            <div class="image overflow-hidden">
                                <img class="h-auto w-full mx-auto"
                                     src="{{asset('storage/' . $my_boarding_place->thumbnail)}}"
                                     alt="">
                            </div>
                            <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$my_boarding_place->name}}</h1>
                            <h3 class="text-gray-600 font-lg text-semibold leading-6">Owner
                                - {{\App\Models\User::where('id', $my_boarding_place->bowner_id)->first()['name']}}</h3>
                            <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">{{$my_boarding_place->description}}</p>
                            <ul
                                class="text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                                <li class="flex items-center py-3">
                                    <span>Status</span>
                                    <span class="ml-auto"><span
                                            class="bg-green-500 py-1 px-2 rounded text-white text-sm">{{$my_boarding_place->is_reserved == 'Yes' ? 'Booked' : 'Vacant'}}</span></span>
                                </li>
                                <li class="flex items-center py-3">
                                    <span>Reserved since</span>
                                    <span
                                        class="ml-auto">{{$reserved_boarding_place->created_at->diffForHumans()}}</span>
                                </li>
                            </ul>
                        </div>
                        <!-- End of profile card -->
                        <div class="my-4"></div>
                        <!-- Friends card -->
                        {{--                    <div class="bg-white p-3 hover:shadow">--}}
                        {{--                        <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">--}}
                        {{--                        <span class="text-green-500">--}}
                        {{--                            <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"--}}
                        {{--                                 viewBox="0 0 24 24" stroke="currentColor">--}}
                        {{--                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
                        {{--                                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>--}}
                        {{--                            </svg>--}}
                        {{--                        </span>--}}
                        {{--                            <span>Similar Profiles</span>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="grid grid-cols-3">--}}
                        {{--                            <div class="text-center my-2">--}}
                        {{--                                <img class="h-16 w-16 rounded-full mx-auto"--}}
                        {{--                                     src="https://cdn.australianageingagenda.com.au/wp-content/uploads/2015/06/28085920/Phil-Beckett-2-e1435107243361.jpg"--}}
                        {{--                                     alt="">--}}
                        {{--                                <a href="#" class="text-main-color">Kojstantin</a>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="text-center my-2">--}}
                        {{--                                <img class="h-16 w-16 rounded-full mx-auto"--}}
                        {{--                                     src="https://avatars2.githubusercontent.com/u/24622175?s=60&amp;v=4"--}}
                        {{--                                     alt="">--}}
                        {{--                                <a href="#" class="text-main-color">James</a>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="text-center my-2">--}}
                        {{--                                <img class="h-16 w-16 rounded-full mx-auto"--}}
                        {{--                                     src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"--}}
                        {{--                                     alt="">--}}
                        {{--                                <a href="#" class="text-main-color">Natie</a>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="text-center my-2">--}}
                        {{--                                <img class="h-16 w-16 rounded-full mx-auto"--}}
                        {{--                                     src="https://bucketeer-e05bbc84-baa3-437e-9518-adb32be77984.s3.amazonaws.com/public/images/f04b52da-12f2-449f-b90c-5e4d5e2b1469_361x361.png"--}}
                        {{--                                     alt="">--}}
                        {{--                                <a href="#" class="text-main-color">Casey</a>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                        <!-- End of friends card -->
                    </div>
                @endif
                <div class="w-full md:w-9/12 mx-2 h-64">
                    <h3 class="mt-6 text-xl">My boarding members</h3>
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
                                        @foreach($boarders as $boarder)
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
                                                            <div
                                                                class="text-sm font-medium text-gray-900">{{$boarder->boarders[0]['name']}}
                                                            </div>
                                                            <div
                                                                class="text-sm text-gray-500">{{$boarder->boarders[0]['email']}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{$boarder->boarders[0]['name']}}
                                                    </div>
                                                    <div
                                                        class="text-sm text-gray-500">{{$my_boarding_place->name}}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"
                            >
                              Done
                            </span>
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{$boarder->boarders[0]['userType'] == 'CLNT' ? 'Student' : '-'}}
                                                </td>
                                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
