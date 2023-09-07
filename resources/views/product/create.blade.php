<x-app-layout>
    <div class ="bg-gray-100 dark:bg-gray-900" style="display: flex; justify-content: center">
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"> 
        <h1 class="text-lg font-bold" style="text-align: center">Create new Product</h1>
            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data"> 
                @csrf
                <div class="mt-4">
                    <x-input-label for="code" :value="__('Code')" />
                    <x-text-input id="code" class="block mt-1 w-full" type="number" name="code" autofocus />
                    <x-input-error :messages="$errors->get('code')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" autofocus />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="category" :value="__('Category')" />
                    <select class="form-select" id="category" name="category[]" multiple>
                        <option selected="" disabled="" value="">...</option>
                            @forelse ($catagories as $catagory)
                            <option><p>{{ $catagory->name }} </p></option>
                            @empty
                                <p> </p>
                            @endforelse
                    </select>  
                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                </div>
                
                <div class="mt-4">
                    <x-input-label for="photo" :value="__('Photo')" />
                    <input type="file" name="photo" id="photo" />
                    <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                </div>

                <div class="flex justify-end mt-4"> 
                    <x-primary-button class="ml-3"> 
                        Create
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>