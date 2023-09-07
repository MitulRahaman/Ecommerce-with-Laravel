<x-app-layout>

    <h3 class="font-bold text-center py-4">All Products</h3>
    <!-- Products -->
    <div class="container bg-dark-subtle">
        <div class="row"> 
            @forelse ($products as $product)
                <div class="card col-md-6 col-sm-12 m-4 card-body">
                    <div class="card h-100">
                        <a class="card-title" href="{{ route('product.show' , $product->id) }}">
                            <img src="{{ '/storage/' . $product->photo }}" class="card-img-top" alt="...">
                            <h5 class="product_name mt-1">{{ $product->name }}</h5>
                        </a>
                        <div class="card-footer text-body-secondary m-4">
                            <h4 class="text-success price">Tk {{ $product->price }}</h4>
                        </div>
                        <form method="POST" action="{{ route('order.addcart', $product->id) }}" enctype="multipart/form-data" >
                            @csrf
                            <input class="form-control w-25 ml-2" type="number" value="1" min="1" name="quantity"><br>
                            <input class="btn btn-primary add-cart text-dark mb-2" type="submit" value="Add to Cart">
                        </form>
                        
                    </div>
                </div>
                @empty
                <p> </p>
            @endforelse
        </div>
    </div>
</x-app-layout>

