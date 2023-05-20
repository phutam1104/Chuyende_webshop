@extends('layout.app')

@section('content')
    <section class="checkout-section">
        <div class="container">
            <form action="" method="post" class="checkoutform">
                @csrf
                <div class="flex">
                    @if (Cart::count() > 0)
                        <div class="w-3/5 mx-auto">
                            <h4>Chi tiết hóa đơn</h4>
                            <div class="mt-1 px-10 bg-slate-50">
                                <div class="flex flex-col my-2">
                                    <label for="fir">Họ <span>*</span></label>
                                    <input type="text" id="fir" name="first_name"
                                        value="{{ Auth::user()->name ?? '' }}">
                                </div>
                                <div class="flex flex-col my-2">
                                    <label for="last">Tên <span>*</span></label>
                                    <input type="text" id="last" name="last_name">
                                </div>
                                <div class="flex flex-col my-2">
                                    <label for="cun-name">Tên công ty</label>
                                    <input type="text" id="cun-name" name="company_name"
                                        value="{{ Auth::user()->company_name ?? '' }}">
                                </div class="flex flex-col my-2">
                                <div class="flex flex-col my-2">
                                    <label for="cun">Quê quán <span>*</span></label>
                                    <input type="text" id="cun" name="country"
                                        value="{{ Auth::user()->country ?? '' }}">
                                </div>
                                <div class="flex flex-col my-2">
                                    <label for="street">Địa chỉ <span>*</span></label>
                                    <input type="text" id="street" name="street_address"
                                        value="{{ Auth::user()->street_address ?? '' }}">
                                </div>
                                <div class="flex flex-col my-2">
                                    <label for="zip">Mã vùng</label>
                                    <input type="text" id="zip" name="postcode_zip"
                                        value="{{ Auth::user()->postcode_zip ?? '' }}">
                                </div>
                                <div class="flex flex-col my-2">
                                    <label for="town">Thành Phố/ Tỉnh <span>*</span></label>
                                    <input type="text" id="town" name="town_city"
                                        value="{{ Auth::user()->town_city ?? '' }}">
                                </div>
                                <div class="flex flex-col my-2">
                                    <label for="email">Địa chỉ Email</label>
                                    <input type="text" id="email" name="email">
                                </div>
                                <div class="flex flex-col my-2">
                                    <label for="phone">Số điện thoại <span>*</span></label>
                                    <input type="text" id="phone" name="phone"
                                        value="{{ Auth::user()->phone ?? '' }}">
                                </div>
                                <div class="pt-2">
                                    <div class="create-iteam">
                                        <label for="acc-create">
                                            Tạo tài khoảng
                                            <input type="checkbox" id="acc-create">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-slate-50 px-3">
                            <div class="checkout-content pt-2">
                                <input type="text" placeholder="Nhập mã giảm giá">
                            </div>
                            <div class="order-total">
                                <ul class="order-table py-2">
                                    <li class="my-2"><a hrefTổng<span>Sản phẩm</span></li>
                                    @foreach ($carts as $cart)
                                        <li class="my-2" class="fw-normal my-2">
                                            {{ $cart->name }} x {{ $cart->qty }}

                                            <span>||
                                                @php
                                                    echo number_format($cart->price * $cart->qty, 0, '', ',');
                                                @endphp vnd</span>
                                        </li>
                                    @endforeach
                                    <li class="my-2">Chi tiết tổng <span>{{ $subtotal }}vnd</span></li>
                                    <li class="my-2">Tổng <span>{{ $total }}vnd</span></li>
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Trả Offline
                                            <input type="radio" name="payment_type" value="pay_later" id="pc-check"
                                                checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Trả Online
                                            <input type="radio" name="payment_type" value="online_payment" id="pc-paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                        <div class="pt-3">
                                            <input class="btn-primary" type="submit" value="Đặt Hàng">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="mx-auto relative h-52" >
                            <h4 class="text-center">Giỏ hàng trống!</h4>
                            <a class="absolute btn-primary bottom-7 right-4" href="/">Trở về</a>

                        </div>
                    @endif
                </div>

            </form>
        </div>

    </section>
@endsection
