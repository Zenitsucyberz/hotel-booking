<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Reservations') }}

        </h2>
    </x-slot>

    <div class="py-12 columns-2">


        <div class="col-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">


                        @if ($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
                        <form method="POST" action="{{ route('reservations.store') }}">
                            @csrf

                            <!-- Name -->


                            {{-- <div class="mb-4">
                                <x-input-label for="reservable_type" :value="__('Reservable Type')" />
                                <x-text-input id="reservable_type" class="block mt-1 w-full" type="text" name="reservable_type" :value="old('reservable_type')" required autofocus autocomplete="reservable_type" />
                                <x-input-error :messages="$errors->get('reservable_type')" class="mt-2" />
                            </div>
    
                            <div class="mb-4">
                                <x-input-label for="reservable_id" :value="__('Reservable Id')" />
                                <x-text-input id="reservable_id" class="block mt-1 w-full" type="text" name="reservable_id" :value="old('reservable_id')" required autofocus autocomplete="reservable_id" />
                                <x-input-error :messages="$errors->get('reservable_id')" class="mt-2" />
                            </div> --}}

                            <div class="mb-4">
                                <x-input-label for="customer_id" :value="__('Customer')" />
                                <select class="" name="customer_id">
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                    @endforeach


                                </select>
                            </div>
                            

                            <div class="mb-4">
                                <x-input-label for="check_in_time" :value="__('Check IN Time')" />
                                <x-text-input id="check_in_time" class="block mt-1 w-full" type="datetime-local"
                                    name="check_in_time" :value="old('check_in_time')" required autofocus
                                    autocomplete="check_in_time" />
                                <x-input-error :messages="$errors->get('check_in_time')" class="mt-2" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="check_out_time" :value="__('Check Out Time')" />
                                <x-text-input id="check_out_time" class="block mt-1 w-full" type="datetime-local"
                                    name="check_out_time" :value="old('check_out_time')" required autofocus
                                    autocomplete="check_out_time" />
                                <x-input-error :messages="$errors->get('check_out_time')" class="mt-2" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="room_id" :value="__('Room')" />
                                <select class="" name="hotel_room_id">
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->room_label }}</option>
                                    @endforeach


                                </select>
                            </div>

                            <x-btn-link href="{{route('customers.create')}}" >
                                
                                {{ __('ADD Customer') }}
                            </x-btn-link>

                            


                          
                           

                            

                            {{-- <div class="mb-4">
                                <x-input-label for="check_in_date" :value="__('Check In Date')" />
                                <x-text-input id="check_in_date" class="block mt-1 w-full" type="text" name="check_in_date" :value="old('check_in_date')" required autofocus autocomplete="check_in_date" />
                                <x-input-error :messages="$errors->get('check_in_date')" class="mt-2" />
                            </div>
    
                            <div class="mb-4">
                                <x-input-label for="check_out_date" :value="__('Check Out Date')" />
                                <x-text-input id="check_out_date" class="block mt-1 w-full" type="text" name="check_out_date" :value="old('check_out_date')" required autofocus autocomplete="check_out_date" />
                                <x-input-error :messages="$errors->get('check_out_date')" class="mt-2" />
                            </div> --}}

                            <div class="mb-4">
                                <x-input-label for="guest_count" :value="__('Guest No')" />
                                <x-text-input id="guest_count" class="block mt-1 w-full" type="text"
                                    name="guest_count" :value="old('guest_count')" required autofocus
                                    autocomplete="guest_count" />
                                <x-input-error :messages="$errors->get('guest_count')" class="mt-2" />
                            </div>

                            {{-- <div class="mb-4">
                                <x-input-label for="total_amount" :value="__('Total Amount')" />
                                <x-text-input id="total_amount" class="block mt-1 w-full" type="text"
                                    name="total_amount" :value="old('total_amount')" required autofocus
                                    autocomplete="total_amount" />
                                <x-input-error :messages="$errors->get('total_amount')" class="mt-2" />
                            </div> --}}

                            <div class="mb-4">
                                <x-input-label for="discount_type" :value="__('Discount Type')" />
                                <select class="" name="discount_type">

                                    <option value="percentage">Percentage</option>
                                    <option value="fixed">Fixed</option>
                                    <option value="special">Special</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <x-input-label for="discount_amount" :value="__('Discount ')" />
                                <x-text-input id="discount_amount" class="block mt-1 w-full" type="text"
                                    name="discount_amount" :value="old('discount_amount')" required autofocus
                                    autocomplete="discount_amount" />
                                <x-input-error :messages="$errors->get('discount_amount')" class="mt-2" />
                            </div>

                            {{-- <div class="mb-4">
                                <x-input-label for="taxable_amount" :value="__('Taxable Amount')" />
                                <x-text-input id="taxable_amount" class="block mt-1 w-full" type="text"
                                    name="taxable_amount" :value="old('taxable_amount')" required autofocus
                                    autocomplete="taxable_amount" />
                                <x-input-error :messages="$errors->get('taxable_amount')" class="mt-2" />
                            </div> --}}

                            <div class="mb-4">
                                <x-input-label for="tax_id" :value="__('Tax Id')" />



                                <select class="" name="tax_id">

                                    <option value="1">5%</option>
                                    <option value="2">12%</option>
                                    <option value="3">18%</option>
                                </select>


                                <x-input-error :messages="$errors->get('tax_id')" class="mt-2" />
                            </div>

                            {{-- <div class="mb-4">
                                <x-input-label for="sgst_amount" :value="__('SGST Amount')" />
                                <select class="" name="sgst_amount">

                                    <option value="5">5%</option>
                                    <option value="12">12%</option>
                                    <option value="18">18%</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <x-input-label for="cgst_amount" :value="__('CGST Amount')" />
                                <select class="" name="cgst_amount">

                                    <option value="5">5%</option>
                                    <option value="12">12%</option>
                                    <option value="18">18%</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <x-input-label for="igst_amount" :value="__('IGST Amount')" />
                                <select class="" name="igst_amount">

                                    <option value="5">5%</option>
                                    <option value="12">12%</option>
                                    <option value="18">18%</option>
                                </select>
                            </div> --}}

                            <div class="mb-4">
                                <x-input-label for="tax_amount" :value="__('Tax Amount')" />
                                <x-text-input id="tax_amount" class="block mt-1 w-full" type="text" name="tax_amount"
                                    :value="old('tax_amount')" required autofocus autocomplete="tax_amount" />
                                <x-input-error :messages="$errors->get('tax_amount')" class="mt-2" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="round_off_amount" :value="__('Round Off Amount')" />
                                <x-text-input id="round_off_amount" class="block mt-1 w-full" type="text"
                                    name="round_off_amount" :value="old('round_off_amount')" required autofocus
                                    autocomplete="round_off_amount" />
                                <x-input-error :messages="$errors->get('round_off_amount')" class="mt-2" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="net_total_amount" :value="__('Net Total Amount')" />
                                <x-text-input id="net_total_amount" class="block mt-1 w-full" type="text"
                                    name="net_total_amount" :value="old('net_total_amount')" required autofocus
                                    autocomplete="net_total_amount" />
                                <x-input-error :messages="$errors->get('net_total_amount')" class="mt-2" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="reservation_status" :value="__('Reservation Status')" />
                                <select class="" name="reservation_status">

                                    <option value="reserved">Reserved</option>
                                    <option value="pending">Pending</option>

                                </select>
                            </div>

                            <div class="mb-4">
                                <x-input-label for="payment_status" :value="__('Payment Status')" />
                                <select class="" name="payment_status">

                                    <option value="paid">Paid</option>
                                    <option value="pending">Pending</option>

                                </select>
                            </div>

                            <div class="mb-4">
                                <x-input-label for="payment_method" :value="__('Payment Method')" />
                                <select class="" name="payment_method">

                                    <option value="online">Online</option>
                                    <option value="coc">COC</option>

                                </select>
                            </div>

                            <div class="mb-4">
                                <x-input-label for="booking_date" :value="__('Booking Date')" />
                                <x-text-input id="booking_date" class="block mt-1 w-full" type="datetime-local"
                                    name="booking_date" :value="old('booking_date')" required autofocus
                                    autocomplete="booking_date" />
                                <x-input-error :messages="$errors->get('booking_date')" class="mt-2" />
                            </div>

                            

                            <div class="mb-4">
                                <x-input-label for="is_confirmed" :value="__('Confirmation')" />
                                <select class="" name="is_confirmed">

                                    <option value="1">Confirmed</option>
                                    <option value="0">Not Confirmed</option>

                                </select>
                            </div>

                            <div class="mb-4">
                                <x-input-label for="customer_notes" :value="__('Customer Notes')" />
                                <textarea id="customer_notes" class="block mt-1 w-full" type="text" name="customer_notes"
                                    :value="" required autofocus autocomplete="customer_notes">{{old('customer_notes')}}</textarea>
                                <x-input-error :messages="$errors->get('customer_notes')" class="mt-2" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="staff_notes" :value="__('Staff Notes')" />
                                <textarea id="staff_notes" class="block mt-1 w-full" type="text"
                                     name="staff_notes" :value=""
                                    required autofocus autocomplete="staff_notes">{{old('staff_notes')}}</textarea>
                                <x-input-error :messages="$errors->get('staff_notes')" class="mt-2" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="additional_notes" :value="__('Additional Notes')" />
                                <textarea id="additional_notes" class="block mt-1 w-full" type="text" name="additional_notes"
                                     required autofocus autocomplete="additional_notes">{{old('additional_notes')}}</textarea>
                                <x-input-error :messages="$errors->get('additional_notes')" class="mt-2" />
                            </div>

                            {{-- <div class="mb-4">
                                <x-input-label for="created_by" :value="__('Created By')" />
                                <select  class="" name="created_by">
                                    @foreach ($users as $user)
                                    <option value="{{$user->name}}">{{$user->name}}</option>
                                    @endforeach
                                    
                                    
                                </select>
                            </div>
                            <div class="mb-4">
                                <x-input-label for="updated_by" :value="__('Updated By')" />
                                <select  class="" name="updated_by">
                                    @foreach ($users as $user)
                                    <option value="{{$user->name}}">{{$user->name}}</option>
                                    @endforeach
                                    
                                    
                                </select>
                            </div> --}}






                            {{-- <div class="mb-4">
                                <x-input-label for="rate" :value="__('Rate')" />
                                <x-text-input id="rate" class="block mt-1 w-full" type="text" name="rate" :value="old('rate')" required autofocus autocomplete="rate" />
                                <x-input-error :messages="$errors->get('rate')" class="mt-2" />
                            </div>
    
                            <div>
                                <x-input-label for="status" :value="__('Status')" />
                                <select class="" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
    
                            <div>
                                <x-input-label for="image" :value="__('Image')" />
                                <x-text-input id="image" class="block mt-1 w-full" type="text" name="image" :value="old('image')"  />
                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div>
    
                            <div>
                                <x-input-label for="maximum_guests" :value="__('Maximum Guest')" />
                                <x-text-input id="maximum_guests" class="block mt-1 w-full" type="text" name="maximum_guests" :value="old('maximum_guests')" required autofocus autocomplete="maximum_guests" />
                                <x-input-error :messages="$errors->get('maximum_guests')" class="mt-2" />
                            </div>
    
                            <div>
                                <x-input-label for="beds" :value="__('Beds')" />
                                <x-text-input id="beds" class="block mt-1 w-full" type="text" name="beds" :value="old('beds')" required autofocus autocomplete="beds" />
                                <x-input-error :messages="$errors->get('beds')" class="mt-2" />
                            </div> --}}





                            <div class="flex items-center justify-end mt-4">


                                <x-primary-button class="ms-4">
                                    {{ __('ADD') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-6">


            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <h1>Booking Details -- Item wise</h1>



                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr>

                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">#</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Item
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Qty
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Amount
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Discount</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Total
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">SGST
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">CGST
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Net
                                        Total</th>


                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">1</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">Room </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">1</td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">500</td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">800</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">100</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">2000</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">3000</td>


                                </tr>


                            </tbody>



                            <tfoot>
                                <tr>

                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">#</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Item
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Qty
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Amount
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Discount</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Total
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">SGST
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">CGST
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Net
                                        Total</th>


                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </div>


    <x-slot name="scripts">
        <script>
            // Initialize Bootstrap Datepicker
            $(document).ready(function() {
                $('.datepicker').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true
                });
            });
        </script>

    </x-slot>

</x-tenant-app-layout>
