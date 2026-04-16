<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $program = $_POST['program'];
    $year = $_POST['year'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Simple validation
    if ($password !== $confirm_password) {
        $message = "Passwords do not match!";
    } else {
        // TEMPORARY success (replace with database later)
        $message = "Registration successful!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Segoe UI', sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1') no-repeat center center/cover;
}

.container{
    width:900px;
    height:500px;
    display:flex;
    border-radius:20px;
    overflow:hidden;
    backdrop-filter: blur(10px);
}

.left{
    flex:1;
    display:flex;
    justify-content:center;
    align-items:center;
}

.left img{
    width:300px;
}

.right{
    flex:1;
    background: rgba(255,255,255,0.85);
    padding:30px;
    border-radius:20px;
}

.right h1{
    text-align:center;
    margin-bottom:20px;
    color:#0d47a1;
}

.input-box{
    margin-bottom:12px;
}

.input-box label{
    font-size:12px;
    font-weight:bold;
    color:#0d47a1;
}

.input-box input{
    width:100%;
    padding:8px;
    border:none;
    border-bottom:2px solid #ccc;
    outline:none;
    background:transparent;
}

.row{
    display:flex;
    gap:10px;
}

.row .input-box{
    flex:1;
}

button{
    width:100%;
    padding:12px;
    margin-top:15px;
    border:none;
    border-radius:8px;
    background:#1e4fbf;
    color:white;
    font-weight:bold;
    cursor:pointer;
}

button:hover{
    background:#0d47a1;
}

/* MESSAGE */
.message{
    margin-bottom:10px;
    font-size:14px;
    color:red;
}
</style>

</head>

<body>

<div class="container">

    <div class="left">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/768px-Placeholder_view_vector.svg.png" alt="Logo">
    </div>

    <div class="right">
        <h1>REGISTRATION</h1>

        <!-- MESSAGE -->
        <?php if($message != ""): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>

        <form method="POST">

            <div class="input-box">
                <label>STUDENT ID</label>
                <input type="text" name="student_id" required>
            </div>

            <div class="input-box">
                <label>USERNAME</label>
                <input type="text" name="username" required>
            </div>

            <div class="input-box">
                <label>EMAIL</label>
                <input type="email" name="email" required>
            </div>

            <div class="row">
                <div class="input-box">
                    <label>PROGRAM</label>
                    <input type="text" name="program" required>
                </div>

                <div class="input-box">
                    <label>YEAR</label>
                    <input type="text" name="year" required>
                </div>
            </div>

            <div class="input-box">
                <label>PASSWORD</label>
                <input type="password" name="password" required>
            </div>

            <div class="input-box">
                <label>CONFIRM PASSWORD</label>
                <input type="password" name="confirm_password" required>
            </div>

            <button type="submit">REGISTER</button>

        </form>
    </div>

</div>

</body>
</html>