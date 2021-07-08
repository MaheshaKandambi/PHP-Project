<?php 
    include('../config/constants.php'); 

    if(isset($_GET['id']) AND isset($_GET['image_name'])){
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != ''){
            $path = 'images/item/'.$image_name;

            $remove = unlink($path);

            if($remove==false){
                $_SESSION['remove'] = "<div class='Failed-to-do'>Failed to Remove Item Image.</div>";
                header('location:'.SITEURL.'admin_area/admin-dashboard/item.php');
                die();
            }
        }

        $sql = "DELETE FROM item_table WHERE item_id=$id";

        $res = mysqli_query($conn,$sql);

        if($res==true){
            $_SESSION['delete'] = "<div class='successfuly-done'>Successfully Deleted Item.</div>";
            header('location:'.SITEURL.'admin_area/admin-dashboard/item.php');
        } else {
            $_SESSION['delete'] = "<div class='Failed-to-do'>Failed to Delete Item.</div>";
            header('location:'.SITEURL.'admin_area/admin-dashboard/item.php');
        }
    } else {
        header('location:'.SITEURL.'admin_area/admin-dashboard/item.php');
    }
?>