<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="{{ asset('template/assets/img/visa.svg') }}">
    <link rel="stylesheet" href="{{ asset('Signin/style.css') }}" />
    @stack('link')
    <title>Blog | Login</title>
</head>

<body>
    @yield('content')

    <script src="{{ asset('Signin/app.js') }}"></script>
    @stack('script')
</body>

</html>