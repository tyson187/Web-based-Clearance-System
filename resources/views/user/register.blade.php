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

    // VALIDATION
    if ($password !== $confirm_password) {
        $message = "Passwords do not match!";
    } else {
        // HASH PASSWORD (important!)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // FOR NOW: just success message
        // (later we connect this to MySQL)
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
    font-family:'Segoe UI', sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#e3f2fd;
}

.container{
    width:800px;
    display:flex;
    border-radius:12px;
    overflow:hidden;
    background:white;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

.left{
    flex:1;
    background:#bbdefb;
    display:flex;
    justify-content:center;
    align-items:center;
}

.left h2{
    color:#0d47a1;
}

.right{
    flex:1;
    padding:30px;
    background:#f5f5f5;
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
    border:1px solid #ccc;
    border-radius:6px;
    outline:none;
    margin-top:3px;
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
    border-radius:6px;
    background:#64b5f6;
    color:white;
    font-weight:bold;
    cursor:pointer;
}

button:hover{
    background:#42a5f5;
}

.message{
    margin-bottom:10px;
    font-size:14px;
    color:red;
    text-align:center;
}
.success{
    color:green;
}
</style>

</head>

<body>

<div class="container">

    <div class="left">
        <h2>Welcome 🎓</h2>
    </div>

    <div class="right">
        <h1>REGISTRATION</h1>

        <!-- MESSAGE -->
        <?php if($message != ""): ?>
            <div class="message <?php echo ($message == 'Registration successful!') ? 'success' : ''; ?>">
                <?php echo $message; ?>
            </div>
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