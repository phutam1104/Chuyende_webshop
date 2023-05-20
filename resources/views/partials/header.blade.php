<header class="sticky top-0 z-10">
    <nav class="w-full h-16 flex bg-orange-300 ">
        <div class="pl-2">
            <a href="./../">
            <img class="h-16 rounded-full w-16" src="{{ asset('img/logo.jpg') }}">
        </a>
        </div>
        <div class="w-3/4">
            <h5 class="text-orange-900 text-center py-4 "><b>NẤM STORE</b></h5>
        </div>
        <div class="w-1/4 sm:flex flex-col">
            <ul class=" sm:block flex flex-col mt-3">
                @if (Auth::check())
                    <a href="./account/logout">
                        <i class="fa-solid fa-user"></i>{{ Auth::user()->name }} - Đăng xuất
                    </a>
                @else
                    <div class="hidden lg:block mt-3">
                        <a href="../../account/login" class="btn btn-primary">Đăng Nhập</a>
                        <a href="../../account/register" class="btn btn-primary">Đăng Ký</a>
                    </div>
                    <div class="flex-col lg:hidden ">
                        <div>
                            <a href="../../account/login" class=""><i
                                    class="fa-solid fa-right-to-bracket fa-sm"></i> Đăng Nhập</a>
                        </div>

                        <div class="mt-2">
                            <a href="../../account/register" class=""><i class="fa-solid fa-user fa-sm"></i> Đăng
                                Ký</a>
                        </div>
                    </div>
                @endif
            </ul>
        </div>
    </nav>

</header>
