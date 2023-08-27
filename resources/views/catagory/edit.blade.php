<x-app-layout>
    <div class ="bg-gray-100 dark:bg-gray-900" style="display: flex; justify-content: center">
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"> 
        <h1 class="text-lg font-bold" style="text-align: center">Rename Catagory: {{$catagory->code}}</h1>
            <form method="POST" action="{{ route('catagory.update', $catagory->id) }}" enctype="multipart/form-data"> 
                @csrf
                @method('patch')

                <div class="mt-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $catagory->name }}" autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="flex justify-end mt-4"> 
                    <x-primary-button class="ml-3"> 
                        Rename
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
    
</x-app-layout>