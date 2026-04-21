<?php
// SAMPLE USER (ADMIN/STAFF)
$name = "Cueva, Jene-Paul";
$email = "jene-paulcueva@gmail.com";

// SAMPLE STUDENT DATA (replace with database later)
$students = [
    ["id" => "2025-00021", "name" => "SIGMA, ALEX", "course" => "BS INFORMATION", "status" => "PENDING"],
    ["id" => "2025-00022", "name" => "CRUZ, JUAN", "course" => "BS IT", "status" => "APPROVED"],
    ["id" => "2025-00023", "name" => "DELA CRUZ, MARIA", "course" => "BS CS", "status" => "PENDING"]
];

// SEARCH FUNCTION
$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Department Panel</title>

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

.header .logo{
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
    align-items:center;
    gap:15px;
    margin-bottom:20px;
}

.profile img{
    width:60px;
    height:60px;
    border-radius:50%;
}

.search-box{
    display:flex;
    justify-content:flex-end;
    margin-bottom:10px;
}

.search-box input{
    padding:8px;
    width:250px;
    border:none;
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

.status{
    padding:5px 12px;
    border-radius:15px;
    color:white;
    font-size:12px;
}

/* STATUS COLORS */
.pending{ background:#ff7a1a; }
.approved{ background:green; }
</style>

</head>

<body>

<div class="header">
    <div class="logo">BC BENEDICTO COLLEGE</div>
    <div class="logout" onclick="window.location.href='login.php'">Log Out</div>
</div>

<div class="title">DEPARTMENT OF EDUCATION</div>

<div class="container">

    <!-- PROFILE -->
    <div class="profile">
        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png">
        <div>
            <h3><?php echo $name; ?></h3>
            <p>email: <?php echo $email; ?></p>
        </div>
    </div>

    <!-- SEARCH -->
    <form method="GET" class="search-box">
        <input type="text" name="search" placeholder="Search Name/ID" value="<?php echo $search; ?>">
        <button type="submit">Search</button>
    </form>

    <!-- TABLE -->
    <table>
        <tr>
            <th>School ID</th>
            <th>Student Name</th>
            <th>Course</th>
            <th>Status</th>
        </tr>

        <?php
        foreach ($students as $student) {

            // SEARCH FILTER
            if ($search != "" && stripos($student['name'], $search) === false && stripos($student['id'], $search) === false) {
                continue;
            }

            // STATUS STYLE
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
        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>