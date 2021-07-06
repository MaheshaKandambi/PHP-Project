<?php include('partials/header.php'); ?>
    <!-- Start Side Bar -->
    <?php include('partials/sidebar.php'); ?>
        <!--  Navbar Ends -->

        <main>
            <div class="page-header">
                <div>
                    <h1>Update Category</h1>
                    <small>Change the existing category details.</small>
                    <?php 
                        if(isset($_SESSION['update'])){
                            echo $_SESSION['update'];
                            unset($_SESSION['update']);
                        }
                        if(isset($_SESSION['upload'])){
                            echo $_SESSION['upload'];
                            unset($_SESSION['upload']);
                        }
                        if(isset($_SESSION['file_remove'])){
                            echo $_SESSION['file_remove'];
                            unset($_SESSION['file_remove']);
                        }
                    ?>
                </div>
            </div>

            <?php 
                if(isset($_GET['id'])){
                    $id = $_GET['id'];

                    $sql = "SELECT * FROM category_table WHERE category_id=$id";

                    $res = mysqli_query($conn,$sql);

                    $count = mysqli_num_rows($res);

                    if($count==1){
                        $row = mysqli_fetch_assoc($res);
                        $category_name = $row['category_name'];
                        $current_image = $row['image_name'];
                    } else {
                        //redirect to admin management with message
                        $_SESSION['no-category-found']= "<div class='Failed-to-do'>Category Not Founded.</div>";
                        header('location:'.SITEURL.'admin_area/admin-dashboard/category.php');
                    }
                } else {
                    header('location:'.SITEURL.'admin_area/admin-dashboard/category.php');
                }
            
            ?>
            <div class="form-body">
                <div class="container">
                <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="input-data">
                                <input type="text" name="category_name" value="<?php echo $category_name; ?>" required>
                                <div class="underline"></div>
                                <label>Category Name</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="input-data image-update">
                                <?php 
                                    if($current_image != ""){
                                        //Display the photo
                                        ?>
                                            <img src="images/category/<?php echo $current_image; ?>" style="width: 50px; height: 50px; border-radius: 50%;">
                                        <?php
                                    } else {
                                       ?>
                                            <img src="<?php echo SITEURL; ?>images/logo.png" style="width: 50px; height: 50px; border-radius: 50%;">
                                       <?php
                                    }
                                ?>
                                <input type="file" name="image">
                            </div>
                        </div>
                        <div class="form-row submit-btn">
                            <div class="input-data">
                                <div class="inner"></div>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                                <input type="submit" name="submit" value="submit">
                            </div>
                        </div>
                    </form>
                    <?php 
                        if(isset($_POST['submit'])){
                            $category_id = $_POST['id'];
                            $category_name = $_POST['category_name'];
                            $current_image=$_POST['current_image'];

                            if(isset($_FILES['image']['name'])){
                                $image_name = $_FILES['image']['name'];

                                if($image_name != ""){
                                    $ext = end(explode('.',$image_name));
                                    $image_name = "Category_Img_".rand(000, 999).'.'.$ext;
                                    $source_path = $_FILES['image']['tmp_name'];
                                    $destination_path = "images/category/".$image_name;
                                    $upload = move_uploaded_file($source_path,$destination_path);

                                    if($upload == false){
                                        $_SESSION['upload'] = "<div class='Failed-to-do'>Failed to Upload Image.</div>";
                                        header('location:'.SITEURL.'admin_area/admin-dashboard/category-update.php');
                                        die();
                                    }

                                    if($current_image != ""){
                                        $remove_path = "images/category/".$current_image;
                                        $remove = unlink($remove_path);

                                        if($remove == false){
                                            $_SESSION['file_remove'] = "<div class='Failed-to-do'>Failed to Remove Image.</div>";
                                            header('location:'.SITEURL.'admin_area/admin-dashboard/category-update.php');
                                            die();
                                        }
                                    } 
                                } else {
                                    $image_name = $current_image;
                                }
                            } else {
                                $image_name = $current_image;  
                            }

                            $sql = "UPDATE category_table SET
                                category_name='$category_name',
                                image_name='$image_name'
                                WHERE category_id=$category_id
                            ";

                            $res =mysqli_query($conn,$sql);

                            if($res == true){
                                    $_SESSION['update'] = "<div class='successfuly-done'>Category Update Successfully.</div>";
                                    header('location:'.SITEURL.'admin_area/admin-dashboard/category.php');
                            } else {
                                    $_SESSION['update'] = "<div class='Failed-to-do'>Failed to Upadate Category.</div>";
                                    header('location:'.SITEURL.'admin_area/admin-dashboard/category-update.php');
                            }
                        }
                    
                    ?>
                </div>
            </div>

        </main>

    </section>

    <?php include('partials/footer.php'); ?>