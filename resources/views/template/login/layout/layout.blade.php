<!DOCTYPE html>
<html lang="en">
@include('template.login.layout.header')
@yield('style')
<body>
    <div id="app">
        @yield('app')
    </div>
    @include('template.login.layout.footer')
    @yield('script')
</body>

</html>
