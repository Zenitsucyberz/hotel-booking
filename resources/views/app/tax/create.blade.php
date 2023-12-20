<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Taxes') }}
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   
                    <form method="POST" action="{{ route('taxes.store') }}">
                        @csrf
                
                        <!-- Name -->
                        

                        <div>
                            <x-input-label for="name" :value="__('Tax Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="tax_amount" :value="__('Tax Amount')" />
                            <x-text-input id="tax_amount" class="block mt-1 w-full" type="text" name="tax_amount" :value="old('tax_amount')" required autofocus autocomplete="tax_amount" />
                            <x-input-error :messages="$errors->get('tax_amount')" class="mt-2" />
                        </div>

                        

                        
                        
                
                        
                        <div class="flex items-center justify-end mt-4">
                            
                
                            <x-primary-button class="ms-4">
                                {{ __('Add') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</x-tenant-app-layout>
