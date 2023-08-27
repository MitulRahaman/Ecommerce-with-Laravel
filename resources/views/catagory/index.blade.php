<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <div class ="bg-gray-100 dark:bg-gray-900" style="display: flex; justify-content: center">
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"> 
            <h1 class="text-lg font-bold" style="text-align: center">Catagories</h1>
            <div class="flex justify-between">
                <a href="{{ route('catagory.create') }}" class=" rounded-lg p-2" style="background:LightBlue">Add catagory</a>
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