<?php 
    include('../config/constants.php'); 

    if(isset($_GET['id']) AND isset($_GET['image_name'])){
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != ''){
            $path = 'images/category/'.$image_name;

            $remove = unlink($path);

            if($remove==false){
                $_SESSION['remove'] = "<div class='Failed-to-do'>Failed to Remove Category Image.</div>";
                header('location:'.SITEURL.'admin_area/admin-dashboard/category.php');
                die();
            }
        }

        $sql = "DELETE FROM category_table WHERE category_id=$id";

        $res = mysqli_query($conn,$sql);

        if($res==true){
            $_SESSION['delete'] = "<div class='successfuly-done'>Successfully Deleted Category.</div>";
            header('location:'.SITEURL.'admin_area/admin-dashboard/category.php');
        } else {
            $_SESSION['delete'] = "<div class='Failed-to-do'>Failed to Delete Category.</div>";
            header('location:'.SITEURL.'admin_area/admin-dashboard/category.php');
        }
    } else {
        header('location:'.SITEURL.'admin_area/admin-dashboard/category.php');
    }
?>