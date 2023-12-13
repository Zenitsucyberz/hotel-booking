<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Room Categories') }}
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   
                    <form method="POST" action="{{ route('roomcategories.store',$roomcategory->id) }}">
                        @csrf
                
                        <!-- Name -->
                        

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name',$roomcategory->name)" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        {{-- <div>
                            <x-input-label for="business_id" :value="__('Business Id')" />
                            <select  class="" name="business_id">
                                @foreach ($businesses as $business)
                                <option value="{{$business->id}}">{{$business->id}}</option>
                                @endforeach
                                
                                
                            </select>
                        </div> --}}


                        <div>
                            <x-input-label for="status" :value="__('Status')" />
                            <x-text-input id="status" class="block mt-1 w-full" type="text" name="status" :value="old('status',$roomcategory->status)" required autofocus autocomplete="status" />
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
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
