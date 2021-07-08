<?php 
    include('../config/constants.php'); 

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "UPDATE order_table SET status='Delivered' WHERE order_id=$id";

        $res = mysqli_query($conn,$sql);

        if($res==true){
            $_SESSION['delivered'] = "<div class='successfuly-done'>Successfully Delivered The Order.</div>";
            header('location:'.SITEURL.'admin_area/admin-dashboard/order.php');
        } else {
            $_SESSION['delivered'] = "<div class='Failed-to-do'>Failed to Delivered Order.</div>";
            header('location:'.SITEURL.'admin_area/admin-dashboard/order.php');
        }
    } else {
        header('location:'.SITEURL.'admin_area/admin-dashboard/order.php');
    }
?>