<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Businesses') }}
            <x-btn-link class="ml-4 float-right" href="{{ route('roomcategories.create') }}">Add Room Categories</x-btn-link>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Business Id</th>
                                <th scope="col">Status</th>
                                
                                 <th scope="col">Actions</th> 
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($room_categories as $room_category) 
                                <tr>

                                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4">{{ $room_category->name }}</td>
                                    <td class="px-6 py-4">{{ $room_category->business_id }}</td>
                                    <td class="px-6 py-4">{{ $room_category->status }}</td>
                                    
                                     <td class="px-6 py-4"><x-btn-link
                                            href="{{ route('roomcategories.edit',$room_category->id) }}">Edit</x-btn-link>





                                        <x-danger-button class="delete-button"
                                            data-action="{{ route('roomcategories.destroy', $room_category->id) }}">Delete</x-danger-button>

 



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
