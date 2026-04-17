<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Panel')</title>

    {{-- Tailwind / CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/app.css') }}">

    {{-- Optional: prevent flash of unstyled content --}}
    @stack('styles')
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

    {{-- HEADER --}}
    @include('partials.admin._header')

    {{-- SIDEBAR --}}
    <aside class="w-full bg-slate-900 text-white">
        @include('partials.admin._sidebar')
    </aside>

    {{-- MAIN CONTENT --}}
    <main class="flex-1 p-6 overflow-auto">

            {{-- SUCCESS / ERROR MESSAGES --}}
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                    {{ session('error') }}
                </div>
            @endif

            {{-- PAGE CONTENT --}}
            @yield('content')

        </main>

    </div>

    {{-- FOOTER --}}
    @include('partials.admin._footer')
    <script>
    function showPopup(type) {
    let msg = type === 'approved' ? 'Approved' : 'Denied';
    alert(msg);
    }
    
    </script>

    {{-- Optional JS --}}
    @stack('scripts')

</body>
</html>