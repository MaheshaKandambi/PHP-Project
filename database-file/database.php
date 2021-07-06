<?php 

//Create Constants to Store Non Repeating Values
define('SITEURL','http://localhost/thimira/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');

$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error()); // Database connection

$sql = "CREATE DATABASE chocolate_db";

$res = mysqli_query($conn, $sql) or die(mysqli_error());

if($res == true) {
    echo "<h3>Successfuly chocholate_db created!<br></h3>";
} else {
    echo "<h3>Error on chocholate_db creating!<br></h3>";
}

$db_select = mysqli_select_db($conn, "chocolate_db") or die(mysqli_error()); //Selecting Database

//Admin Table
$sql1 = "CREATE TABLE admin_table(
    admin_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(150) NOT NULL,
    image_name VARCHAR(255) NOT NULL
)";

$res1 = mysqli_query($conn, $sql1) or die(mysqli_error());

if($res1 == true) {
    echo "<h3>Successfuly admin_table created!<br></h3>";
} else {
    echo "<h3>Error on creating admin_table.<br></h3> ";
}

//User Table
$sql2 = "CREATE TABLE user_table(
    user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(80) NOT NULL,
    last_name VARCHAR(80) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    address VARCHAR(255) NOT NULL,
    contact_number INT(10) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

$res2 = mysqli_query($conn, $sql2) or die(mysqli_error());

if($res2 == true) {
    echo "<h3>Successfuly user_table created!<br></h3>";
} else {
    echo "<h3>Error on creating user_table.<br></h3> ";
}

//Category Table
$sql3 = "CREATE TABLE category_table(
    category_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(255) NOT NULL,
    image_name VARCHAR(255) NOT NULL 
)";

$res3 = mysqli_query($conn, $sql3) or die(mysqli_error());

if($res3 == true) {
    echo "<h3>Successfuly category_table created!<br></h3>";
} else {
    echo "<h3>Error on creating category_table.<br></h3> ";
}

//Item Table
$sql4 = "CREATE TABLE item_table(
    item_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    item_name VARCHAR(150) NOT NULL,
    image_name VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    category_id INT NOT NULL
)";

$res4 = mysqli_query($conn, $sql4) or die(mysqli_error());

if($res4 == true) {
    echo "<h3>Successfuly item_table created!<br></h3>";
} else {
    echo "<h3>Error on creating item_table.<br></h3> ";
}

//Order Table
$sql5 = "CREATE TABLE order_table(
    order_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    item_id INT NOT NULL,
    qty INT NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    order_date DATE NOT NULL,
    user_id INT NOT NULL,
    status VARCHAR(100) NOT NULL 
)";

$res5 = mysqli_query($conn, $sql5) or die(mysqli_error());

if($res5 == true) {
    echo "<h3>Successfuly order_table created!<br></h3>";
} else {
    echo "<h3>Error on creating order_table.<br></h3> ";
}

?>