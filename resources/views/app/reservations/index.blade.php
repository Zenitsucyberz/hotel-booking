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

                    <div style="margin: 20px 0px;">
                        <strong>Date Filter:</strong>
                        <input type="text" name="daterange" value="" />
                        {{-- <button class="btn btn-success filter">Filter</button> --}}
                    </div>


                    <table class="max-w-full divide-y divide-gray-400 dark:divide-gray-700" id="resTable">
                        <thead>
                            <tr>


                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Reservable
                                    Id</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Room Id
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Customer Id
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Check In
                                    Time</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Check Out
                                    Time</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Net Total
                                    Amount</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Payment
                                    Status</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Booked
                                    On</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                    Confirmation</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Action</th>


                            </tr>
                        </thead>
                        {{-- <tbody id="sortable">
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
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium "><x-btn-link
                                            href="{{ route('reservations.edit', $reservation->id) }}">Edit</x-btn-link>





                                        <x-danger-button class="delete-button"
                                            data-action="{{ route('reservations.destroy', $reservation->id) }}">Delete</x-danger-button>
                                     </td>




                                </tr>
                            @endforeach  


                        </tbody> --}}
                    </table>

                </div>

            </div>
        </div>
    </div>



    <x-slot name="scripts">
        <script>
            $(document).ready(function() {



                $('input[name="daterange"]').daterangepicker({
                    startDate: moment(),
                    endDate: moment().add(1,'year')
                });





                // Initialize
               
                var table = $('#resTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('getDataTableData') }}",
                        data: function(d) {
                            d.check_in_time= $('input[name="daterange"]').data('daterangepicker').startDate
                                .format('YYYY-MM-DD');
                            d.check_out_time = $('input[name="daterange"]').data('daterangepicker').endDate.format(
                                'YYYY-MM-DD');
                        }
                    },
                    columns: [{
                            data: 'invoice_no'
                        },
                        {
                            data: 'room_label'
                        },
                        {
                            data: 'customer_name'
                        },
                        {
                            data: 'check_in_time'
                        },
                        {
                            data: 'check_out_time'
                        },
                        {
                            data: 'net_total_amount'
                        },
                        {
                            data: 'payment_status'
                        },
                        {
                            data: 'booking_date'
                        },
                        {
                            data: 'is_confirmed'
                        },
                        {
                            data: 'actions'
                        },
                    ]
                });


                $(".applyBtn").click(function() {
                    table.draw();
                });
            });




            $(document).on('click', '.delete-button', function(e) {
                e.preventDefault();

                var actionUrl = $(this).data('action');

                $.ajax({
                    url: actionUrl,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        alert(data.message);
                        location.reload();
                    },
                    error: function(error) {
                        console.error('Error:', error);
                        if (typeof errorCallback === 'function') {
                            errorCallback(error);
                        }
                    }
                });
            });

           


            $('input[name="daterange"]').daterangepicker({
                startDate: moment().subtract(1, 'M'),
                endDate: moment()
            });
        </script>

    </x-slot>



</x-tenant-app-layout>
