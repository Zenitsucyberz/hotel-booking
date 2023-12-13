<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Business') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">





                    <form method="POST" action="{{ route('business.update', $business->id) }}">
                        @csrf
                        @method('put')
                        <!-- Name -->
                        <div>
                            <x-input-label for="business_type" :value="__('Business Type')" />
                            <x-text-input id="business_type" class="block mt-1 w-full" type="text"
                                name="business_type" :value="old('business_type', $business->business_type)" required autofocus
                                autocomplete="business_type" />
                            <x-input-error :messages="$errors->get('business_type')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name', $business->name)" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        {{-- logo --}}
                        <div>
                            <x-input-label for="logo" :value="__('Logo')" />
                            <x-text-input id="logo" class="block mt-1 w-full" type="text" name="logo"
                                :value="old('logo', $business->logo)" />
                            <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                        </div>
                        {{-- logo --}}

                        <div>
                            <x-input-label for="address1" :value="__('Address 1')" />
                            <x-text-input id="address1" class="block mt-1 w-full" type="text" name="address1"
                                :value="old('address1', $business->address1)" required autofocus autocomplete="address1" />
                            <x-input-error :messages="$errors->get('address1')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="address2" :value="__('Address 2')" />
                            <x-text-input id="address2" class="block mt-1 w-full" type="text" name="address2"
                                :value="old('address2', $business->address2)" required autofocus autocomplete="address2" />
                            <x-input-error :messages="$errors->get('address2')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="address3" :value="__('Address 3')" />
                            <x-text-input id="address3" class="block mt-1 w-full" type="text" name="address3"
                                :value="old('address3', $business->address3)" required autofocus autocomplete="address3" />
                            <x-input-error :messages="$errors->get('address3')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="zipcode" :value="__('Zipcode')" />
                            <x-text-input id="zipcode" class="block mt-1 w-full" type="text" name="zipcode"
                                :value="old('zipcode', $business->zipcode)" required autofocus autocomplete="zipcode" />
                            <x-input-error :messages="$errors->get('zipcode')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="city" :value="__('City')" />
                            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city"
                                :value="old('city', $business->city)" required autofocus autocomplete="city" />
                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="country" :value="__('Country')" />
                            <x-text-input id="country" class="block mt-1 w-full" type="text" name="country"
                                :value="old('country', $business->country)" required autofocus autocomplete="country" />
                            <x-input-error :messages="$errors->get('country')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="ratings" :value="__('Ratings')" />

                            @php
                                $ratings = [1, 2, 3, 4, 5];
                            @endphp
                            <select class="" name="ratings">

                                @foreach ($ratings as $rating)
                                    <option value="{{ $rating }}" @selected (old('ratings', $business->ratings) == $rating)>{{ $rating }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div>
                            <x-input-label for="is_active" :value="__('Status')" />
                            <x-text-input id="is_active" class="block mt-1 w-full" type="text" name="is_active"
                                :value="old('is_active', $business->is_active)" required autofocus autocomplete="is_active" />
                            <x-input-error :messages="$errors->get('is_active')" class="mt-2" />
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
