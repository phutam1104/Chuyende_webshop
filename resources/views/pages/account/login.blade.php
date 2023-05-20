@extends('layout.app')
@section('content')
    <div class="container w-full">
        <div class="w-2/5 mx-auto   mt-5">
            @if (session('notification'))
                <div>
                    {{ session('notification') }}
                </div>
            @endif

            <form action="" method="post" class="w-full max-w-sm">
                @csrf
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                            for="username">Email</label>
                    </div>
                    <div class="md:w-2/3">
                        <input
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="inline-full-name" type="text" id="username" name="email">
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="pass">
                            Password
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="inline-password" type="password" id="password" name="password">
                    </div>
                </div>
                <div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3"></div>
                        <label class="md:w-2/3 block text-gray-500 font-bold  for="save-pass>
                            <span class="text-sm">
                                Lưu mật khẩu!
                            </span>
                            <input class="mr-2 leading-tight" type="checkbox" id="save-pass" name="remeber">
                        </label>
                    </div>
                    {{-- <label for="save-pass">
                        Lưu mật khẩu
                        <input type="checkbox" id="save-pass" name="remeber">
                        <span></span>
                    </label> --}}
                </div>
                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3 flex">
                        <button
                            class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="submit">
                            Đăng nhập
                        </button>
                        <a class="ml-4 p-3" href="./register">Đăng ký</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
