<?php
// SAMPLE USER (STAFF)
$name = "Last Name, First Name";
$email = "firstname.lastname@gmail.com";

// SAMPLE STUDENT DATA
$students = [
    ["id"=>"2025-00021","name"=>"SIGMA, ALEX","course"=>"BSIT","status"=>"PENDING"],
    ["id"=>"2025-00022","name"=>"CRUZ, JUAN","course"=>"BSCS","status"=>"APPROVED"],
    ["id"=>"2025-00023","name"=>"LOPEZ, MARIA","course"=>"BSIS","status"=>"PENDING"],
];

// GET FILTER VALUES
$search = $_GET['search'] ?? "";
$department = $_GET['department'] ?? "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Center Panel</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI', sans-serif;
}

.header{
    background:#062a4d;
    color:white;
    padding:15px 30px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.logo{
    font-size:22px;
    font-weight:bold;
}

.logout{
    border:2px solid #6ea8fe;
    padding:10px 20px;
    border-radius:10px;
    cursor:pointer;
}

.title{
    background:#1e4fbf;
    color:white;
    text-align:center;
    padding:10px;
    font-weight:bold;
}

.container{
    padding:20px;
    background:#f0f0f0;
    min-height:90vh;
}

.profile{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.profile-left{
    display:flex;
    align-items:center;
    gap:15px;
}

.profile-left img{
    width:60px;
    height:60px;
    border-radius:50%;
}

.controls{
    text-align:right;
}

.controls select{
    padding:6px;
    border-radius:10px;
    margin-bottom:8px;
}

.search-box{
    display:flex;
}

.search-box input{
    padding:8px;
    border:none;
    width:200px;
    border-radius:5px 0 0 5px;
}

.search-box button{
    padding:8px 15px;
    border:none;
    background:#1e4fbf;
    color:white;
    border-radius:0 20px 20px 0;
    cursor:pointer;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
}

th, td{
    border:1px solid #ccc;
    padding:10px;
}

th{
    background:#e0e0e0;
}

/* STATUS COLORS */
.pending{ background:#ff7a1a; color:white; padding:5px 10px; border-radius:10px;}
.approved{ background:green; color:white; padding:5px 10px; border-radius:10px;}
</style>

</head>

<body>

<div class="header">
    <div class="logo">BC BENEDICTO COLLEGE</div>
    <button onclick="window.location.href='/login'">Logout</button>
</div>

<div class="title">LIBRARY</div>

<div class="container">

    <!-- PROFILE + CONTROLS -->
    <div class="profile">

        <div class="profile-left">
            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png">
            <div>
                <h3><?php echo $name; ?></h3>
                <p>email: <?php echo $email; ?></p>
            </div>
        </div>

        <!-- FILTER FORM -->
        <form method="GET" class="controls">
            <p>Select Department</p>
            <select name="department">
                <option value="">All</option>
                <option value="CCS" <?php if($department=="CCS") echo "selected"; ?>>CCS</option>
                <option value="CBM" <?php if($department=="CBM") echo "selected"; ?>>CBM</option>
                <option value="CoE" <?php if($department=="CoE") echo "selected"; ?>>CoE</option>
                <option value="CoED" <?php if($department=="CoED") echo "selected"; ?>>CoED</option>
            </select>

            <div class="search-box">
                <input type="text" name="search" placeholder="Search Name/ID" value="<?php echo $search; ?>">
                <button type="submit">Search</button>
            </div>
        </form>

    </div>

    <!-- TABLE -->
    <p style="margin-bottom:5px;">Table</p>

    <table>
        <tr>
            <th>School ID</th>
            <th>Student Name</th>
            <th>Course</th>
            <th>Status</th>
        </tr>

        <?php
        foreach ($students as $student) {

            // FILTER: department
            if ($department != "" && $student['course'] != $department) {
                continue;
            }

            // FILTER: search
            if ($search != "" && stripos($student['name'], $search) === false && stripos($student['id'], $search) === false) {
                continue;
            }

            $statusClass = strtolower($student['status']);
        ?>

        <tr>
            <td><?php echo $student['id']; ?></td>
            <td><?php echo $student['name']; ?></td>
            <td><?php echo $student['course']; ?></td>
            <td><span class="<?php echo $statusClass; ?>"><?php echo $student['status']; ?></span></td>
        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>