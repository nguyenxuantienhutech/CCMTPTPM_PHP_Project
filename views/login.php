<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login & Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../assets/css/new.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-QSvSjCEXGpGsE0z1tPY4w4i01P8BV/zCn+1NllCYv6aokjfW8bZAGaM2Vi2QQT36hYJG8AMjgzUdtG+3IRvZZA==" crossorigin="anonymous" />
</head>

<body>
    <div class="back-btn">
        <a href="home.php">BACK</a>
    </div>
    <div class="cont">
        <form action="../controllers/AuthController.php" method="post">
            <?php
            if (isset($_GET['error'])) {
                $error = $_GET['error'];
                if ($error === 'empty_login') {
                    echo '<script>alert("Thông tin đăng nhập trống!");</script>';
                }
            }
            ?>
            <div class="form sign-in">
                <h2>Sign In</h2>
                <label>
                    <span>Email Address</span>
                    <label for="">
                        <input type="email" name="email" required>
                    </label>
                </label>
                <label>
                    <span>Password</span>
                    <label for="">
                        <input type="password" name="password" required>
                    </label>
                </label>
                <button name="btn-login" class="submit" type="submit">Sign In</button>
        </form>
        <p class="forgot-pass">Forgot Password ?</p>

        <div class="social-media">
            <ul>
                <li><img src="../assets/img/facebook.png"></li>
                <li><img src="../assets/img/twitter.png"></li>
                <li><img src="../assets/img/linkedin.png"></li>
                <li><img src="../assets/img/instagram.png"></li>
            </ul>
        </div>
    </div>
    <div class="sub-cont">
        <div class="img">
            <div class="img-text m-up">
                <h2>New here?</h2>
                <p>Sign up and discover great amount of new opportunities!</p>
            </div>
            <div class="img-text m-in">
                <h2>One of us?</h2>
                <p>If you already has an account, just sign in. We've missed you!</p>
            </div>
            <div class="img-btn">
                <span class="m-up">Sign Up</span>
                <span class="m-in">Sign In</span>
            </div>
        </div>
        <form action="../controllers/AuthController.php" method="post">
            <div class="form sign-up">
                <h2>Sign Up</h2>
                <label>
                    <span>Name</span>
                    <input name="fullName" type="text" required>
                </label>
                <label>
                    <span>Email</span>
                    <input name="email" type="email" required>
                </label>
                <label>
                    <span>Password</span>
                    <input name="password" type="password" required>
                </label>
                <label>
                    <span>Confirm Password</span>
                    <input name="confirmPassword" type="password" required>
                </label>
                <button name="btn-register" type="submit" class="submit">Sign Up Now</button>
            </div>
        </form>
    </div>
    </div>
    <script type="text/javascript" src="../assets/js/login.js"></script>
</body>

</html>