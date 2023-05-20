    <div class="" id="order">
        <div class="mt-5 group relative ">
            <a href="./cart" class="flex p-5 cart">
                <h5><i class="fa-solid fa-cart-shopping fa-2xl" style="color: #cc7828;"></i></h5>
                <sup class="cart-count" style="color: #cc7828;">{{ Cart::count() }}</sup>
            </a>
            <div class="hidden absolute group-hover:block right-5">
                {{-- <div>
                    <tbody>
                        @foreach (Cart::content() as $cart)
                            <td>
                            <td><img src="{{ asset('img/products') . '/' . $cart->options->images[0]->path }}"
                                    alt=""></td>
                            <td>
                                <div>
                                    <p>{{ $cart->price }}x{{ $cart->qty }}</p>
                                    <h6>{{ $cart->name }}</h6>
                                </div>
                            </td>
                            </td>
                        @endforeach
                    </tbody>


                </div> --}}
                <div class="h-5 w-5 ml-28" style="border-width: 0 10px 10px 10px;border-color: transparent transparent rgb(255 247 237)transparent;"
                >

                </div>
                <div class=" bg-orange-50 rounded-xl p-3">
                    <div>
                        <div class="select-total p-2">
                            <span>Tổng tiền: </span>
                            <h5>{{ Cart::total() }}<sup>vnd</sup></h5>
                        </div>
                    </div>
                    <div class="select-button flex mt-[-10px]">
                        <a class="px-2" href="../../cart"><i
                                class="fa-sharp fa-solid fa-basket-shopping fa-sm"></i></a>
                        <a class="px-2" href="../../checkout"><span>Thanh toán</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
