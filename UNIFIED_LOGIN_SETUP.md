# Unified Login System - Implementation Guide

## Overview
This unified login system allows three different user types to authenticate:
- **Users/Students**: Register new accounts and login
- **Admins**: Login with pre-configured credentials
- **Departments**: Login with static department accounts

## What Has Been Created/Updated

### 1. **New Models**
- `App\Models\Department` - Department authentication model
- `App\Models\Admin` - Admin authentication model

### 2. **Updated Models**
- `App\Models\User` - Added `username` and `user_type` fields

### 3. **New Migrations**
- `2026_04_21_000000_add_password_to_department.php` - Adds password field to departments
- `2026_04_21_000001_add_password_to_admins.php` - Adds password field to admins
- `2026_04_21_000002_update_users_table.php` - Adds username and user_type to users

### 4. **New Controllers**
- `RegisterController` - Handles user registration
- Updated `LoginController` - Now handles all three login types

### 5. **Updated Views**
- `resources/views/auth/login.blade.php` - Unified login with tabs for different roles
- `resources/views/auth/register.blade.php` - User registration page

### 6. **New Seeder**
- `DepartmentAdminSeeder` - Creates demo departments and admins

### 7. **Updated Routes**
- Added registration routes (`/register`)
- Updated login routes to handle multiple roles

---

## Installation Steps

### Step 1: Run Migrations
```bash
php artisan migrate
```

This will create/update the necessary database tables with the password fields.

### Step 2: Seed Demo Data (Optional)
To create sample departments and admins:
```bash
php artisan db:seed --class=DepartmentAdminSeeder
```

**Demo Credentials Created:**

**Departments:**
- Email: `cs@benedicto.edu` | Password: `cs_dept_2026`
- Email: `eng@benedicto.edu` | Password: `eng_dept_2026`
- Email: `business@benedicto.edu` | Password: `business_dept_2026`

**Admins:**
- Email: `john.smith@benedicto.edu` | Password: `admin_2026`
- Email: `maria.garcia@benedicto.edu` | Password: `admin_2026`
- Email: `robert.johnson@benedicto.edu` | Password: `admin_2026`

### Step 3: Verify Routes
Your auth routes should now be:
- `GET /login` - Shows unified login page
- `POST /login` - Processes login for all three roles
- `GET /register` - Shows user registration page
- `POST /register` - Processes user registration
- `POST /logout` - Logs out users

---

## Login Flow

### User/Student Login
1. Visit `/login`
2. Click "User/Student" tab (default)
3. Enter email and password
4. Redirected to `/dashboard` (update this route as needed)

### Admin Login
1. Visit `/login`
2. Click "Admin" tab
3. Enter admin email and password
4. Redirected to `/admin/dashboard`

### Department Login
1. Visit `/login`
2. Click "Department" tab
3. Enter department email and password
4. Redirected to `/department/dashboard` (create this route as needed)

---

## Session Variables After Login

### User Session Variables
```php
Auth::check() // Laravel's built-in user authentication
session('user_role') // 'user'
session('user_type') // 'student' or 'faculty'
```

### Admin Session Variables
```php
session('admin_logged_in') // true
session('admin_id') // admin ID
session('admin_name') // admin name
session('admin_department_id') // department ID
session('user_role') // 'admin'
```

### Department Session Variables
```php
session('department_logged_in') // true
session('department_id') // department ID
session('department_name') // department name
session('user_role') // 'department'
```

---

## Important Routes to Create

### You need to create these routes/controllers:

1. **User Dashboard**
   ```
   GET /dashboard - User's personal clearance dashboard
   ```

2. **Department Dashboard**
   ```
   GET /department/dashboard - Department clearance management
   ```

3. **Middleware** (if needed)
   Create middleware for route protection:
   - `auth:web` for users
   - `admin.auth` for admins (already used in routes)
   - `department.auth` for departments

---

## Testing the System

### 1. Test User Registration
- Go to `/register`
- Fill in name, email, user type, and password
- Should redirect to login with success message

### 2. Test User Login
- Go to `/login`
- Click "User/Student" tab
- Use registered credentials
- Check session variables

### 3. Test Admin Login
- Go to `/login`
- Click "Admin" tab
- Use `john.smith@benedicto.edu` / `admin_2026`
- Should redirect to `/admin/dashboard`

### 4. Test Department Login
- Go to `/login`
- Click "Department" tab
- Use `cs@benedicto.edu` / `cs_dept_2026`
- Should have session variables set

### 5. Test Logout
- Click logout (you need to add logout button to layouts)
- Should flush sessions and redirect to login

---

## Creating a Logout Button

Add this to your main layout:
```html
@if(auth()->check())
    <!-- User is logged in -->
    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
        @csrf
        <button type="submit">Logout</button>
    </form>
@elseif(session('admin_logged_in') || session('department_logged_in'))
    <!-- Admin or Department is logged in -->
    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endif
```

---

## Adding Dashboard Routes (Example)

Update your `routes/web.php`:

```php
// User routes (protected by auth middleware)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])
        ->name('dashboard');
});

// Department routes
Route::middleware('department.auth')->group(function () {
    Route::get('/department/dashboard', [DepartmentController::class, 'dashboard'])
        ->name('department.dashboard');
});
```

---

## Security Notes

1. **Password Hashing**: All passwords are hashed using Laravel's `Hash::make()`
2. **Validation**: All inputs are validated server-side
3. **CSRF Protection**: All forms include `@csrf` token
4. **Session Security**: Sessions are properly managed and flushed on logout

---

## Customization

### Modify Department/Admin Credentials
To add more departments or admins:
```php
Department::create([
    'department_name' => 'New Department',
    'department_email' => 'new@benedicto.edu',
    'department_password' => Hash::make('password123'),
]);
```

### Change Redirects
Modify these in `LoginController`:
- Line 59: User redirect (currently `/dashboard`)
- Line 70: Admin redirect (currently `/admin/dashboard`)
- Line 82: Department redirect (currently `/department/dashboard`)

### Customize Login Appearance
Edit `resources/views/auth/login.blade.php` - The styling is inline with CSS

---

## Troubleshooting

### "Route not found" errors
- Make sure you've added the necessary dashboard routes
- Check that the route names match what's in the controller

### "Column not found" errors
- Run `php artisan migrate`
- Clear cache: `php artisan cache:clear`

### Login not working
- Check if `php artisan migrate` was run
- Verify credentials in the database
- Check `storage/logs/laravel.log` for errors

### Sessions not persisting
- Ensure `SESSION_DRIVER=file` in `.env`
- Check that `storage/framework/sessions` is writable
- Run `php artisan cache:clear`

---

## Next Steps

1. Create the required dashboard routes and controllers
2. Add middleware for route protection
3. Customize the login/register views if needed
4. Test all three login flows
5. Create role-specific dashboards
6. Add logout button to layouts
