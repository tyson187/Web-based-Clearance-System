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
<link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">
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
        </form>

        <div class="extra">
            Forgot Password? <a href="#">Click here</a>
        </div>
    </div>

</div>

</body>
</html>