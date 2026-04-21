<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/app.css') }}">
</head>

<body class="bg-gray-100">

    @include('partials.user._header')

    <div class="flex min-h-screen">

        @include('partials.user._menu')

        <main class="flex-1 p-6">
            @yield('content')
        </main>

    </div>

    @include('partials.user._footer')

</body>
</html>