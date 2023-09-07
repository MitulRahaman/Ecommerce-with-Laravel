<x-app-layout>
    <div class ="bg-gray-100 dark:bg-gray-900" style="display: flex; justify-content: center">
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"> 
            <h1 class="text-lg font-bold" style="text-align: center">Admins</h1>
            <div class="flex justify-between">
                <a class="mx-4" href="{{ route('admin.create') }}"> <x-primary-button>Add new Admin</x-primary-button> </a>
            </div>
        
            <div class="w-full sm:max-w-xl mt-6 px-6 py-4 dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <div class="flex justify-between py-4"> 
                    <table class="table table-primary table-striped-columns">
                            <thead class="table-dark">
                                <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                </tr>
                            </thead>
                            @forelse ($admins as $admin)
                            <tbody>
                                <tr>
                                <td><a href="{{ route('admin.show' , $admin->id) }}">{{ $admin->name }} </a></td>
                                <td><a href="{{ route('admin.show' , $admin->id) }}">{{ $admin->email }} </a></td>
                                </tr>
                            </tbody>
                            @empty
                            <p> </p>
                            @endforelse
                        </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

