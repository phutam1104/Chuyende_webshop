@extends('layout.app')
{{-- @section('tittle', 'Product') --}}
@section('content')
    @if (Cart::count() > 0)
        <div class="w-full">
            <div class="cart-table px-44 ">
                <table class="table-auto bg-slate-50 ">
                    <thead class="text-gray-700 uppercase h-3">
                        <tr>
                            <th>Hình ảnh</th>
                            <th class="w-28">Tên sản phẩm</th>
                            <th class="w-28">Giá</th>
                            <th class="w-28">Số lượng</th>
                            <th class="w-28">Tổng tiền</th>
                            <th class="w-28">
                                <i onclick="confirm('Bạn có muốn xóa tất cả trong giỏi hàng')===true?destroyCart():''">x</i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($carts as $cart)
                            <tr data-rowid="{{ $cart->rowId }}" class="text-center border-b border-gray-200">
                                <td>
                                    <img class="p-3"
                                        src="{{ asset('img/products') . '/' . $cart->options->images[0]->path }}">
                                </td>
                                <td>
                                    <h5>{{ $cart->name }}</h5>
                                </td>
                                <td>
                                    ${{ number_format($cart->price, 2) }}
                                </td>
                                <td>
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input style="width: 50px" class="text-center" type="text"
                                                value="{{ $cart->qty }}" data-rowid="{{ $cart->rowId }}">
                                        </div>
                                    </div>
                                </td>
                                <td class="total-price first-row">
                                    {{ number_format($cart->price * $cart->qty, 2) }} VND
                                </td>
                                <td>
                                    <i onclick="removeCart('{{ $cart->rowId }}')">x</i>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <div class="bg-slate-50 mt-8    ">
                <div class="flex relative">
                    <ul>
                        <li class="subtotal p-1">Chi tiết tổng tiền: <span>${{ $total }}</span> </li>
                        <li class="cart-total p-1">Tổng tiền: <span>${{ $subtotal }}</span></li>
                    </ul>
                    <div class="flex absolute top-0 right-0 ">
                        <a class="btn-primary m-3" href="./checkout">Thanh Toán</a>
                        <a class="btn-primary m-3" href="/">Trở về</a>

                    </div>
                </div>
            </div>
        @else
            <div class="h-52 relative">
                <h4 class="text-center">Giỏ hàng trống</h4>
                <a class="absolute btn-primary bottom-7 right-4" href="/">Trở về</a>
            </div>
    @endif
    </div>
@endsection
