@extends('layout.app')
{{-- @section('tittle', 'Product') --}}


@section('content')
@include('partials.banner')

    <div>
        <div class="h-[550px] w-full pt-7   ">
            <h2 class="text-center text-4xl">SẢN PHẨM NỔI BẬC CỦA NỮ</h2>
            <div class="flex mt-4 responsive mx-auto  ">
                @foreach ($fearuredProduct['women'] as $products)
                    @include('partials.productitem')
                
                @endforeach

                @foreach ($fearuredProduct['women'] as $products)
                
                    @include('partials.productitem')
                
            @endforeach
            </div>
        </div>

        <div class="h-[550px] w-full pt-7 bg-neutral-200">
            <h2 class="text-center text-4xl ">SẢN PHẨM NỔI BẬC CỦA NAM</h2>
            <div class="flex mt-4 responsive ">
                @foreach ($fearuredProduct['men'] as $products)
                    @include('partials.productitem')
                @endforeach
                @foreach ($fearuredProduct['men'] as $products)
                    @include('partials.productitem')
                @endforeach
            </div>
        </div>
    </div>
    </div>
    <div class="w-full text-center">
        <a href="./shop"> <i class="fa-solid fa-caret-down"></i></a>
    </div>
    <div class=" mt-10 w-full">
        <div class="block sm:flex mx-auto w-11/12">
        @foreach ($blog as $blogs)
        <div class="w-full px-5 sm:w-1/3">
            <div >
                <img src="{{ asset('img/blog') . '/' . $blogs->image }}">
            </div>
            <i></i>
            {{ date('M d,Y', strtotime($blogs->create_at)) }}
            <div>
                <i></i>
                {{ count($blogs->blogComments) }}
            </div>
            <a href="">
                <h4>{{ $blogs->title }}</h4>
            </a>
            <p>{{ $blogs->sbutitle }}</p>
        </div>
        @endforeach
    </div>
    </div>
@endsection
