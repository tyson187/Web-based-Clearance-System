<header class="bg-slate-800 text-white p-4 flex justify-between items-center">
    <h2 class="text-lg font-bold">WEB-BASED CLEARANCE SYSTEM</h2>

    <div class="flex items-center gap-4">

        <span>
            @if(session('admin_logged_in'))
                Admin: {{ session('admin_name') }}
            @elseif(auth()->check())
                User: {{ auth()->user()->name }}
            @elseif(session('department_logged_in'))
                Department: {{ session('department_name') }}
            @endif
        </span>

        <!-- REAL LOGOUT -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded">
                Logout
            </button>
        </form>

    </div>
</header>