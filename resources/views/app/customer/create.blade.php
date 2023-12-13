<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Customer') }}
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   
                    <form method="POST" action="{{ route('customers.store') }}">
                        @csrf
                
                        <!-- Name -->
                        <div>
                            <x-input-label for="customer_name" :value="__('Customer Name')" />
                            <x-text-input id="customer_name" class="block mt-1 w-full" type="text" name="customer_name" :value="old('customer_name')" required autofocus autocomplete="customer_name" />
                            <x-input-error :messages="$errors->get('customer_name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="customer_address1" :value="__('Customer Address')" />
                            <x-text-input id="customer_address1" class="block mt-1 w-full" type="text" name="customer_address1" :value="old('customer_address1')" required autofocus autocomplete="customer_address1" />
                            <x-input-error :messages="$errors->get('customer_address1')" class="mt-2" />
                        </div>

                        {{-- logo --}}
                        <div>
                            <x-input-label for="customer_address2" :value="__('Customer_address2')" />
                            <x-text-input id="customer_address2" class="block mt-1 w-full" type="text" name="customer_address2" :value="old('customer_address2')"  />
                            <x-input-error :messages="$errors->get('customer_address2')" class="mt-2" />
                        </div>
                        {{-- logo --}}

                        <div>
                            <x-input-label for="city" :value="__('City')" />
                            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autofocus autocomplete="city" />
                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="state" :value="__('State')" />
                            <x-text-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" required autofocus autocomplete="state" />
                            <x-input-error :messages="$errors->get('state')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="pincode" :value="__('Pincode')" />
                            <x-text-input id="pincode" class="block mt-1 w-full" type="text" name="pincode" :value="old('pincode')" required autofocus autocomplete="pincode" />
                            <x-input-error :messages="$errors->get('pincode')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="phone" :value="__('Phone')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                        
                        
                
                        
                        <div class="flex items-center justify-end mt-4">
                            
                
                            <x-primary-button class="ms-4">
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</x-tenant-app-layout>
