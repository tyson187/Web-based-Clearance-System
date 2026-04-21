<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Benedicto College Clearance System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            display: flex;
        }

        .left {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            flex: 1;
            min-height: 600px;
        }

        .left h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .left p {
            font-size: 1.2em;
            opacity: 0.9;
            margin-top: 20px;
        }

        .right {
            padding: 60px 40px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-height: 600px;
            overflow-y: auto;
        }

        .right h2 {
            color: #333;
            margin-bottom: 10px;
            font-size: 1.8em;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102, 126, 234, 0.2);
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .form-link {
            text-align: center;
            margin-top: 20px;
            color: #999;
            font-size: 0.95em;
        }

        .form-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .form-link a:hover {
            text-decoration: underline;
        }

        .alert {
            padding: 12px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 0.95em;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error-list {
            color: #dc3545;
            font-size: 0.9em;
            margin-top: 5px;
            list-style: none;
            padding-left: 0;
        }

        .error-list li {
            padding: 2px 0;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .left {
                min-height: 200px;
                padding: 40px 30px;
            }

            .left h1 {
                font-size: 2em;
            }

            .right {
                padding: 40px 30px;
                max-height: none;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="left">
        <div>
            <h1>🎓 BENEDICTO COLLEGE</h1>
            <p>Unified Clearance System</p>
            <p style="font-size: 0.9em; margin-top: 40px; opacity: 0.8;">Create an account to manage your clearance status</p>
        </div>
    </div>

    <div class="right">
        @if($errors->any())
            <div class="alert alert-error">
                <ul class="error-list">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <h2>Create Account</h2>
        <p style="color: #999; margin-bottom: 20px; font-size: 0.95em;">Fill in your details to register</p>

        <form method="POST" action="{{ route('register.post') }}">
            @csrf

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" placeholder="Enter your full name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label>User Type</label>
                <select name="user_type" required>
                    <option value="">Select your type</option>
                    <option value="student" {{ old('user_type') == 'student' ? 'selected' : '' }}>Student</option>
                    <option value="faculty" {{ old('user_type') == 'faculty' ? 'selected' : '' }}>Faculty</option>
                </select>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Create a password" required>
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="Confirm your password" required>
            </div>

            <button type="submit">Create Account</button>

            <div class="form-link">
                Already have an account? <a href="{{ route('login') }}">Login here</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
