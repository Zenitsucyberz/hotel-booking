<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit rooms') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">





                    <form method="POST" action="{{ route('rooms.update', $room->id) }}">
                        @csrf
                        @method('put')
                        <!-- Name -->
                        
                        <div class="mb-4">
                            <x-input-label for="customer_id" :value="__('Customer')" />
                            <select class="customer" id=customer_id name="customer_id">
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                @endforeach


                            </select>
                        </div>


                        <div class="mb-4">
                            <x-input-label for="check_in_time" :value="__('Check IN Time')" />
                            <x-text-input id="check_in_time" class="block mt-1 w-full customer"
                                type="datetime-local" name="check_in_time" :value="old('check_in_time')" required autofocus
                                autocomplete="check_in_time" />
                            <x-input-error :messages="$errors->get('check_in_time')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="check_out_time" :value="__('Check Out Time')" />
                            <x-text-input id="check_out_time" class="block mt-1 w-full customer"
                                type="datetime-local" name="check_out_time" :value="old('check_out_time')" required autofocus
                                autocomplete="check_out_time" />
                            <x-input-error :messages="$errors->get('check_out_time')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="room_id" :value="__('Room')" />
                            <select class="customer" id="room_id" name="hotel_room_id">
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->room_label }}</option>
                                @endforeach


                            </select>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="guest_count" :value="__('Guest No')" />
                            <x-text-input id="guest_count" class="block mt-1 w-full customer" type="text"
                                name="guest_count" :value="old('guest_count')" required autofocus
                                autocomplete="guest_count" />
                            <x-input-error :messages="$errors->get('guest_count')" class="mt-2" />
                        </div>


                        <x-btn-link href="{{ route('customers.create') }}">

                            {{ __('ADD Customer') }}
                        </x-btn-link>


                        <div class="mb-4">
                            <x-input-label for="room_amount" :value="__('Room Amount')" />
                            <x-text-input id="room_amount" class="block mt-1 w-full " type="text"
                                name="room_amount" :value=" old('room_amount')" required autofocus
                                autocomplete="room_amount" />
                            <x-input-error :messages="$errors->get('room_amount')" class="mt-2" />
                        </div>

                        


                        

                        <div class="mb-4">
                            <x-input-label for="discount_type" :value="__('Discount Type')" />
                            <select class="customer" id="discount_type" name="discount_type">

                                <option value="percentage">Percentage</option>
                                <option value="fixed">Fixed</option>
                                <option value="special">Special</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="discount_amount" :value="__('Discount Amount ')" />
                            <x-text-input id="discount_amount" class="block mt-1 w-full customer" type="text"
                                name="discount_amount" :value="old('discount_amount')" required autofocus
                                autocomplete="discount_amount" />
                            <x-input-error :messages="$errors->get('discount_amount')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="discounted_amount" :value="__('Discounted Amount ')" />
                            <x-text-input id="discounted_amount" class="block mt-1 w-full " type="text"
                                name="discounted_amount" :value=" old('discounted_amount')" required autofocus
                                autocomplete="discounted_amount" />
                            <x-input-error :messages="$errors->get('discounted_amount')" class="mt-2" />
                        </div>


                        <div class="mb-4">
                            <x-input-label for="tax_id" :value="__('Tax Id')" />



                            <select class="customer" id="tax_id" name="tax_id">

                                <option value="1">5%</option>
                                <option value="2">12%</option>
                                <option value="3">18%</option>
                            </select>


                            <x-input-error :messages="$errors->get('tax_id')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="tax_amount" :value="__('Tax Amount')" />
                            <x-text-input id="tax_amount" class="block mt-1 w-full" type="text" name="tax_amount"
                                :value="old('tax_amount')" required autofocus autocomplete="tax_amount" />
                            <x-input-error :messages="$errors->get('tax_amount')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="sgst_amount" :value="__('SGST Amount')" />
                            <x-text-input id="sgst_amount" class="block mt-1 w-full" type="text" name="sgst_amount"
                                :value="old('sgst_amount')" required autofocus autocomplete="sgst_amount" />
                            <x-input-error :messages="$errors->get('sgst_amount')" class="mt-2" />
                        </div>
                       
                        <div class="mb-4">
                            <x-input-label for="cgst_amount" :value="__('CGST Amount')" />
                            <x-text-input id="cgst_amount" class="block mt-1 w-full" type="text" name="cgst_amount"
                                :value="old('cgst_amount')" required autofocus autocomplete="cgst_amount" />
                            <x-input-error :messages="$errors->get('cgst_amount')" class="mt-2" />
                        </div>
                        

                        

                        

                        <div class="mb-4">
                            <x-input-label for="round_off_amount" :value="__('Round Off Amount')" />
                            <x-text-input id="round_off_amount" class="block mt-1 w-full" type="text"
                                name="round_off_amount" :value="old('round_off_amount')"/>
                            <x-input-error :messages="$errors->get('round_off_amount')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="net_total_amount" :value="__('Net Total Amount')" />
                            <x-text-input id="net_total_amount" class="block mt-1 w-full " type="text"
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
                            <x-input-label for="booking_date" :value="__('Booked On')" />
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
                            <textarea id="customer_notes" class="block mt-1 w-full" type="text" name="customer_notes" :value=""
                                required autofocus autocomplete="customer_notes">{{ old('customer_notes') }}</textarea>
                            <x-input-error :messages="$errors->get('customer_notes')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="staff_notes" :value="__('Staff Notes')" />
                            <textarea id="staff_notes" class="block mt-1 w-full" type="text" name="staff_notes" :value=""
                                required autofocus autocomplete="staff_notes">{{ old('staff_notes') }}</textarea>
                            <x-input-error :messages="$errors->get('staff_notes')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="additional_notes" :value="__('Additional Notes')" />
                            <textarea id="additional_notes" class="block mt-1 w-full" type="text" name="additional_notes" required autofocus
                                autocomplete="additional_notes">{{ old('additional_notes') }}</textarea>
                            <x-input-error :messages="$errors->get('additional_notes')" class="mt-2" />
                        </div>

                       


                        <div class="flex items-center justify-end mt-4">


                            <x-primary-button class="ms-4">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-tenant-app-layout>
