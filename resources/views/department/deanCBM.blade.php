<?php
// STAFF INFO
$name = "Zoilo, Jaype";
$email = "jaypezoilo@gmail.com";

// DEFAULT STUDENTS (if session empty)
$defaultStudents = [
    ["id"=>"2025-00045","name"=>"DELA CRUZ, JUAN","course"=>"BSBA","status"=>"PENDING"],
    ["id"=>"2025-00046","name"=>"SANTOS, MARIA","course"=>"BSBA","status"=>"APPROVED"],
    ["id"=>"2025-00047","name"=>"GARCIA, PEDRO","course"=>"BSBA","status"=>"PENDING"],
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
<title>Department of Business and Management</title>
@vite('resources/css/deanCBM.css')
</head>

<body>

<div class="header">
    <div class="logo">WEB-BASED CLEARANCE SYSTEM</div>
    <div class="logout" onclick="window.location.href='/login'">Logout</div>
</div>

<div class="title">DEPARTMENT OF BUSINESS AND MANAGEMENT</div>

<div class="container">

    <!-- PROFILE -->
    <div class="profile">

        <div class="profile-left">
            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png">
            <div>
                <h3><?php echo $name; ?></h3>
                <p>Email: <?php echo $email; ?></p>
            </div>
        </div>

        <!-- SEARCH -->
        <form method="GET" class="search-box">
            <input type="text" name="search" placeholder="Search Name/ID" value="<?php echo $search; ?>">
            <button type="submit">Search</button>
        </form>

    </div>

    <!-- TABLE -->
    <table>
        <tr>
            <th>School ID</th>
            <th>Student Name</th>
            <th>Course</th>
            <th>Status / Actions</th>
        </tr>

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
                <span class="<?php echo $statusClass; ?>">
                    <?php echo $student['status']; ?>
                </span>

                <?php if($student['status'] == "PENDING"): ?>

                <!-- APPROVE -->
                <form method="POST" action="/update-status/<?php echo $student['id']; ?>" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="status" value="APPROVED">
                    <button class="approve-btn">Approve</button>
                </form>

                <!-- REJECT -->
                <form method="POST" action="/update-status/<?php echo $student['id']; ?>" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="status" value="REJECTED">
                    <button class="reject-btn">Reject</button>
                </form>

                <?php endif; ?>
            </td>
        </tr>

        <?php endforeach; ?>

    </table>

</div>

</body>
</html>