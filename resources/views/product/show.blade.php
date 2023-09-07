<x-app-layout>
    <div class="container bg-dark-subtle p-5">
        <div class ="bg-gray-100 dark:bg-gray-900" style="display: flex; justify-content: center">
                @if(auth()->user()->isAdmin)
                <div class="flex justify-between p-2 m-4">
                    <a class="mx-4" href="{{ route('product.edit', $product->id) }}"> 
                        <x-primary-button>Edit this product</x-primary-button>
                    </a>
                    <form action ="{{ route('product.destroy', $product->id) }}" method="post"> 
                        @csrf
                        @method('delete')
                        <x-primary-button>Delete this product </x-primary-button>
                    </form>
                </div>
                @endif
        </div>

        <div class="product-details content bg-light container">
            <div class="container">
                <div class="row px-4">
                    <div class="col-md-5 col-sm-12">
                        <div class="product-images sm:max-w-xl p-6 mt-6 dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg" style="text-align:center">
                            <h4 class="product_name text-info bg-dark py-1">{{ $product->name }}</h4>
                            <img src="{{ '/storage/' . $product->photo }}" width="400" height="400">
                        </div>
                        <ul class="thumbnail">
                            <li style="float: left">
                                <a><img src="{{ '/storage/' . $product->photo }}" width="60" height="60"></a>
                            </li>
                            <li>
                                <a><img src="{{ '/storage/' . $product->photo }}" width="60" height="60"></a>
                            </li>
                            <li>
                                <a><img src="{{ '/storage/' . $product->photo }}" width="60" height="60"></a>
                            </li>
                            <li>
                                <a><img src="{{ '/storage/' . $product->photo }}" width="60" height="60"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-7 col col-sm-12 p-4">
                        
                        <h5>Key Feature</h5>
                        <ul>
                            <li>Model: Titan GT77HX 13VI</li>
                            <li>
                                Processor: Intel Core i9-13980HX (36M Cache, 2.2 GHz up to 5.60 GHz)
                            </li>
                            <li>
                                RAM: 64GB (32x2) DDR5, Storage: 4TB SSD
                            </li>
                            <li>
                                Graphics: RTX 4090 16GB GDDR6
                            </li>
                            <li>
                                Features: 17.3" 4K UHD 144Hz Display, Backlit Keyboard, Fingerprint
                            </li>
                        </ul>
                        <h5>Payment Option</h5>
                        <div class="product-price-options row">
                            <div class="col md-6 bg-info p-2 m-2">
                                <div class="row">
                                    <div class="col md-2 mt-4">
                                        <input type="radio" name="payment" checked value="0">
                                    </div>
                                    <div class="col-md-10">
                                        <span class="price">Tk {{ $product->price }}<br /></span>
                                        <span class="p-tag">Cash On Delivery<br /></span>
                                        <span class="p-tag">Online / Cash Payment</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col md-6 bg-info p-2 m-2">
                                <div class="row">
                                    <div class="col md-2 mt-4">
                                        <input type="radio" name="payment" value="1">
                                    </div>
                                    <div class="col-md-10">
                                        <span class="price">Available soon<br /></span>
                                        <span class="p-tag">Discount for Online payment<br /></span>
                                        <span class="p-tag">0% EMI for up to 12 Months***</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('order.addcart', $product->id) }}" enctype="multipart/form-data" >
                            @csrf
                            <input class="form-control w-25 ml-2" type="number" value="1" min="1" name="quantity"><br>
                            <input class="btn btn-primary add-cart text-dark mb-2" type="submit" value="Add to Cart">
                        </form>
                    </div>
                </div>
            </div>
            <div class="container product-details-full">
                <div class="container bg-light">
                    <section class="specification bg-white p-4 m-4">
                        <div class="section-head">
                            <h2>Specification</h2>
                        </div>
                        <table class="data-table table table-bordered " cellpadding="0" cellspacing="0">
                            <colgroup>
                                <col class="name">
                                <col class="value">
                            </colgroup>
                            <thead>
                                <tr>
                                    <td class="heading-row bg-info-subtle" colspan="3">Processor</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="name">Processor Brand</td>
                                    <td class="value">AMD</td>
                                </tr>
                                <tr>
                                    <td class="name">Processor Model</td>
                                    <td class="value">Ryzen 5 5600H</td>
                                </tr>
                                <tr>
                                    <td class="name">Processor Frequency</td>
                                    <td class="value">3.3GHz up to 4.2GHz</td>
                                </tr>
                                <tr>
                                    <td class="name">Processor Core</td>
                                    <td class="value">6</td>
                                </tr>
                                <tr>
                                    <td class="name">Processor Thread</td>
                                    <td class="value">12</td>
                                </tr>
                                <tr>
                                    <td class="name">CPU Cache</td>
                                    <td class="value">
                                        L2 Cache: 3MB<br>
                                        L3 Cache: 16MB
                                    </td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <td class="heading-row bg-info-subtle" colspan="3">Chipset</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="name">Chipset Model</td>
                                    <td class="value">Integrated SoC</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <td class="heading-row bg-info-subtle" colspan="3">Display</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="name">Display Size</td>
                                    <td class="value">15.6 Inch</td>
                                </tr>
                                <tr>
                                    <td class="name">Display Type</td>
                                    <td class="value">IPS</td>
                                </tr>
                                <tr>
                                    <td class="name">Display Resolution</td>
                                    <td class="value">FHD (1920x1080)</td>
                                </tr>
                                <tr>
                                    <td class="name">Touch Screen</td>
                                    <td class="value">No</td>
                                </tr>
                                <tr>
                                    <td class="name">Refresh Rate</td>
                                    <td class="value">144Hz</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <td class="heading-row bg-info-subtle" colspan="3">Memory</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="name">RAM</td>
                                    <td class="value">8GB</td>
                                </tr>
                                <tr>
                                    <td class="name">RAM Type</td>
                                    <td class="value">DDR4 </td>
                                </tr>
                                <tr>
                                    <td class="name">Removable</td>
                                    <td class="value">Yes</td>
                                </tr>
                                <tr>
                                    <td class="name">Bus Speed</td>
                                    <td class="value">3200Mhz </td>
                                </tr>
                                <tr>
                                    <td class="name">Total RAM Slot</td>
                                    <td class="value">2</td>
                                </tr>
                                <tr>
                                    <td class="name">Max RAM Capacity</td>
                                    <td class="value">Up to 64GB</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <td class="heading-row bg-info-subtle" colspan="3">Storage</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="name">Storage Type</td>
                                    <td class="value">NVMe PCIe Gen3x4 SSD</td>
                                </tr>
                                <tr>
                                    <td class="name">Storage Capacity</td>
                                    <td class="value">512GB</td>
                                </tr>
                                <tr>
                                    <td class="name">Extra M.2 Slot</td>
                                    <td class="value">No</td>
                                </tr>
                                <tr>
                                    <td class="name">Supported SSD Type</td>
                                    <td class="value">NVMe PCIe</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <td class="heading-row bg-info-subtle" colspan="3">Graphics</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="name">Graphics Model</td>
                                    <td class="value">AMD Radeon RX 5500M</td>
                                </tr>
                                <tr>
                                    <td class="name">Graphics Memory</td>
                                    <td class="value">4GB</td>
                                </tr>
                                <tr>
                                    <td class="name">Graphics Type</td>
                                    <td class="value">GDDR6</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <td class="heading-row bg-info-subtle" colspan="3">Keyboard &amp; TouchPad</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="name">Keyboard Type</td>
                                    <td class="value">Backlit Keyboard </td>
                                </tr>
                                <tr>
                                    <td class="name">Keyboard Features</td>
                                    <td class="value">Single-Color, Red</td>
                                </tr>
                                <tr>
                                    <td class="name">TouchPad</td>
                                    <td class="value">Yes</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <td class="heading-row bg-info-subtle" colspan="3">Camera &amp; Audio</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="name">WebCam</td>
                                    <td class="value">HD type (30fps@720p)</td>
                                </tr>
                                <tr>
                                    <td class="name">Speaker</td>
                                    <td class="value">2x 2W</td>
                                </tr>
                                <tr>
                                    <td class="name">Microphone</td>
                                    <td class="value">Yes</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <td class="heading-row bg-info-subtle" colspan="3">Ports &amp; Slots</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="name">Optical Drive</td>
                                    <td class="value">N/A</td>
                                </tr>
                                <tr>
                                    <td class="name">Card Reader</td>
                                    <td class="value">N/A</td>
                                </tr>
                                <tr>
                                    <td class="name">HDMI Port</td>
                                    <td class="value">1x (4K @ 60Hz) HDMI</td>
                                </tr>
                                <tr>
                                    <td class="name">USB 2 Port</td>
                                    <td class="value">1x Type-A USB2.0</td>
                                </tr>
                                <tr>
                                    <td class="name">USB 3 Port</td>
                                    <td class="value">2x Type-A USB3.2 Gen1</td>
                                </tr>
                                <tr>
                                    <td class="name">USB Type-C / Thunderbolt Port</td>
                                    <td class="value">1x Type-C USB3.2 Gen1</td>
                                </tr>
                                <tr>
                                    <td class="name">Headphone &amp; Microphone Port</td>
                                    <td class="value">1x Mic-in/Headphone-out Combo Jack</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <td class="heading-row bg-info-subtle" colspan="3">Network &amp; Connectivity</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="name">LAN</td>
                                    <td class="value">Gb LAN</td>
                                </tr>
                                <tr>
                                    <td class="name">WiFi</td>
                                    <td class="value">802.11 ax Wi-Fi 6</td>
                                </tr>
                                <tr>
                                    <td class="name">Bluetooth</td>
                                    <td class="value">Bluetooth v5.1</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <td class="heading-row bg-info-subtle" colspan="3">Security</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="name">Fingerprint Sensor</td>
                                    <td class="value">N/A</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <td class="heading-row bg-info-subtle" colspan="3">Software</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="name">Operating System</td>
                                    <td class="value">Windows 11 Home</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <td class="heading-row bg-info-subtle" colspan="3">Power</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="name">Battery Type</td>
                                    <td class="value">3-Cell</td>
                                </tr>
                                <tr>
                                    <td class="name">Battery Capacity</td>
                                    <td class="value">53.5 Whr</td>
                                </tr>
                                <tr>
                                    <td class="name">Adapter Type</td>
                                    <td class="value">150W adapter</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <td class="heading-row bg-info-subtle" colspan="3">Physical Specification</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="name">Color</td>
                                    <td class="value">Titanium Grey</td>
                                </tr>
                                <tr>
                                    <td class="name">Dimensions</td>
                                    <td class="value">359 x 259 x 24.95 mm</td>
                                </tr>
                                <tr>
                                    <td class="name">Weight</td>
                                    <td class="value">2.35 kg</td>
                                </tr>
                                <tr>
                                    <td class="name">Body Material</td>
                                    <td class="value">Metallic Body</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <td class="heading-row bg-info-subtle" colspan="3">Warranty</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="name">Warranty Details</td>
                                    <td class="value">2 years</td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                    <section class="description bg-white p-4 m-4">
                        <div class="section-head">
                            <h2>Description</h2>
                        </div>
                        <div class="full-description" itemprop="description">
                        <h4 style="text-align: justify; ">MSI Bravo 15 B5DD Ryzen 5 5600H RX 5500M 4GB Graphics 15.6" FHD 144Hz Gaming Laptop</h4>
                        <p style="text-align: justify; ">
                            <span style="font-size: 12px;">The MSI Bravo 15 B5DD features Ryzen 5 5600H Processor (L2 3MB &amp; L3 16MB Cache, 3.3GHz Up to 4.2GHz) and 8GB DDR4 3200Mhz RAM. 
                            The AMD Ryzen 5000 Series Mobile Processor power the next generation of multithreaded tasks and provides lightning-fast responsiveness and efficient battery life 
                            for your passions at work that keep you productive and entertained anytime, anywhere. It has 2 SO-DIMM slots that support up to DDR4-3200 Memory Type and has a 
                            64GB Max Capacity. It has 512GB NVMe SSD and also comes with extra room for an upgrade. The MSI Bravo 15 B5DD is integrated with AMD Radeon RX5500M 4GB GDDR6 
                            Graphics and it has a 15.6" FHD (1920x1080), 144Hz IPS-Level display. It has a Red Backlight Keyboard. The optimized 1.5mm key travel and the responsive feedback 
                            of each keystroke on the MSI Bravo 15 B5DD make the typing experience more ergonomic. The backlit keyboard illuminates the keys brilliantly so you can easily 
                            record your passionate things in dimly lit situations. The laptop is equipped with Gb LAN, 802.11 ax Wi-Fi 6 + Bluetooth v5.1 for better communication options. 
                            It is equipped with two USB-A, which makes connecting devices easier. With the micro SD card reader and HDMI output, you can capture vivid pictures without any 
                            hassle and enjoy various experiences in life. With extreme mobility easily keep up with your fast-paced lifestyle. The MSI Bravo 15 B5DD Ryzen 5 5600H 15.6" FHD
                            Gaming Laptop comes with 2 years of warranty.</span><br></p></div>
                    </section>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>