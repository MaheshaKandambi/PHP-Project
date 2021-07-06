<?php include('partials/header.php'); ?>
    <!-- Start Side Bar -->
    <?php include('partials/sidebar.php'); ?>
        <!--  Navbar Ends -->

        <main>
            <div class="page-header">
                <div>
                    <h1>Add New Item</h1>
                    <small>Fill new item details.</small>
                    <?php 
                        if(isset($_SESSION['add-item'])){
                            echo $_SESSION['add-item'];
                            unset($_SESSION['add-item']);
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
                                <input type="text" name="item_name" required>
                                <div class="underline"></div>
                                <label>Item Name</label>
                            </div>
                            <div class="input-data">
                                <input type="number" name="price" required>
                                <div class="underline"></div>
                                <label>Price</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="input-data">
                                <input type="file" name="image" required>
                            </div>
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
                                                    <option value="<?php echo $category_id; ?>"><?php echo $category_name; ?></option>
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
                            <div class="input-data textarea">
                                <textarea cols="30" rows="10" name="description" required></textarea>
                                <div class="underline"></div>
                                <label>Description</label>
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
                            $item_name = $_POST['item_name'];
                            $price = $_POST['price'];
                            $category = $_POST['category'];
                            $description = $_POST['description'];

                            if(isset($_FILES['image']['name'])){
                                $image_name = $_FILES['image']['name'];

                                if($image_name != ""){
                                    $ext = end(explode('.',$image_name));
                                    $image_name = "Item_Img_".rand(000,999).'.'.$ext;
                                    $source_path = $_FILES['image']['tmp_name'];
                                    $destination_path = "images/item/".$image_name;
                                    $upload = move_uploaded_file($source_path,$destination_path);

                                    if($upload==false){
                                        $_SESSION['upload'] = "<div class='Failed-to-do'>Failed to Upload File.</div>";
                                        header('location:'.SITEURL.'admin_area/admin-dashboard/item-add.php');
                                        die();
                                    }
                                }

                            } else {
                                $image_name = "";
                            }

                            $sql = "INSERT INTO item_table SET 
                                item_name='$item_name',
                                price='$price',
                                category_id='$category',
                                description='$description',
                                image_name='$image_name'
                            ";

                            $res = mysqli_query($conn,$sql);

                            if($res==true){
                                $_SESSION['add-item'] = "<div class='successfuly-done'>Item Added Successfully.</div>";
                                header('location:'.SITEURL.'admin_area/admin-dashboard/item.php');
                            } else {
                                $_SESSION['add-item'] = "<div class='Failed-to-do'>Failed to Add Item.</div>";
                                header('location:'.SITEURL.'admin_area/admin-dashboard/item-add.php');
                            }

                        }
                    ?>
                </div>
            </div>

        </main>

    </section>

    <?php include('partials/footer.php'); ?>