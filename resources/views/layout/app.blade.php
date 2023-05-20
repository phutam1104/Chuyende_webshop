<!DOCTYPE html>
<html>
    @include('partials.head')
    <body>
        <div class="h-full bg-violet-50">
            @include('partials.header')
            @include('partials.search')
            @include('partials.order')
            <main id="main-content">
                @yield('content')
            </main>

              {{-- @if (App\display_sidebar())
              <aside class="sidebar">
                @include('partials.sidebar')
              </aside>
            @endif --}}
            @include('partials.footer')
            @include('partials.javascript')
        </div>
{{--    <script>--}}
{{--        function addCart(productId) {--}}
{{--            console.log(productId);--}}
{{--        }--}}

{{--    </script>--}}

    </body>
</html>
