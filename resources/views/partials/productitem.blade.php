<div class="w-72 bg-amber-100 border border-gray-200 rounded-lg mx-2 ">
    <div class="h-[303px] mx-auto">
        <img class="px-7 pt-5 h-full w-full	" src="{{asset("img/products")."/".$products->productImage[0]->path}}">
    </div>

    <div class="px-5 pb-5">


            <h5 class="text-xl font-semibold tracking-tight text-zinc-800 ">{{$products->name}}</h5>
            <div>
                <h5  class="text-xl font-semibold tracking-tight text-gray-900 ">{{$products->tag}}</h5>
                <a href="../product/{{$products->id}}"></a>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 ">
                @if($products->discount !=null)
                   @php
                       echo number_format($products->discount, 0, '', ','); 
                   @endphp
                   VND
                   <del>
                    @php
                       echo number_format($products->price, 0, '', ','); 
                   @endphp
                   
                </del>
            
               @else
               @php
                 echo number_format($products->price, 0, '', ','); 
           @endphp
               @endif
           </h3>
        <div class="flex items-center justify-between">
            <a href="javascript:addCart({{$products->id}})" class="bg-orange-500 hover:bg-orange-300 text-white font-bold py-1 px-2 rounded">Thêm vào giỏ hàng <i class="fa-sharp fa-light fa-cart-arrow-up fa-sm"></i></a>

            <a href="./shop/product/{{$products->id}}" class="text-white bg-orange-500 hover:bg-orange-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 text-center">Xem Thêm</a>

        </div>
    </div>
</div>
