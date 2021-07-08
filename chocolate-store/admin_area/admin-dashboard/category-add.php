<?php include('partials/header.php'); ?>
    <!-- Start Side Bar -->
    <?php include('partials/sidebar.php'); ?>
        <!--  Navbar Ends -->

        <main>
            <div class="page-header">
                <div>
                    <h1>Add New Category</h1>
                    <small>Fill new category details.</small>
                    <?php 
                        if(isset($_SESSION['add-category'])){
                            echo $_SESSION['add-category'];
                            unset($_SESSION['add-category']);
                        }
                        if(isset($_SESSION['upload'])){
                            echo $_SESSION['upload'];
                            unset($_SESSION['upload']);
                        }
                    ?>
                </div>
            </div>

            <div class="form-body">
                <div class="container">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="input-data">
                                <input type="text" name="category_name" required>
                                <div class="underline"></div>
                                <label>Category Name</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="input-data">
                                <input type="file" name="image" required>
                            </div>
                        </div>
                        <div class="form-row submit-btn">
                            <div class="input-data">
                                <div class="inner"></div>
                                <input type="submit" name="submit" value="submit">
                            </div>
                        </div>
                    </form>

                    <?php 
                        if(isset($_POST['submit'])){
                            $category_name = $_POST['category_name'];

                            if(isset($_FILES['image']['name'])){
                                $image_name = $_FILES['image']['name'];

                                if($image_name != ""){
                                    $ext = end(explode('.',$image_name));
                                    $image_name = "Category_Img_".rand(000,999).'.'.$ext;
                                    $source_path = $_FILES['image']['tmp_name'];
                                    $destination_path = "images/category/".$image_name;
                                    $upload = move_uploaded_file($source_path,$destination_path);

                                    if($upload==false){
                                        $_SESSION['upload'] = "<div class='Failed-to-do'>Failed to Upload File.</div>";
                                        header('location:'.SITEURL.'admin_area/admin-dashboard/category-add.php');
                                        die();
                                    }
                                }

                            } else {
                                $image_name = "";
                            }

                            $sql = "INSERT INTO category_table SET 
                                category_name='$category_name',
                                image_name='$image_name'
                            ";

                            $res = mysqli_query($conn,$sql);

                            if($res==true){
                                $_SESSION['add-category'] = "<div class='successfuly-done'>Category Added Successfully.</div>";
                                header('location:'.SITEURL.'admin_area/admin-dashboard/category.php');
                            } else {
                                $_SESSION['add-category'] = "<div class='Failed-to-do'>Failed to Add Category.</div>";
                                header('location:'.SITEURL.'admin_area/admin-dashboard/category-add.php');
                            }

                        }
                    ?>
                </div>
            </div>

        </main>

    </section>

    <?php include('partials/footer.php'); ?>