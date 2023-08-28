@extends('layouts.client')
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
        <h1 class="text-3xl font-semibold mb-6">{{\App\Models\BoardingPlace::whereId($my_boarding_id)->first()['name']}}
            Payments</h1>

        <div class="flex space-x-8">
            <div class="w-1/2">
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
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900"><i class="fa-solid fa-download"></i>  </a>
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
            <div class="w-1/2">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold mb-4">Make a Payment</h2>

                    <form action="{{route('client.payment.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex justify-evenly">
                            <input type="hidden" name="boardingId"
                                   value="{{\App\Models\BoardingPlace::whereId($my_boarding_id)->first()['id']}}">
                            <div>
                                <div class="mb-4 d-flex flex-row">
                                    <label class="block font-medium">Payment Method</label>
                                    <label
                                        class="flex items-center mt-2 text-gray-400 cursor-not-allowed">
                                        <input type="radio" name="paymentMethod" value="creditCard" disabled
                                               class="mr-2">
                                        <i class="fa-solid fa-credit-card px-2"></i> Credit Card
                                    </label>
                                    <label class="flex items-center mt-2 cursor-pointer">
                                        <input type="radio" name="paymentMethod" value="bankDeposit" class="mr-2">
                                        <i class="fa-solid fa-money-check-dollar px-2"></i> Bank Deposit
                                    </label>
                                    <label
                                        class="flex items-center mt-2 text-gray-400 cursor-not-allowed">
                                        <input type="radio" name="paymentMethod" value="paypal" disabled class="mr-2">
                                        <i class="fa-brands fa-paypal px-2"></i> Paypal
                                    </label>
                                </div>
                            </div>

                            <div>

                                <div class="mb-4">
                                    <label class="block font-medium">Payment Amount</label>
                                    <input type="number" name="paymentAmount"
                                           class="w-full px-4 py-2 rounded-md border focus:outline-none focus:ring focus:border-blue-300">
                                </div>

                                <div class="mb-4">
                                    <label class="block font-medium">Payment Month</label>
                                    <select name="paymentMonth"
                                            class="w-full px-4 py-2 rounded-md border focus:outline-none focus:ring focus:border-blue-300">
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="block font-medium">Payment Receipt</label>
                                    <input type="file" name="paymentReceipt" class="w-full">
                                </div>
                            </div>
                        </div>


                        <div class="flex justify-end">
                            <button type="submit"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 ">Submit
                                Payment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
