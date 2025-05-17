<!DOCTYPE html>
<html lang="en">

<?php
include_once 'layouts/head.php'; // Includes meta tags, stylesheets, and necessary scripts
?>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="assets/images/soli-lms-logo.png" 
                alt="Soli LMS Logo" 
                class="img-fluid w-25">
        </div>
        <!-- /.login-logo -->

        <div class="card">
            <div class="card-body login-card-body">
                <h4 class="text-center mb-4">Welcome Back!</h4>
                <p class="login-box-msg">Sign in to start your session</p>

                <!-- Sign-in Form -->
                <form action="admin/dashboard.php" method="post">
                    <!-- Email Input -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <input type="email" id="email" name="email" 
                                class="form-control" 
                                placeholder="Enter your email" 
                                required>
                            <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" 
                                class="form-control" 
                                placeholder="Enter your password" 
                                required>
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Remember Me and Submit Button -->
                    <div class="row">
                        <div class="col-8">
                            <div class="form-check">
                                <input type="checkbox" id="remember" name="remember" 
                                    class="form-check-input">
                                <label for="remember" class="form-check-label">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary w-100">Sign In</button>
                        </div>
                    </div>
                </form>

                <!-- Forgot Password Link -->
                <div class="mt-3 text-center">
                    <a href="#" class="text-secondary">Forgot your password?</a>
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>

    <?php
    include_once 'layouts/script-link.php'; // Includes necessary JavaScript files
    ?>
</body>

</html>
