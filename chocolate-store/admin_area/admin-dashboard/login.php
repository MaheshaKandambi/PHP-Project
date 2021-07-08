<?php 
	include('../config/constants.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chocolate | Login - Form</title>
    <link rel="stylesheet" href="./css/login-sigin-style.css">
    <script src="http://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="login">
        <div class="container">
            <form action="" method="POST" class="sign-in-form">
                <img src="images/login-signin-img/person-icon.png" class="person">
                <h2 class="title">Admin Sign in</h2>
                <?php 
                    if(isset($_SESSION['login'])){
                        echo $_SESSION['login']; 
                        unset($_SESSION['login']); 
                    }

                    if(isset($_SESSION['no-login-message'])){
                        echo $_SESSION['no-login-message']; 
                        unset($_SESSION['no-login-message']); 
                    }

                    if(isset($_SESSION['not-found'])){
                        echo $_SESSION['not-found']; 
                        unset($_SESSION['not-found']); 
                    }
                ?>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <input type="submit" name="submit" value="Login" class="btn soild">

                <p class="social-text">Or Sign in with social platforms</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <a href="signup.php" class="linkSingnUp">Don't have an account?</a>
            </form>
            <?php 
                if(isset($_POST['submit'])){
                    $username = $_POST['username'];
                    $password = md5($_POST['password']);

                    $sql = "SELECT * FROM admin_table WHERE username='$username' AND password='$password'";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    $row = mysqli_fetch_assoc($res);
                    $id = $row['admin_id'];

                    if($count==1){
                        $_SESSION['login'] = "<h4 style='color: #fff;  margin-left: 55px;'>Login Successful.</h4>";
                        $_SESSION['user'] = $username;
                        $_SESSION['id'] = $id;

                        header('location:'.SITEURL.'admin_area/admin-dashboard/');
                    } else {
                        $_SESSION['login'] = "<div class='error-text'>Username and Password <br> did not match.</div>";
                        header('location:'.SITEURL.'admin_area/admin-dashboard/login.php');
                    }
                }
            
            ?>
        </div>
    </div>
</body>
<?php 
    ob_end_flush();
?>
</html>