<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Benedicto College Clearance System</title>
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
            min-height: 500px;
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
        }

        .right h2 {
            color: #333;
            margin-bottom: 10px;
            font-size: 1.8em;
        }

        .role-tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            border-bottom: 2px solid #eee;
        }

        .role-tab {
            padding: 12px 20px;
            background: none;
            border: none;
            cursor: pointer;
            color: #999;
            font-size: 1em;
            font-weight: 500;
            transition: all 0.3s ease;
            border-bottom: 3px solid transparent;
            margin-bottom: -2px;
        }

        .role-tab.active {
            color: #667eea;
            border-bottom-color: #667eea;
        }

        .role-content {
            display: none;
        }

        .role-content.active {
            display: block;
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
            <p style="font-size: 0.9em; margin-top: 40px; opacity: 0.8;">Managing clearance for Students, Faculty, and Departments</p>
        </div>
    </div>

    <div class="right">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        <h2>Login</h2>

        <div class="role-tabs">
            <button type="button" class="role-tab active" data-role="user">User/Student</button>
            <button type="button" class="role-tab" data-role="admin">Admin</button>
            <button type="button" class="role-tab" data-role="department">Department</button>
        </div>

        <!-- USER/STUDENT LOGIN -->
        <div class="role-content active" data-role="user">
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <input type="hidden" name="role" value="user">

                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                    @error('email')
                        <small style="color: #dc3545;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password" required>
                    @error('password')
                        <small style="color: #dc3545;">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit">Login</button>

                <div class="form-link">
                    Don't have an account? <a href="{{ route('register') }}">Register here</a>
                </div>
            </form>
        </div>

        <!-- ADMIN LOGIN -->
        <div class="role-content" data-role="admin">
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <input type="hidden" name="role" value="admin">

                <div class="form-group">
                    <label>Admin Email</label>
                    <input type="email" name="email" placeholder="Enter your admin email" value="{{ old('email') }}" required>
                    @error('email')
                        <small style="color: #dc3545;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password" required>
                    @error('password')
                        <small style="color: #dc3545;">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit">Login as Admin</button>
            </form>
        </div>

        <!-- DEPARTMENT LOGIN -->
        <div class="role-content" data-role="department">
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <input type="hidden" name="role" value="department">

                <div class="form-group">
                    <label>Department Email</label>
                    <input type="email" name="email" placeholder="Enter department email" value="{{ old('email') }}" required>
                    @error('email')
                        <small style="color: #dc3545;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter department password" required>
                    @error('password')
                        <small style="color: #dc3545;">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit">Login as Department</button>
                
                <div class="form-link">
                    Contact administrator for department credentials
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.role-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            const role = this.dataset.role;
            
            // Remove active class from all tabs and contents
            document.querySelectorAll('.role-tab').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.role-content').forEach(c => c.classList.remove('active'));
            
            // Add active class to clicked tab and corresponding content
            this.classList.add('active');
            document.querySelector(`.role-content[data-role="${role}"]`).classList.add('active');
        });
    });
</script>

</body>
</html>
