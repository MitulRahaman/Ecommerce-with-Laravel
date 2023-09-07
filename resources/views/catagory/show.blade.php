<x-app-layout>
    <div class ="bg-gray-100 dark:bg-gray-900" style="display: flex; justify-content: center">
        <div class="sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"> 
            <h1 class="text-lg font-bold" style="text-align: center">{{ $catagory->name }}</h1>
            <div class="sm:max-w-xl px-6 mt-6 dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            </div>

            <div class="flex justify-between p-2 mt-4">
                <a href="{{ route('catagory.edit', $catagory->id) }}"> 
                    <x-primary-button>Rename </x-primary-button>
                </a>
                <form action ="{{ route('catagory.destroy', $catagory->id) }}" method="post"> 
                    @csrf
                    @method('delete')
                    <x-primary-button>Delete </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>