<!DOCTYPE html>
<html>
    @include('admincp.adminpartials.head')
    <body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
            @include('admincp.adminpartials.header')

            <main id="main-content">
                @include('admincp.adminpartials.sidebard')
                @yield('content')
              </main>
            @include('admincp.adminpartials.footer')
        </div>
        @include('admincp.adminpartials.javascript')
    </body>
</html>
