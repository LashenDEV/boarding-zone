@extends('layouts.boarding-owner')
@section('main')
    <div class="container mx-auto p-6">
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 mb-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(isset($my_boarding_payments))
            <h1 class="text-3xl font-semibold mb-6">{{$my_boarding->name}}
                Payments</h1>
        @endif

        <div class="flex space-x-8 justify-center">
            <div class="w-2/3">
                <div class="mt-6">
                    <h2 class="text-xl font-semibold mb-4">Payment History</h2>
                    <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >
                                Month
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >
                                Payment Method
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >
                                Amount
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
                                File
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @if(isset($my_boarding_payments))
                            @foreach($my_boarding_payments as $my_boarding_payment)
                                <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{$my_boarding_payment->month}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{$my_boarding_payment->payment_method}}</td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            LKR.{{$my_boarding_payment->amount}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($my_boarding_payment->payment_approval == 'Approved')
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"
                                            >
                                            Approved
                                        </span>
                                        @elseif($my_boarding_payment->payment_approval == 'Pending')
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-yellow-800 bg-yellow-100 rounded-full"
                                            >
                                            Pending
                                        </span>
                                        @else
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full"
                                            >
                                            Rejected
                                        </span>
                                        @endif

                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900"><i
                                                class="fa-solid fa-download"></i> </a>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap flex">
                                        <a href="{{route('boarding-owner.payment.approval', $my_boarding_payment->id)}}"
                                           class="text-green-600 hover:text-green-900 fa-xl"><i
                                                class="fa-solid fa-circle-check px-1"></i></a>
                                        <a href="{{route('boarding-owner.payment.reject', $my_boarding_payment->id)}}"
                                           class="text-red-600 hover:text-red-900 fa-xl"><i
                                                class="fa-solid fa-circle-xmark px-1"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
