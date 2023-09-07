<x-app-layout>
@if(count($carts)!==0)
    <div class="container">
        <div class="row p-4"> 
            <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Total Price</th>
                <th scope="col">Remove</th>
                </tr>
            </thead>
                <tbody class="table-success">
                    <form method="POST" action="{{ route('order.store') }}" enctype="multipart/form-data" > 
                        @csrf
                        <?php
                            $total = 0;
                        ?>
                        @foreach($carts as $cart)
                            <tr>
                                <td>
                                    <input type="text" name="productName[]" value="{{$cart->product_title}}" hidden="">
                                    {{$cart->product_title}}
                                </td>
                                
                                <td>{{$cart->product_quantity}}</td> 
                                <td>{{$cart->product_price}}</td>

                                <td>
                                    <input type="number" name="productPrice[]" value="{{($cart->product_quantity) * ($cart->product_price)}}" hidden="">
                                    
                                    {{$cart->product_quantity * $cart->product_price}}</td>

                                <td><a class="btn btn-danger" href="{{ route('order.deleteCart', $cart->id) }}">Delete </a></td>
                            </tr>
                            <?php 
                                $total += ($cart->product_quantity * $cart->product_price);
                            ?>
                        @endforeach
                </tbody>
                </table>
                        <div class="flex justify-between"> 
                            <h3 class="bg-info px-4">Total Payable amount: {{$total}} </h3>
                            <button class="btn btn-dark">Confirm Order </button>
                        </div>
                    </form>
            @else
            <h4 class="p-6">Your cart is empty!! Please add some products first... <h4>
            @endif

        </div>
    </div>

</x-app-layout>