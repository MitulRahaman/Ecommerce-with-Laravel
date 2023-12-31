<x-app-layout>
    <div class ="bg-gray-100 dark:bg-gray-900" style="display: flex; justify-content: center">
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"> 
            <h1 class="text-lg font-bold" style="text-align: center">Catagories</h1>
            <div class="flex justify-between">
                <a class="mx-4" href="{{ route('catagory.create') }}"> <x-primary-button>Add catagory</x-primary-button> </a>
            </div>
        
            <div class="w-full sm:max-w-xl mt-6 px-6 py-4 dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <div class="flex justify-between py-4"> 
                    <table class="table table-primary table-striped-columns">
                            <thead class="table-dark">
                                <tr>
                                <th scope="col">Name</th>
                                </tr>
                            </thead>
                            @forelse ($catagories as $catagory)
                            <tbody>
                                <tr>
                                <td><a href="{{ route('catagory.show' , $catagory->id) }}">{{ $catagory->name }} </a></td>
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