<!DOCTYPE html>
<html lang="en">
@include('template.member.layout.header')
<body class="layout-3">

        <div class="main-wrapper container">
            @include('template.member.layout.nav')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                 @yield('section-body')
                </section>
            </div>
            @yield('modal')
            @include('template.member.layout.credfooter')
        </div>

</body>
@include('template.member.layout.footer')
</html>
