@extends('layout.app')
@section('content')
    <div class="flex px-5">
        @include('partials.categories')
        <div class="flex flex-wrap px-3 mx-auto ">
            @foreach ($product as $products)
                <div class="mt-2">
                    @include('partials.productitem')
                </div>
            @endforeach
        </div>
    </div>
    <div class="py-5">
        {{ $product->links() }}
    </div>
@endsection
