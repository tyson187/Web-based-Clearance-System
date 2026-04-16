<?php
// SAMPLE USER DATA (replace with database later)
$name = "SIGMA, ALEX A.";
$student_id = "2025-00021";
$program = "BS INFORMATION";
$year = "2";
$email = "sigmaalex@gmail.com";

// SAMPLE STATUS DATA
$statuses = [
    "DEAN" => "PENDING",
    "DATA CENTER" => "PENDING",
    "LIBRARY" => "PENDING",
    "ACCOUNTING" => "PENDING",
    "REGISTRAR" => "PENDING"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Dashboard</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Segoe UI', sans-serif;
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

.header .logout{
    padding:10px 20px;
    border:2px solid #6ea8fe;
    border-radius:10px;
    color:white;
    cursor:pointer;
}

.title-bar{
    background:#1e4fbf;
    color:white;
    text-align:center;
    padding:10px;
    font-size:22px;
    font-weight:bold;
}

.main{
    display:flex;
    padding:20px;
    gap:20px;
    background:#e6e6e6;
}

.profile{
    width:300px;
    background:#f5f5f5;
    border-radius:15px;
    padding:20px;
    text-align:center;
}

.profile img{
    width:120px;
    height:120px;
    border-radius:50%;
    margin-bottom:15px;
}

.profile .info{
    text-align:left;
    margin-top:15px;
    font-size:14px;
}

.panel{
    flex:1;
    background:white;
    padding:15px;
    border-radius:10px;
}

.item{
    background:#bcbcc4;
    padding:15px;
    margin-bottom:10px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    border-radius:5px;
}

.item span{
    font-weight:bold;
    font-size:18px;
    color:white;
}

.status{
    background:#ff7a1a;
    padding:8px 15px;
    border-radius:20px;
    color:white;
    font-size:12px;
}
</style>

</head>

<body>

<!-- HEADER -->
<div class="header">
    <div class="logo">BC BENEDICTO COLLEGE</div>
    <div class="logout" onclick="window.location.href='login.php'">Log Out</div>
</div>

<!-- TITLE -->
<div class="title-bar">STUDENT</div>

<div class="main">

    <!-- PROFILE -->
    <div class="profile">
        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png">

        <h2><?php echo $name; ?></h2>
        <p><?php echo $student_id; ?></p>

        <hr style="margin:15px 0;">

        <div class="info">
            <p><b>Program:</b> <?php echo $program; ?></p>
            <p><b>Year:</b> <?php echo $year; ?></p>
            <p><b>Email:</b> <?php echo $email; ?></p>
        </div>
    </div>

    <!-- CLEARANCE PANEL -->
    <div class="panel">

        <?php foreach($statuses as $office => $status): ?>
            <div class="item">
                <span><?php echo $office; ?></span>
                <div class="status"><?php echo $status; ?>..</div>
            </div>
        <?php endforeach; ?>

    </div>

</div>

</body>
</html>