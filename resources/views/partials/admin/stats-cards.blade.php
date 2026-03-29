<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

    <div class="bg-white p-4 rounded shadow">
        <h3 class="text-gray-600">Total Students</h3>
        <p class="text-2xl font-bold">{{ $totalStudents ?? 0 }}</p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h3 class="text-gray-600">Pending</h3>
        <p class="text-2xl font-bold text-yellow-500">{{ $pending ?? 0 }}</p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h3 class="text-gray-600">Approved</h3>
        <p class="text-2xl font-bold text-green-500">{{ $approved ?? 0 }}</p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h3 class="text-gray-600">Rejected</h3>
        <p class="text-2xl font-bold text-red-500">{{ $rejected ?? 0 }}</p>
    </div>

</div>