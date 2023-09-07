<x-app-layout>
    <!-- Privacy Policy -->
    <div class="container bg-dark-subtle p-5">
        <h3 class="bg-secondary p-3" style="text-align:center">Shipping rates</h3>
        
            <p> Shipping rates are what you charge your customer in addition to the cost of the products that they order. The cost of any shipping rates are added to a 
                customer's order at checkout. You can choose a variety of shipping rates and methods to appear as options for your customers, or keep it simple and provide 
                a single option. When you create shipping rates, you can also specify any restrictions or rules around which shipping methods are available based on the contents 
                of the customer's cart. 
            </p>


            <h5> Flat shipping rates </h5>
                <p> Flat shipping rates are specific shipping amounts that you charge a customer based on their order. For example, if you want to charge Tk 60 for shipping each 
                    time a customer places an order, then you would set up Tk 60 flat shipping rate. The benefit to flat shipping rates is that you have control over precisely 
                    what a customer is charged at checkout. 
                </p>

            <h5> General rates </h5>
                <p> General rates provide a flat rate shipping cost regardless of what is in the cart. For example, if you want customers to be able to choose between regular 
                    shipping costing Tk 60 or expedited shipping costing Tk 100, then you would set up two general flat rates, one for each option.These two rates then appear 
                    as options in your checkout for any customer's order.
                </p>

            <h5> Priced-based rates </h5>
                <p> 
                    Priced-based rates let you set minimum and maximum cart values for your flat shipping rates. For example, suppose that you want to charge different 
                    rates for orders below and over Tk 10000. Using priced-based rates, you can set a flat shipping rate of Tk 200 for orders under tk 10000, and a flat shipping 
                    rate of Tk 300 for orders over Tk 50000. Review the following table that displays example price-based rates (all prices are in BDT):
                    <table class="table">
                        <thead class="table-info">
                            <tr><th scope="col">Order value</th><th scope="col">Shipping rate price</th></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tk 0 - Tk 10000</td><td>Tk 100</td>
                            </tr>
                            <tr>
                                <td>Tk 10001 - Tk 50000</td><td>Tk 300</td>
                            </tr>
                            <tr>
                                <td>Tk 50001 - and up</td><td>Tk 500</td>
                            </tr>
                        </tbody>
                    </table>
                </p>

    </div>
</x-app-layout>