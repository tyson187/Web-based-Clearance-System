<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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

        @if(session('error'))
            <div class="message">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <div class="input-box">
                <label>Username :</label>
                <input type="text" name="username" placeholder="Enter your username" required>
            </div>

            <div class="input-box">
                <label>Password :</label>
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>

            <button type="submit">Login</button>
        </form>

        <div class="extra">
            Forgot Password? <a href="#">Click here</a>
        </div>
    </div>
</div>

</body>
</html>
