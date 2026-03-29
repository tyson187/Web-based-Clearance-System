<div class="mt-8 bg-white rounded shadow p-4">

    <!-- SEARCH -->
    <form method="GET" action="{{ route('admin.clearance') }}" class="mb-4">
        <input 
            type="text" 
            name="search" 
            placeholder="Search student or department..."
            value="{{ request('search') }}"
            class="border p-2 rounded w-1/3"
        >
        <button class="bg-blue-500 text-white px-3 py-2 rounded">
            Search
        </button>
    </form>

    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- TABLE -->
    <table class="w-full">
        <thead class="bg-slate-800 text-white">
            <tr>
                <th class="p-2">Student</th>
                <th class="p-2">Department</th>
                <th class="p-2">Status</th>
                <th class="p-2">Action</th>
            </tr>
        </thead>

        <tbody>
        @forelse($clearances as $c)
            <tr class="border-b text-center">

                <td class="p-2">{{ $c->student_name }}</td>
                <td class="p-2">{{ $c->department }}</td>

                <td class="p-2">
                    <span class="
                        @if($c->status == 'Pending') text-yellow-500
                        @elseif($c->status == 'Approved') text-green-500
                        @else text-red-500
                        @endif
                    ">
                        {{ $c->status }}
                    </span>
                </td>

                <td class="p-2 flex justify-center gap-2">

                    <!-- APPROVE -->
                    <form method="POST" action="{{ route('clearance.approve', $c->id) }}">
                        @csrf
                        <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                            Approve
                        </button>
                    </form>

                    <!-- REJECT -->
                    <form method="POST" action="{{ route('clearance.reject', $c->id) }}">
                        @csrf
                        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                            Reject
                        </button>
                    </form>

                </td>

            </tr>
        @empty
            <tr>
                <td colspan="4" class="p-4 text-center">No records found</td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>