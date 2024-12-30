<!DOCTYPE html>
<html lang="en">
@include('template.site.layout.header')
@yield('style')
<body>
    <div id="app">
        @yield('app')
    </div>
    @include('template.site.layout.footer')
    @yield('script')
</body>

</html>
