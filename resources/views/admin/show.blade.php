<x-app-layout>
    <div class ="bg-gray-100 dark:bg-gray-900" style="display: flex; justify-content: center">
        <div class="sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"> 
            <div class="flex justify-between p-2 mt-4">
                <h1 class="text-lg font-bold" style="text-align: center">{{ $admin->name }}</h1>
                <h1 class="text-lg font-bold ml-4" style="text-align: center">{{ $admin->email }}</h1>
            </div>
            <div class="sm:max-w-xl px-6 mt-6 dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            </div>

            <div class="flex justify-center p-2 mt-4">
                <form action ="{{ route('admin.destroy', $admin->id) }}" method="post"> 
                    @csrf
                    @method('delete')
                    <x-primary-button>Delete {{ $admin->name }}?</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>