<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Aminity') }}
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   
                    <form method="POST" action="{{ route('rooms.store') }}">
                        @csrf
                
                        <!-- Name -->
                        

                        <div>
                            <x-input-label for="room_label" :value="__('Room Label')" />
                            <x-text-input id="room_label" class="block mt-1 w-full" type="text" name="room_label" :value="old('room_label')" required autofocus autocomplete="room_label" />
                            <x-input-error :messages="$errors->get('room_label')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="room_count" :value="__('Room count')" />
                            <x-text-input id="room_count" class="block mt-1 w-full" type="text" name="room_count" :value="old('room_count')" required autofocus autocomplete="room_count" />
                            <x-input-error :messages="$errors->get('room_count')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="hotel_room_category_id" :value="__('category Id')" />
                            <select  class="" name="hotel_room_category_id">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->id}}</option>
                                @endforeach
                                
                                
                            </select>
                        </div>

                        <div>
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
                        </div>

                        
                        
                
                        
                        <div class="flex items-center justify-end mt-4">
                            
                
                            <x-primary-button class="ms-4">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</x-tenant-app-layout>
