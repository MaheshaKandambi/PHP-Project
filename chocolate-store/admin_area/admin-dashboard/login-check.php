<?php 
    if(!isset($_SESSION['user'])){ 
        
        $_SESSION['no-login-message'] = "<div class='error-text'>Please login to access <br> Admin Panel.</div>";
        
        header('location:'.SITEURL.'admin_area/admin-dashboard/login.php');
    }
?>