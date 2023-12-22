<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservation Informations:') . $reservation->invoice_no }}
            {{-- <x-btn-link class="ml-4 float-right" href="{{ route('reservations.create') }}">Add Reservations</x-btn-link> --}}
        </h2>
    </x-slot>
    
    <div class="bg-white border rounded-lg shadow-lg px-6 py-8 max-w-md mx-auto mt-8">
        <h1 class="font-bold text-2xl my-4 text-center text-blue-600">Chola Resorts</h1>
        <hr class="mb-2">
        <div class="flex justify-between mb-6">
            <h1 class="text-lg font-bold">DETAILS</h1>
            <div class="text-gray-700">
                <div>{{ $reservation->created_at }}</div>
                <div>Invoice #:{{ $reservation->invoice_no }}</div>
            </div>
        </div>
        {{-- <div class="mb-8">
          <h2 class="text-lg font-bold mb-4">Bill To:</h2>
          <div class="text-gray-700 mb-2">John Doe</div>
          <div class="text-gray-700 mb-2">123 Main St.</div>
          <div class="text-gray-700 mb-2">Anytown, USA 12345</div>
          <div class="text-gray-700">johndoe@example.com</div>
      </div> --}}
        <table class="w-full mb-8">
            <thead>
                <tr>
                    <th class="text-left font-bold text-gray-700"></th>
                    <th class="text-right font-bold text-gray-700"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-left text-gray-700">Customer Name</td>
                    <td class="text-right text-gray-700">{{ $reservation->customer->customer_name }}</td>
                </tr>
                <tr>
                    <td class="text-left text-gray-700">Room</td>
                    <td class="text-right text-gray-700">{{ $reservation->room->room_label }}</td>
                </tr>
                <tr>
                    <td class="text-left text-gray-700"> Guest Count</td>
                    <td class="text-right text-gray-700">{{ $reservation->guest_count }}</td>
                </tr>
                <tr>
                    <td class="text-left text-gray-700">Adults</td>
                    <td class="text-right text-gray-700">{{ $reservation->adults }}</td>
                </tr>
                <tr>
                    <td class="text-left text-gray-700">children</td>
                    <td class="text-right text-gray-700">{{ $reservation->children }}</td>
                </tr>
                <tr>
                    <td class="text-left text-gray-700">Check In Date</td>
                    <td class="text-right text-gray-700">{{ $reservation->check_in_time }}</td>
                </tr>
                <tr>
                    <td class="text-left text-gray-700">Check Out Date</td>
                    <td class="text-right text-gray-700">{{ $reservation->check_out_time }}</td>
                </tr>
                <tr>
                    <td class="text-left text-gray-700">Room Rent</td>
                    <td class="text-right text-gray-700">{{ $reservation->total_amount }}</td>
                </tr>
                <tr>
                    <td class="text-left text-gray-700">Discount Amount</td>
                    <td class="text-right text-gray-700">{{ $reservation->taxable_amount }}</td>
                </tr>
                <tr>
                    <td class="text-left text-gray-700">Net Total</td>
                    <td class="text-right text-gray-700"> {{ $reservation->net_total_amount }}</td>
                </tr>
                <tr>
                    <td class="text-left text-gray-700">Booked On</td>
                    <td class="text-right text-gray-700">{{ $reservation->booking_date }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td class="text-left font-bold text-gray-700"></td>
                    <td class="text-right font-bold text-gray-700"></td>
                </tr>
            </tfoot>
        </table>
        <div class="text-gray-700 mb-2">Thank you for your business!</div>
        <div class="text-gray-700 text-sm">Please remit payment within 30 days.</div>
    </div>






</x-tenant-app-layout>
