<x-app-layout>
    <div class ="container bg-dark-subtle p-5" style="display: flex; justify-content: center">
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg"> 
            <h3 class="bg-secondary p-3" style="text-align: center">Order No. {{ $order->id }} </h3>
            <div class="w-full sm:max-w-xl mt-6 px-6 py-4 dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <div class="flex justify-between py-4"> 
                    <h5> Product Info </h5>
                    <h5> Ordered At </h5>
                </div>
                <div class="flex justify-between py-4"> 
                    <div>
                        <p><strong>Name:</strong> {{ $order->orderedProduct }} </p>
                        <p><strong>Price:</strong> {{ $order->totalPrice }} </p>
                        <p><strong>Ordered By:</strong> {{ $order->user_email }} </p>
                    </div>
                    
                    <p>{{ $order->created_at->diffForHumans() }} </p>
                </div>
                    @if(auth()->user()->isAdmin)
                        <div class="flex">
                            <form action="{{ route('order.update', $order->id) }}" method="post" >
                                @csrf
                                @method('patch')
                                <input type="hidden" name="status" value="accepted" /> 
                                <x-primary-button>ACCEPTED</x-primary-button>
                            </form>
                            <form action="{{ route('order.update', $order->id) }}" method="post" >
                                @csrf
                                @method('patch')
                                <input type="hidden" name="status" value="rejected" /> 
                                <x-primary-button class="ml-2">REJECTED</x-primary-button>
                            </form>
                            <form action="{{ route('order.update', $order->id) }}" method="post" >
                                @csrf
                                @method('patch')
                                <input type="hidden" name="status" value="shipped" /> 
                                <x-primary-button class="ml-2">SHIPPED</x-primary-button>
                            </form>
                            <form action="{{ route('order.update', $order->id) }}" method="post" >
                                @csrf
                                @method('patch')
                                <input type="hidden" name="status" value="delivered" /> 
                                <x-primary-button class="ml-2">DELIVERED</x-primary-button>
                            </form>
                        </div>
                        <div style="text-align: center">
                            <form class="mt-4"  action="{{ route('order.destroy', $order->id) }}" method="post"> 
                                @method('delete')
                                @csrf
                                <x-primary-button>Delete</x-primary-button>
                            </form>
                        </div>
                    @endif
                    <h4 class="text-success p-2">Order Status: {{$order->status}}</h4>
                    <p class="p-2"><strong>Payment Method:</strong> Cash On Delivery</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>