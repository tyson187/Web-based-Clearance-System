<?php
// STAFF INFO
$name = session('department_name') ?? "Cueva, Jene-Paul";
$email = session('department_email') ?? "jene-paulcueva@gmail.com";

// DEFAULT STUDENTS (if session empty)
$defaultStudents = [
    ["id"=>"2025-00021","name"=>"SIGMA, ALEX","course"=>"BS INFORMATION","status"=>"PENDING"],
    ["id"=>"2025-00022","name"=>"CRUZ, JUAN","course"=>"BS IT","status"=>"APPROVED"],
    ["id"=>"2025-00023","name"=>"DELA CRUZ, MARIA","course"=>"BS CS","status"=>"PENDING"],
];

// USE SESSION DATA
$students = session('students', $defaultStudents);

// SEARCH
$search = request('search') ?? "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Department of Computer Science</title>
<link rel="stylesheet" href="{{ asset('css/department/deanCSS.css') }}">
</head>

<body>

<h1>DEPARTMENT OF COMPUTER SCIENCE</h1>

<div class="navbar">
    <button onclick="window.location.href='/login'">Logout</button>
</div>

<div class="dashboard">
    <h2>Welcome, <?php echo $name; ?></h2>
    
    <!-- STATISTICS -->
    <div class="statistics">
        <div class="stat">
            <h3>Total Clearances</h3>
            <p><?php echo count($students); ?></p>
        </div>
        <div class="stat">
            <h3>Email</h3>
            <p><?php echo $email; ?></p>
        </div>
    </div>

    <!-- SEARCH -->
    <form method="GET" style="margin-bottom: 20px;">
        <input type="text" name="search" placeholder="Search Name/ID" value="<?php echo $search; ?>">
        <button type="submit">Search</button>
    </form>

    <!-- TABLE -->
    <table class="pending-requests">
        <thead>
            <tr>
                <th>School ID</th>
                <th>Student Name</th>
                <th>Course</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($students as $student): 

            if ($search != "" && stripos($student['name'], $search) === false && stripos($student['id'], $search) === false) {
                continue;
            }

            $statusClass = strtolower($student['status']);
        ?>

        <tr>
            <td><?php echo $student['id']; ?></td>
            <td><?php echo $student['name']; ?></td>
            <td><?php echo $student['course']; ?></td>
            <td>
                <span class="status <?php echo $statusClass; ?>">
                    <?php echo $student['status']; ?>
                </span>
            </td>
            <td class="actions">
                <?php if($student['status'] == "PENDING"): ?>

                <!-- APPROVE -->
                <form method="POST" action="/update-status/<?php echo $student['id']; ?>" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="status" value="APPROVED">
                    <a class="approve" onclick="this.parentElement.submit(); return false;">Approve</a>
                </form>

                <!-- REJECT -->
                <form method="POST" action="/update-status/<?php echo $student['id']; ?>" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="status" value="REJECTED">
                    <a class="reject" onclick="this.parentElement.submit(); return false;">Reject</a>
                </form>

                <?php endif; ?>
            </td>
        </tr>

        <?php endforeach; ?>
        </tbody>
    </table>

</div>

<footer>
    <p>&copy; 2026 Web-Based Clearance System. All rights reserved.</p>
</footer>

</body>
</html>