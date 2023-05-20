
<div class="sreach-and-oder sticky top-16 w-full h-28 flex my-8 z-10">
    <div class="h-28 w-8/12 bg-white mx-auto py-8" id="search">
        <div class="mx-auto">
            <form action="shop" class="">
                <div class="advaced-search ">
                    <div class="input-group text-center	 ">
                        <button type="button" class="">Tất cả các loại</button>
                        <input class="mx-4 px-3" name="search" class="" value="{{ request('search') }}"
                            type="text" placeholder="Bạn cần gì ?........">
                        <button type="submit" class=""><i
                                class="fa-sharp fa-solid fa-magnifying-glass fa-sm"></i></button>
                    </div>
                </div>
            </form>

            <form action="" class="text-center">
                <div class="select-option">
                    <select name="sort_by" onchange="this.form.submit();" class="sorting">
                        <option {{ request('sort_by') == 'latest' ? 'select' : '' }} value="latest">Sắp xếp: Mới nhất</option>
                        <option {{ request('sort_by') == 'oldest' ? 'select' : '' }} value="oldest">Sắp xếp: Cũ nhất</option>
                        <option {{ request('sort_by') == 'name-ascending' ? 'select' : '' }} value="name-ascending">Sắp xếp:
                            Tên A-Z</option>
                        <option {{ request('sort_by') == 'name-descending' ? 'select' : '' }} value="name-descending">Sắp xếp:
                            Name Z-A</option>
                        <option {{ request('sort_by') == 'price-ascending' ? 'select' : '' }} value="price-ascending">Sắp xếp:
                            Giá tăng dần</option>
                        <option {{ request('sort_by') == 'price-descending' ? 'select' : '' }} value="price-descending">
                            Sắp xếp: Giá giảm dần</option>
                    </select>
                    <select name="show" onchange="this.form.submit();" class="p-show">
                        <option {{ request('show') == '3' ? 'select' : '' }} value="3">Hiện: 3</option>
                        <option {{ request('show') == '9' ? 'select' : '' }} value="9">Hiện: 9</option>
                        <option {{ request('show') == '15' ? 'select' : '' }} value="15">Hiện: 15</option>
                    </select>
                </div>
            </form>
        </div>
</div>
