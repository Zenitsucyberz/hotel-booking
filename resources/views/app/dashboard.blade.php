<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap mt-4">
                <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                        <div class="rounded-t mb-0 px-4 py-3 border-0">
                            <div class="flex flex-wrap items-center">
                                <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                    <h3 class="font-semibold text-base text-blueGray-700">
                                        Upcoming Check Ins
                                    </h3>
                                </div>
                                <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                    <a href="{{ route('reservations.index') }}"
                                        class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                        View all <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="block w-full overflow-x-auto">

                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Invoice
                                        </th>
                                        <th
                                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Room
                                        </th>
                                        <th
                                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Customer
                                        </th>
                                        <th
                                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Check In
                                        </th>


                                        <th
                                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Amount
                                        </th>


                                        <th
                                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($reservations as $reservation)
                                        <tr>
                                            <th
                                                class="home-table-row text-left">
                                                {{ $reservation->invoice_no }}
                                            </th>
                                            <td
                                                class="home-table-row">
                                                {{ $reservation->room->room_label }}
                                            </td>
                                            <td
                                                class="home-table-row">
                                                {{ $reservation->customer->customer_name }}
                                            </td>
                                            <td
                                                class="home-table-row">
                                                {{ $reservation->check_in_time }}

                                            </td>


                                            <td
                                                class="home-table-row">
                                                {{ $reservation->net_total_amount }}

                                            </td>

                                            <td
                                                class="home-table-row">




                                                <button href="#pablo" class="text-blueGray-500 block py-1 px-3"
                                                    data-dropdown-toggle="multi-dropdown">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>



                                                <!-- Dropdown menu -->
                                                <div id="multi-dropdown"
                                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                        aria-labelledby="multiLevelDropdownButton">
                                                        <li>
                                                            <a href="{{ route('reservations.invoice', $reservation->id) }}"
                                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Print</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('reservations.show', $reservation->id) }}"
                                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View</a>
                                                        </li>
                                                        {{-- <li>
                                        <button id="doubleDropdownButton"
                                            data-dropdown-toggle="doubleDropdown"
                                            data-dropdown-placement="right-start" type="button"
                                            class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dropdown<svg
                                                class="w-2.5 h-2.5 ms-3 rtl:rotate-180" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 9 4-4-4-4" />
                                            </svg></button>
                                        <div id="doubleDropdown"
                                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="doubleDropdownButton">
                                                <li>
                                                    <a href="#"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Overview</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">My
                                                        downloads</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Billing</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rewards</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li> --}}


                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @if (1 > 2)
                    <div class="w-full xl:w-4/12 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                            <div class="rounded-t mb-0 px-4 py-3 border-0">
                                <div class="flex flex-wrap items-center">
                                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                        <h3 class="font-semibold text-base text-blueGray-700">
                                            Social traffic
                                        </h3>
                                    </div>
                                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                        <button
                                            class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                            type="button">
                                            See all
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="block w-full overflow-x-auto">

                                <table class="items-center w-full bg-transparent border-collapse">
                                    <thead class="thead-light">
                                        <tr>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Referral
                                            </th>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Visitors
                                            </th>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th
                                                class="home-table-row text-left">
                                                Facebook
                                            </th>
                                            <td
                                                class="home-table-row">
                                                1,480
                                            </td>
                                            <td
                                                class="home-table-row">
                                                <div class="flex items-center">
                                                    <span class="mr-2">60%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-red-200">
                                                            <div style="width: 60%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th
                                                class="home-table-row text-left">
                                                Facebook
                                            </th>
                                            <td
                                                class="home-table-row">
                                                5,480
                                            </td>
                                            <td
                                                class="home-table-row">
                                                <div class="flex items-center">
                                                    <span class="mr-2">70%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-emerald-200">
                                                            <div style="width: 70%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-emerald-500">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th
                                                class="home-table-row text-left">
                                                Google
                                            </th>
                                            <td
                                                class="home-table-row">
                                                4,807
                                            </td>
                                            <td
                                                class="home-table-row">
                                                <div class="flex items-center">
                                                    <span class="mr-2">80%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-purple-200">
                                                            <div style="width: 80%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-purple-500">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th
                                                class="home-table-row text-left">
                                                Instagram
                                            </th>
                                            <td
                                                class="home-table-row">
                                                3,678
                                            </td>
                                            <td
                                                class="home-table-row">
                                                <div class="flex items-center">
                                                    <span class="mr-2">75%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-lightBlue-200">
                                                            <div style="width: 75%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-lightBlue-500">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th
                                                class="home-table-row text-left">
                                                twitter
                                            </th>
                                            <td
                                                class="home-table-row">
                                                2,645
                                            </td>
                                            <td
                                                class="home-table-row">
                                                <div class="flex items-center">
                                                    <span class="mr-2">30%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-orange-200">
                                                            <div style="width: 30%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-emerald-500">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif

            </div>


        </div>

    </div>


    

</x-tenant-app-layout>
