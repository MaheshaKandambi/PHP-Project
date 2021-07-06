<?php 
    include('../config/constants.php');

    session_destroy(); 

    header('location:'.SITEURL.'admin_area/admin-dashboard/login.php');
?>