<?php 
    include('../config/constants.php'); 

    if(isset($_GET['id']) AND isset($_GET['image_name'])){
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != ''){
            $path = 'images/admin/'.$image_name;

            $remove = unlink($path);

            if($remove==false){
                $_SESSION['remove'] = "<div class='Failed-to-do'>Failed to Remove Category Image.</div>";
                header('location:'.SITEURL.'admin_area/admin-dashboard/index.php');
                die();
            }
        }

        $sql = "DELETE FROM admin_table WHERE admin_id=$id";

        $res = mysqli_query($conn,$sql);

        if($res==true){
            $_SESSION['delete'] = "<div class='successfuly-done'>Successfully Deleted Admin.</div>";
            header('location:'.SITEURL.'admin_area/admin-dashboard/index.php');
        } else {
            $_SESSION['delete'] = "<div class='Failed-to-do'>Failed to Delete Admin.</div>";
            header('location:'.SITEURL.'admin_area/admin-dashboard/index.php');
        }
    } else {
        header('location:'.SITEURL.'admin_area/admin-dashboard/index.php');
    }
?>