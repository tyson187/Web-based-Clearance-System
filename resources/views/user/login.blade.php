<?php
// Simple login logic (for testing)
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // TEMPORARY login (replace with database later)
    if ($username == "admin" && $password == "1234") {
        $message = "Login successful!";
    } else {
        $message = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Benedicto College Login</title>

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
    background: linear-gradient(135deg, #cfe9ff, #6ea8fe);
}

.container{
    width:800px;
    height:450px;
    display:flex;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

.left{
    flex:1;
    background: linear-gradient(135deg, #0d47a1, #1976d2);
    color:white;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    padding:40px;
    text-align:center;
}

.left h1{
    font-size:40px;
}

.right{
    flex:1;
    background:#ffffff;
    display:flex;
    flex-direction:column;
    justify-content:center;
    padding:40px;
}

.right h2{
    margin-bottom:20px;
    color:#0d47a1;
}

.input-box{
    margin-bottom:15px;
}

.input-box label{
    display:block;
    font-size:14px;
    margin-bottom:5px;
}

.input-box input{
    width:100%;
    padding:10px;
    border-radius:8px;
    border:1px solid #ccc;
}

button{
    margin-top:10px;
    padding:12px;
    border:none;
    border-radius:8px;
    background:#1976d2;
    color:white;
    font-weight:bold;
    cursor:pointer;
}

button:hover{
    background:#0d47a1;
}

.extra{
    margin-top:15px;
    font-size:13px;
}

/* message */
.message{
    margin-bottom:10px;
    color:red;
}

button[type="button"]{
    background:#6c757d;
}

button[type="button"]:hover{
    background:#5a6268;
}
</style>
</head>

<body>

<div class="container">

    <div class="left">
        <h1>BENEDICTO COLLEGE</h1>
        <p>Hello, Benedictians 👋</p>
    </div>

    <div class="right">
        <h2>LOG IN TO YOUR ACCOUNT</h2>

        <!-- PHP MESSAGE -->
        <?php if($message != ""): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>

        <!-- FORM -->
        <form method="POST">
            <div class="input-box">
                <label>Username :</label>
                <input type="text" name="username" required>
            </div>

            <div class="input-box">
                <label>Password :</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit">Log in</button>

<button type="button" onclick="window.location.href='register.php'" style="background:#6c757d; margin-top:10px;">
    Register
</button>
        </form>

       <div class="extra">
    Forgot Password? <a href="#">Click here</a><br>
    Don't have an account? <a href="register.php">Register here</a>
</div>
    </div>

</div>

</body>
</html>