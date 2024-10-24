<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}assets/imgs/theme/favicon.ico">
    <title>{{ $title ?? 'Surfside Media' }}</title>
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/main.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/custom.css">
    @vite(['resources/js/app.js'])
    @livewireStyles
</head>

<body>

    @livewire('layout.header')
    <main>
        {{ $slot }}
    </main>
    @livewire('layout.footer')
    <!-- Vendor JS-->
    <script src="{{ asset('/') }}assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="{{ asset('/') }}assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('/') }}assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="{{ asset('/') }}assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/slick.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/jquery.syotimer.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/wow.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/jquery-ui.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/perfect-scrollbar.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/magnific-popup.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/select2.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/waypoints.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/counterup.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/images-loaded.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/isotope.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/scrollup.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/jquery.vticker-min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/jquery.theia.sticky.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/jquery.elevatezoom.js"></script>
    <!-- Template  JS -->
    <script src="{{ asset('/') }}assets/js/main.js?v=3.3"></script>
    <script src="{{ asset('/') }}assets/js/shop.js?v=3.3"></script>
    <script>
        $.fn.modal.Constructor.prototype.show = () => $('.modal-backdrop').not(":first").remove();
    </script>
    @livewireScripts
    @stack('scripts')

</body>

</html>
