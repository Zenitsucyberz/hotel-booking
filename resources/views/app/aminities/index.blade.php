<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aminities') }}
            <x-btn-link class="ml-4 float-right" href="{{ route('aminities.create') }}">Add Aminities</x-btn-link>
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
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Name</th>
                                
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($aminities as $aminity)
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">{{ $aminity->name }}</td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium "><x-btn-link
                                            href="{{ route('aminities.edit', $aminity->id) }}">Edit</x-btn-link>





                                        <x-danger-button class="delete-button"
                                            data-action="{{ route('aminities.destroy', $aminity->id) }}">Delete</x-danger-button>





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
