<?php 
    include('../config/constants.php');

    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $sql = "DELETE FROM user_table WHERE user_id=$id";

        $res = mysqli_query($conn,$sql);

        if($res == true){
            $_SESSION['delete'] = "<div class='successfuly-done'>User Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin_area/admin-dashboard/user.php');
        } else {
            $_SESSION['delete'] = "<div class='Failed-to-do'>Failed to Delete User.</div>";
            header('location:'.SITEURL.'admin_area/admin-dashboard/user.php');
        }

    } else {
        header('location:'.SITEURL.'admin_area/admin-dashboard/user.php');
    }

?>