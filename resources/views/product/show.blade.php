<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <div class ="bg-gray-100 dark:bg-gray-900" style="display: flex; justify-content: center">
        <div class="sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"> 
            <h1 class="text-lg font-bold" style="text-align: center">{{ $product->name }}</h1>
            <div class="sm:max-w-xl px-6 mt-6 dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <img src="{{ '/storage/' . $product->photo }}" width="400" height="400">
                <p>Price:৳ {{ $product->price }} </p>
            </div>

            <div class="flex justify-between p-2 mt-4">
                <a href="{{ route('product.edit', $product->id) }}"> 
                    <x-primary-button>Edit </x-primary-button>
                </a>
                <form action ="{{ route('product.destroy', $product->id) }}" method="post"> 
                    @csrf
                    @method('delete')
                    <x-primary-button>Delete </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>