<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between">
            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<!-- Navbar -->
<nav x-data="{ open: false }" class="navbar" style="background-color: #e3f2fd;">
        <nav class="navbar navbar-expand-xl bg-body-tertiary mx-5 my-2">
            <div class="container-fluid">
                <div class="shrink-0 flex items-center">
                    <a class="ml-4" href="{{ route('product.index') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>
                <a class="navbar-brand bg-success-subtle p-2 mx-4" href="https://appnap.io/" target="_blank"><h5>Appnap Online Shopping</h5></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll mx-4" style="--bs-scroll-height: 100px;">
                        <li class="nav-item mx-4">
                            <a class="nav-link active" aria-current="page" href="{{ route('product.index')}}">Home</a>
                        </li>

                        <li class="nav-item dropdown mx-4">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Products
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                    $catagories = DB::select('select * from catagories');
                                ?>
                                @foreach ($catagories as $catagory)
                                <li><a class="dropdown-item" href="{{ route('product.index1', $catagory->id) }}">{{ $catagory->name }}</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link" href="/navigation/offer">Offer</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link" href="/navigation/refund">Refund Policy</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link" href="/navigation/customer_care">Customer Care</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link" href="/navigation/emi">EMI Terms</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link" href="/navigation/privacy_policy">Privacy Policy</a>
                        </li>
                        <li class="nav-item mx-4">
                            <?php
                                use App\Models\Cart;
                                $user = auth()->user();
                                $count = Cart::where('email', $user->email)->count();
                            ?>
                            
                            <a class="nav-link" href="{{ route('order.showcart') }}"><i class="fa-solid fa-cart-shopping"  id="cart-icon">[{{$count}}] </i></a>
                            
                        </li>
                        <li class="nav-item mx-4">
                            <div class="hidden sm:flex sm:items-center sm:ml-2">
                                <x-dropdown text-align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                            <div>{{ Auth::user()->name }}</div>

                                            <div class="ml-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>


                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('profile.edit')">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>

                                        @if(auth()->user()->isAdmin)
                                            <x-dropdown-link :href="route('product.create')">
                                                {{ __('Create New Product') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('catagory.index')">
                                                {{ __('Show catagory') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('admin.index')">
                                                {{ __('Manage Admins') }}
                                            </x-dropdown-link>
                                        @endif

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        </li>

                        <li class="nav-item mx-4">
                            <a class="nav-link" href="{{route('order.index')}}">Order Status</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </nav>