@extends('layout.app')
@section('content')
    <div class="w-full">
        <div class="w-11/12 bg-slate-50 mx-auto flex pt-5">
            <div class=" Carousel w-2/6 flex flex-col">
                <div class="slider-for w-9/12 mx-auto ">
                    @foreach ($product->productImage as $productImages)
                        <img src='{{ asset('img/products') . '/' . $productImages->path }}'>
                    @endforeach
                    @foreach ($product->productImage as $productImages)
                        <img src='{{ asset('img/products') . '/' . $productImages->path }}'>
                    @endforeach
                </div>
                <div class="slider-nav my-2 mx-auto w-9/12">
                    @foreach ($product->productImage as $productImages)
                        <img class="p-1" src='{{ asset('img/products') . '/' . $productImages->path }}'>
                    @endforeach
                    @foreach ($product->productImage as $productImages)
                        <img class="p-1" src='{{ asset('img/products') . '/' . $productImages->path }}'>
                    @endforeach
                </div>
            </div>
            <div class="w-4/6 ">
                <div class="flex w-9/12 mx-auto">
                    <div class="flex flex-col ">
                        <h2>{{ $product->name }}</h2>
                        <div class="flex">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $product->avgRating)
                                    <i class="fa-sharp fa-solid fa-star"></i>
                                @else
                                    <i class="fa-sharp fa-regular fa-star"></i>
                                @endif
                            @endfor
                        </div>
                        <span>({{ count($product->productComment) }})</span>
                        <p>{{ $product->content }}</p>
                        @if ($product->discount != null)
                            <h4>  @php
                                echo number_format($product->discount, 0, '', ','); 
                            @endphp
                            VND
                            <del>
                             @php
                                echo number_format($product->price, 0, '', ','); 
                            @endphp
                            
                         </del></h4>
                        @else
                            <h4>  @php
                                echo number_format($product->price, 0, '', ','); 
                          @endphp</h4>
                        @endif
                        <div></div>
                    </div>
                    <div class="flex flex-col mt-2">
                        <div class="flex flex-col px-10">
                            <div class="flex">
                                @foreach (array_unique(array_column($product->productDetail->toArray(), 'color')) as $productColors)
                                    <div class="cc-item m-2">
                                        <input type="radio" id="cc-{{ $productColors }}"value="cc-{{ $productColors }}"
                                            class="hidden peer" required>
                                        <label for="cc-{{ $productColors }}"
                                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 ">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">{{ $productColors }}</div>
                                            </div>
                                        </label>
                                    </div>
                                @endforeach
                                </>

                            </div>
                            <div class="flex mt-5">
                                @foreach (array_unique(array_column($product->productDetail->toArray(), 'size')) as $productSize)
                                    <div class="c-item m-2 ">
                                        <input type="radio" id="sm-{{ $productSize }}"value="sm-{{ $productSize }}"
                                            class="hidden peer" required>
                                        <label for="sm-{{ $productSize }}"
                                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 ">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">{{ $productSize }}</div>
                                            </div>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <ul>
                                <li><span>CATEGORIES: </span> {{ $product->productCategory->name }}</li>
                                <li><span>TAGS: </span>{{ $product->tag }}</li>
                                <li><span>SKU: </span>{{ $product->sku }}</li>
                                <li><span>Mô tả sản phầm: </span> {!! $product->description !!}</li>
                                <li class="mt-5"><span href="javascript:addCart({{ $product->id }})" class="p-3 bg-orange-500">Thêm vào
                                        giỏ hàng </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>

                </div>
            </div>
            {{-- @endsection --}}
        </div>

    </div>
    <div class="block w-11/12 mx-auto mt-10 sm:flex">
        <div class="flex flex-col mt-5 w-9/12">
            <div class="bg-slate-50 w-full p-5">
                <table class="table-auto">
                    <tr>
                        <td>Khách hàng đánh giá:</td>
                        <td>
                            <div class="rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $product->avgRating)
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    @else
                                        <i class="fa-sharp fa-regular fa-star"></i>
                                    @endif
                                @endfor
                                <span> ({{ count($product->productComment) }})</span>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="">Giá: </td>
                        <td>
                            <div>${{ $product->price }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td>Sản Phầm Có Sẵn: </td>
                        <td>
                            <div>{{ $product->qty }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td>Cân Nặng: </td>
                        <td>
                            <div>{{ $product->weight }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td>Kích Cỡ: </td>
                        <td>
                            <div>
                                @foreach (array_unique(array_column($product->productDetail->toArray(), 'size')) as $productSize)
                                    {{ $productSize }},
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Màu Sắc: </td>
                        <td>
                            @foreach (array_unique(array_column($product->productDetail->toArray(), 'colors')) as $productColors)
                                <span class="cs-{{ $productColors }}"></span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>Mã Hàng Hóa: </td>
                        <td>{{ $product->sku }}</td>
                    </tr>
                </table>


            </div>
            <div class="flex flex-col w-full mx-auto bg-slate-50 mt-10 p-5">
                <div>
                    <div>
                        <h4>{{ count($product->productComment) }} Comments</h4>
                    </div>
                    <div>
                        @foreach ($product->productComment as $productComment)
                            <div class="mt-3 divide-y">
                                <div class="avatar->"></div>
                                <img width="40" class="rounded-circle"
                                    src="{{ asset('img/user/' . ($user->avatar ?? 'default-avatar.jpg')) }}"
                                    alt="">
                            </div>
                            <div class="avatar-text mt-2">
                                <div class="at-rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $productComment->rating)
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                        @else
                                            <i class="fa-sharp fa-regular fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <h5>{{ $productComment->name }}<span>{{ date('M,d,y'), strtotime($productComment->created_at) }}</span>
                                </h5>
                                <div class="at-reply">{{ $productComment->messages }}</div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="bg-orange-50 p-5">
                    <h3>Đánh giá và bình luận của bạn</h3>
                    <form action="" method="post" class="comment-from mb-6">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="user_id"
                            value="{{ \Illuminate\Support\Facades\Auth::user()->id ?? null }}">
                        <div class="row mt-3">
                            <input type="text" class="w-1/2 p-3" placeholder="Name" name="name">
                        </div>
                        <div class="mt-3">
                            <input type="text" class="w-1/2 p-3" placeholder="Email" name="email">
                        </div>
                        <div class="mt-3">
                            <textarea class="w-1/2 p-3" placeholder="Messages" name="messages"></textarea>
                        </div>
                        <div class="personal-rating">
                            <h6>Đánh giá của bạn</h6>
                            <div class="rate">
                                <input type="radio" id="start5" name="rating" value="5" />
                                <label for="start5" title="text">5 starts</label>
                                <input type="radio" id="start4" name="rating" value="4" />
                                <label for="start4" title="text">4 starts</label>
                                <input type="radio" id="start3" name="rating" value="3" />
                                <label for="start3" title="text">3 starts</label>
                                <input type="radio" id="start4" name="rating" value="2" />
                                <label for="start2" title="text">2 starts</label>
                                <input type="radio" id="start1" name="rating" value="1" />
                                <label for="start1" title="text">1 start</label>


                            </div>
                        </div>
                        <button type="submit" class="p-3 bg-orange-500">Send message</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="relatedProduct sm:block flex">
            @foreach ($relatedProducts as $products)
                <div class="mt-5">
                    @include('partials.productitem')
                </div>
            @endforeach
            <A></A>
        </div>
    </div>

    </div>
@endsection
