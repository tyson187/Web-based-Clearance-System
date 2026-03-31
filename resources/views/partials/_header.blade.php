<header class="bg-slate-800 text-white p-4 flex justify-between items-center">
    <h2 class="text-lg font-bold">WEB-BASED CLEARANCE SYSTEM</h2>

    <div class="flex items-center gap-4">

        <span>
            @if(auth('admin')->check())
                Admin: {{ auth('admin')->user()->name }}
            @elseif(auth('student')->check())
                Student: {{ auth('student')->user()->name }}
            @elseif(auth('department')->check())
                Department: {{ auth('department')->user()->department_name }}
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