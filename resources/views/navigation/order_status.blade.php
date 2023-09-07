<x-app-layout>
    <div class ="container bg-dark-subtle p-5" style="display: flex; justify-content: center">
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg"> 
            <h3 class="bg-secondary p-3" style="text-align: center">All Orders</h3>
            <div class="w-full sm:max-w-xl mt-6 px-6 py-4 dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                    <div class="flex justify-between py-4"> 
                        <p class="bg-info p-2">Order ID </p>
                        <p class="bg-info p-2">Ordered Product </p>
                    </div>
                @forelse ($orders as $order)
                    <div class="flex justify-between py-4"> 
                        <p>{{ $order->id }} </p>
                        <a style="margin-left:100px;" href="{{ route('order.show', $order->id) }}"> {{ $order->orderedProduct }} </a>
                    </div>
                @empty
                <p>No order placed. </p>

                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>