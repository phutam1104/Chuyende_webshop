<div class="categories">
    <h4 class="text-3xl">Phân Loại</h4>
    <ul class="flex flex-col">
        @foreach($categories as $category)
            <li class="bg-gray-100 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center"><a class="" href="./shop/category/{{$category->name}}">{{$category->name}}</a></li>
        @endforeach
    </ul>
</div>
