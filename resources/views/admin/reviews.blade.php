@extends('layouts.admin')
@section('main')
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
            </div>
        </div>
    </div>
@endsection
