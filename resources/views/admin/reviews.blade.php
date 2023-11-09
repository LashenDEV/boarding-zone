@extends('layouts.admin')
@section('main')
    @push('Styles')
        <style>
            .emoji-404 {

                position: relative;
                animation: mymove 2.5s infinite;
            }

            @keyframes mymove {
                33% {
                    top: 0px;
                }
                66% {
                    top: 20px;
                }
                100% {
                    top: 0px
                }
            }
        </style>
    @endpush

    <h3 class="mt-6 text-xl">Boarders</h3>
    <div class="flex flex-col mt-6">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                @if($reviews->isNotEmpty())
                    <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                        <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
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
                                    Review
                                </th>
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
                                    Status
                                </th>

                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($reviews as $review)
                                <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{\App\Models\BoardingPlace::whereId($review->boarding_id)->first()['name']}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div
                                                    class="text-sm font-medium text-gray-900">{{$review->comment}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{$review->username}}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{$review->email}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="inline-flex px-2 text-xs font-semibold leading-5 {{$review->status  == 'Pending' ? 'text-yellow-800 bg-yellow-100' : ($review->status  == 'Declined' ? 'text-red-800 bg-red-100' : 'text-green-800 bg-green-100')}} rounded-full">
                                 @if($review->status  == 'Pending')
                                    Pending
                                @elseif($review->status  == 'Declined')
                                    Rejected
                                @else
                                    Approved
                                @endif
                                </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        <a href="{{route('admin.boarding-house.review.approve', $review->id)}}"
                                           class="text-green-600 hover:text-green-900">Approve</a> |
                                        <a href="{{route('admin.boarding-house.review.reject', $review->id)}}"
                                           class="text-red-600 hover:text-red-900">Reject</a> |
                                        <a href="{{route('admin.boarding-house.review.remove', $review->id)}}"
                                           class="text-indigo-600 hover:text-indigo-900">Remove</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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
                                        class="text-gray-500 text-5xl block"><span>No Review Could Be Found</span></span>
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
@endsection
