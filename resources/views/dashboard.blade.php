<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
            {{-- <x-btn-link class="ml-4 float-right" href="{{route('')}}">Add Domain</x-btn-link> --}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">






            @if (auth()->user()->domains->count() == 0)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg col-4">

                    <div class="p-6 text-gray-900 ">

                        <form method="POST" action="{{ route('tenants.store') }}">
                            <div>
                                <x-input-label for="domain_name" :value="__('Domain Name')" />
                                <x-text-input id="domain_name" class="block mt-1 w-full" type="text"
                                    name="domain_name" :value="old('domain_name')" required autofocus
                                    autocomplete="domain_name" />
                                <x-input-error :messages="$errors->get('domain_name')" class="mt-2" />
                            </div>


                            <div>
                                <div class="flex shadow-sm block mt-1 w-full">
                                    <x-text-input id="domain_name" class="block mt-1 w-full border-0" type="text"
                                    name="domain_name" :value="old('domain_name')" required autofocus
                                    autocomplete="domain_name" />


                                    <span
                                        class="
                                        rounded-md shadow-sm
                                        block mt-1 w-full items-center min-w-fit
                                        border-s-1
                                        px-2 inline-flex ">
                                        {{ config('app.domain') }}

                                    </span>


                                </div>
                            </div>


                            <div class="flex items-center justify-end mt-4">


                                <x-primary-button class="ms-4">
                                    {{ __('ADD DOMAIN') }}
                                </x-primary-button>
                            </div>

                        </form>


                    </div>

                </div>
            @endif










        </div>

    </div>
    </div>

    </div>







</x-app-layout>
