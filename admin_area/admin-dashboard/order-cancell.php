<?php 
    include('../config/constants.php'); 

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "UPDATE order_table SET status='Cancelled' WHERE order_id=$id";

        $res = mysqli_query($conn,$sql);

        if($res==true){
            $_SESSION['cancell'] = "<div class='successfuly-done'>Successfully Cancell Order.</div>";
            header('location:'.SITEURL.'admin_area/admin-dashboard/order.php');
        } else {
            $_SESSION['cancell'] = "<div class='Failed-to-do'>Failed to Cancell Order.</div>";
            header('location:'.SITEURL.'admin_area/admin-dashboard/order.php');
        }
    } else {
        header('location:'.SITEURL.'admin_area/admin-dashboard/order.php');
    }
?>