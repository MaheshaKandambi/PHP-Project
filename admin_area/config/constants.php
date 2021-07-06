<?php 
    //Start the session
    session_start();

    ob_start();

    //Create Constants to Store Non Repeating Values
    define('SITEURL','http://localhost/chocolate-store/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME', 'chocholate_db');

    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error()); // Database connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Selecting Database


?>