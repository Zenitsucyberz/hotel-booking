<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservations') }}
            <x-btn-link class="ml-4 float-right" href="{{ route('reservations.create') }}">Add Reservations</x-btn-link>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">



                    
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>

                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">#</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Reservable Id</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Room Id</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Customer Id</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Check In Time</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Check Out Time</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Net Total Amount</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Payment Status</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Booking Date</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Confirmation</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Action</th>

                                
                            </tr>
                        </thead>
                        <tbody>
                              @foreach ($reservations as $reservation)
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">{{ $reservation->invoice_no}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">{{ $reservation->room->room_label }}</td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">{{ $reservation?->customer?->customer_name }}</td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">{{ $reservation->check_in_time}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">{{ $reservation->check_out_time}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">{{ $reservation->net_total_amount}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">{{ $reservation->payment_status}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">{{ $reservation->booking_date}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">{{ $reservation->is_confirmed}}</td>
                                    
                                     {{--<td class="px-6 py-4 whitespace-nowrap text-sm font-medium "><x-btn-link
                                            href="{{ route('reservations.edit', $reservation->id) }}">Edit</x-btn-link>





                                        <x-danger-button class="delete-button"
                                            data-action="{{ route('reservations.destroy', $reservation->id) }}">Delete</x-danger-button>
                                     </td> --}}




                                </tr>
                            @endforeach  


                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>



     <x-slot name="scripts">
        <script>
            $('.delete-button').click(function(e) {


                e.preventDefault();
                $.ajax({
                    url: $(this).data('action'),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        alert(data.message)
                        location.reload();QQQ
                    },
                    error: function(error) {
                        console.error('Error:', error);
                        if (typeof errorCallback === 'function') {
                            errorCallback(error);
                        }
                    }
                });
            })
        </script>

    </x-slot> 



</x-tenant-app-layout>
