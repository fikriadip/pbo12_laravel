<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog | Login</title>
    <link rel="shortcut icon" href="{{ asset('template/assets/img/visa.svg') }}">
    <link rel="stylesheet" href="{{ asset('Signin/css/style.css') }}" />
    @stack('link')
</head>

<body>
    @yield('content')

    <script src="{{ asset('template/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script src="{{ asset('Signin/js/kit_fontawesome.min.js') }}"></script>
    <script src="{{ asset('Signin/js/app.js') }}"></script>
    @stack('script')
</body>

</html>