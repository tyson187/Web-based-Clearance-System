<tbody>
@forelse($clearances as $c)
<tr class="border-b text-center">

    <td class="p-2">{{ $c->student_name }}</td>
    <td class="p-2">{{ $c->department }}</td>

    <td class="p-2">
        <span class="
            px-2 py-1 rounded text-white
            @if($c->status == 'Pending') bg-yellow-500
            @elseif($c->status == 'Approved') bg-green-500
            @else bg-red-500
            @endif
        ">
            {{ $c->status }}
        </span>
    </td>

    <td class="p-2 flex justify-center gap-2">

        <form method="POST" action="{{ route('clearance.approve', $c->id) }}">
            @csrf
            <button class="bg-green-500 text-white px-2 py-1 rounded">
                ✔
            </button>
        </form>

        <form method="POST" action="{{ route('clearance.reject', $c->id) }}">
            @csrf
            <button class="bg-red-500 text-white px-2 py-1 rounded">
                ✖
            </button>
        </form>

    </td>

</tr>
@empty
<tr>
    <td colspan="4" class="p-4 text-center">No records</td>
</tr>
@endforelse
</tbody>