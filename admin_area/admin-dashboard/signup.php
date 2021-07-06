<?php 
	include('../config/constants.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chocolate | Signup - Form</title>
    <link rel="stylesheet" href="./css/login-sigin-style.css">
    <script src="http://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="signup">
        <div class="signupcontainer">
            <form action="" method="POST" enctype="multipart/form-data" class="sign-in-form">
                <img src="images/login-signin-img/person-icon.png" class="person">
                <h2 class="signuptitle">Admin Sign up</h2>
                <?php 
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                ?>
                <div class="signupinput-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="signupinput-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="signupinput-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <input type="submit" name="submit" value="Sign up" class="signupbtn soild">

                <p class="signupsocial-text">Or Sign up with social platforms</p>
                <div class="signupsocial-media">
                    <a href="#" class="signupsocial-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="signupsocial-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="signupsocial-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="signupsocial-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </form>
            <?php 
                if(isset($_POST['submit'])){
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = md5($_POST['password']);

                    $sql = "INSERT INTO admin_table SET
                        username = '$username',
                        email = '$email',
                        password = '$password',
                        image_name = ''
                    ";

                    $res = mysqli_query($conn, $sql) or die(mysqli_error());

                    if($res==true){
                        $_SESSION['add'] = "<h4 style='color: #fff;  margin-left: 55px;'>Signup Successfully.</h4>";
                        header("location:".SITEURL.'admin_area/admin-dashboard/index.php');
                    } else {
                        $_SESSION['add'] = "<div class='error-text'>Failed to Added Admin.</div>";
                        header("location:".SITEURL.'admin_area/admin-dashboard/signup.php');
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