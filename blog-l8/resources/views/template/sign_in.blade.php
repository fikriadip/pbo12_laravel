<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | Register</title>
    <link rel="shortcut icon" href="{{ asset('template/assets/img/visa.svg') }}">
    <link rel="stylesheet" href="{{ asset('signin_signup/css/style.css') }}" />
    @stack('link')
</head>

<body>
    @yield('content')

    <script src="{{ asset('signin_signup/js/kit_fontawesome.min.js') }}"></script>
    <script src="{{ asset('signin_signup/js/app.js') }}"></script>
    @include('sweetalert::alert')
    @stack('script')
</body>

</html>