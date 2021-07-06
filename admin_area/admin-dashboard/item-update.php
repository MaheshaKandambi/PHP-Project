<?php include('partials/header.php'); ?>
    <!-- Start Side Bar -->
    <?php include('partials/sidebar.php'); ?>
        <!--  Navbar Ends -->

        <main>
            <div class="page-header">
                <div>
                    <h1>Update Item Details</h1>
                    <small>Fill with new item details.</small>
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

                    $sql = "SELECT * FROM item_table WHERE item_id=$id";

                    $res = mysqli_query($conn,$sql);

                    $count = mysqli_num_rows($res);

                    if($count==1){
                        $row = mysqli_fetch_assoc($res);
                        $item_name = $row['item_name'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $currnt_category_id = $row['category_id'];
                        $current_image = $row['image_name'];
                    } else {
                        //redirect to admin management with message
                        $_SESSION['no-item-found']= "<div class='Failed-to-do'>Item Not Founded.</div>";
                        header('location:'.SITEURL.'admin_area/admin-dashboard/item.php');
                    }
                } else {
                    header('location:'.SITEURL.'admin_area/admin-dashboard/item.php');
                }
            
            ?>

            <div class="form-body">
                <div class="container">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="input-data">
                                <input type="text" name="item_name" value="<?php echo $item_name; ?>" required>
                                <div class="underline"></div>
                                <label>Item Name</label>
                            </div>
                            <div class="input-data">
                                <input type="number" name="price" value="<?php echo $price; ?>" required>
                                <div class="underline"></div>
                                <label>Price</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="input-data textarea">
                                <textarea cols="30" rows="10" name="description" required><?php echo $description; ?></textarea>
                                <div class="underline"></div>
                                <label>Description</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="input-data">
                                <select name="category">
                                    <?php 
                                        $sql = "SELECT * FROM category_table";
                                        $res = mysqli_query($conn,$sql);
                                        $count = mysqli_num_rows($res);
                                        if($count>0){
                                            while($row=mysqli_fetch_assoc($res)){
                                                $category_id = $row['category_id'];
                                                $category_name = $row['category_name'];
                                                ?>
                                                    <option <?php if($currnt_category_id == $category_id) echo "selected"; ?> value="<?php echo $category_id; ?>"><?php echo $category_name; ?></option>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                                <option value="0">No Category Found</option>
                                            <?php
                                        }
                                    ?>
                                </select>
                                <div class="underline-before"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="input-data image-update">
                                <?php 
                                    if($current_image != ""){
                                        //Display the photo
                                        ?>
                                            <img src="images/item/<?php echo $current_image; ?>" style="width: 50px; height: 50px; border-radius: 50%;">
                                        <?php
                                    } else {
                                       ?>
                                            <img src="<?php echo SITEURL; ?>images/logo.png" style="width: 50px; height: 50px; border-radius: 50%;">
                                       <?php
                                    }
                                ?>
                                <input type="file" name="image" required>
                            </div>
                        </diV>
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
                            $item_name = $_POST['item_name'];
                            $price = $_POST['price'];
                            $category = $_POST['category'];
                            $description = $_POST['description'];
                            $current_image = $_POST['current_image'];
                            $item_id = $_POST['id'];

                            if(isset($_FILES['image']['name'])){
                                $image_name = $_FILES['image']['name'];

                                if($image_name != ""){
                                    $ext = end(explode('.',$image_name));
                                    $image_name = "Item_Img_".rand(000, 999).'.'.$ext;
                                    $source_path = $_FILES['image']['tmp_name'];
                                    $destination_path = "images/item/".$image_name;
                                    $upload = move_uploaded_file($source_path,$destination_path);

                                    if($upload == false){
                                        $_SESSION['upload'] = "<div class='Failed-to-do'>Failed to Upload Image.</div>";
                                        header('location:'.SITEURL.'admin_area/admin-dashboard/item-update.php');
                                        die();
                                    }

                                    if($current_image != ""){
                                        $remove_path = "images/item/".$current_image;
                                        $remove = unlink($remove_path);

                                        if($remove == false){
                                            $_SESSION['file_remove'] = "<div class='Failed-to-do'>Failed to Remove Image.</div>";
                                            header('location:'.SITEURL.'admin_area/admin-dashboard/item-update.php');
                                            die();
                                        }
                                    } 
                                } else {
                                    $image_name = $current_image;
                                }
                            } else {
                                $image_name = $current_image;  
                            }

                            $sql = "UPDATE item_table SET
                                item_name='$item_name',
                                price='$price',
                                category_id='$category',
                                description='$description',
                                image_name='$image_name'
                                WHERE item_id=$item_id
                            ";

                            $res =mysqli_query($conn,$sql);

                            if($res == true){
                                    $_SESSION['update'] = "<div class='successfuly-done'>Item Update Successfully.</div>";
                                    header('location:'.SITEURL.'admin_area/admin-dashboard/item.php');
                            } else {
                                    $_SESSION['update'] = "<div class='Failed-to-do'>Failed to Upadate Item.</div>";
                                    header('location:'.SITEURL.'admin_area/admin-dashboard/item-update.php');
                            }
                        }
                    ?>
                </div>
            </div>

        </main>

    </section>

    <?php include('partials/footer.php'); ?>