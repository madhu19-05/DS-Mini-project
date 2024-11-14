<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - X Core Gaming Store</title>
    
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- Custom CSS (Optional) -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            margin-top: 100px;
        }
        .login-card {
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .input__item {
            position: relative;
            margin-bottom: 20px;
        }
        .input__item input {
            width: 100%;
            padding: 10px 15px;
            padding-left: 40px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
        .input__item .fas {
            position: absolute;
            left: 10px;
            top: 12px;
            color: #6c757d;
        }
        .site-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            width: 100%;
        }
        .site-btn:hover {
            background-color: #0056b3;
        }
        .login__form h3 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
        }
        .forget_pass {
            display: block;
            text-align: center;
            margin-top: 15px;
        }
        .forget_pass a {
            color: #007bff;
            text-decoration: none;
        }
        .forget_pass a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Login Form Section -->
    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="login-card bg-white">
                    <div class="login__form">
                        <h3>Login</h3>
                        <form method="POST" action="in.php">
                            <div class="input__item">
                                <i class="fas fa-envelope"></i>
                                <input type="text" name="email" placeholder="Email address" required>
                            </div>
                            <div class="input__item">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" placeholder="Password" required>
                            </div>
                            <input type="submit" class="site-btn" value="Login" name="login">
                        </form>
                        <div class="forget_pass">
                            <a href="#">Forgot Your Password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "project");

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Query to check if the user exists in the database
        $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
        $data = mysqli_fetch_array($query);

        if ($data) {
            // If credentials match, start a session and store user info
            session_start();
            $_SESSION['email'] = $data['email'];
            $_SESSION['username'] = $data['fname'];

            // Redirect to index.php
            echo "<script>window.location.href='in.php'</script>";
        } else {
            // If credentials do not match, show an error
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }
    ?>

    <!-- Bootstrap JS, Popper.js, and jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
