@include('partials.head')
<body>


    <!-- Wrap all page content here -->
    <div id="wrap" class="container bs-docs-container">
        @if (Session::has('message'))
        <div class="flash alert">
            <p>{{ Session::get('message') }}</p>
        </div>
        @endif

        <!-- Fixed navbar -->
        @include('partials.nav')

        <!-- Begin page content -->


        <div class="main-content">
            @yield('main')
        </div>
    </div>

    <hl/>

    @include('partials.footer')

</body>
</html>
