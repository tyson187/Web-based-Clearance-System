<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-100">

    @include('partials.department._header')

    <div class="flex min-h-screen">

        

        <main class="flex-1 p-6">
            @yield('content')
        </main>

    </div>

    @include('partials.department._footer')

</body>
</html>