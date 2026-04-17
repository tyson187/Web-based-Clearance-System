<header class="bg-slate-800 text-white p-4 relative">
    @if(session('admin_logged_in'))
        <div class="header-left flex gap-4 items-center">
            <span>Admin: {{ session('admin_name') }}</span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="bg-red-500 px-3 py-1 rounded">Logout</button>
            </form>
        </div>
    @endif

    <div class="header-center text-center">
        <h2 class="font-bold">WEB-BASED CLEARANCE SYSTEM</h2>
    </div>
</header>