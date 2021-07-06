<?php include('partials/header.php'); ?>
    <!-- Start Side Bar -->
    <?php include('partials/sidebar.php'); ?>
        <!--  Navbar Ends -->

        <main>
            <div class="page-header">
                <div>
                    <h1>Profile Update</h1>
                    <small>Fill with your new details.</small>
                </div>
            </div>

            <?php 
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM admin_table WHERE admin_id=$id";
                    $res= mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                    if($count==1){
                        $row = mysqli_fetch_assoc($res);
                        $username= $row['username'];
                        $email= $row['email'];
                        $current_image = $row['image_name'];
                    } else {
                        //redirect to admin management with message
                        $_SESSION['no-admin-found']= "<div class='Failed-to-do'>You are Not Founded.</div>";
                        header('location:'.SITEURL.'admin_area/admin-dashboard/profile.php');
                    }
                } else {
                    header('location:'.SITEURL.'admin_area/admin-dashboard/profile.php');
                }

            ?>
            <div class="form-body">
                <div class="container">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="input-data">
                                <input type="text" name="username" value="<?php echo $username; ?>" required>
                                <div class="underline"></div>
                                <label>User Name</label>
                            </div>
                            <div class="input-data">
                                <input type="email" name="email" value="<?php echo $email; ?>" required>
                                <div class="underline"></div>
                                <label>Email Address</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="input-data image-update">
                                <?php 
                                    if($current_image != ""){
                                        ?>
                                            <img src="images/admin/<?php echo $current_image; ?>" style="width: 50px; height: 50px; border-radius: 50%;">
                                        <?php
                                    } else {
                                       ?>
                                            <img src="images/person-icon1.png" style="width: 50px; height: 50px; border-radius: 50%;">
                                       <?php
                                    }
                                ?>
                                <input type="file" name="image" required>
                            </div>
                        </div>
                        <div class="form-row submit-btn">
                            <div class="input-data">
                                <div class="inner"></div>
                                <input type="hidden" name="id" value="<?php echo $id ; ?>">
                                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                                <input type="submit" name="submit" value="submit">
                            </div>
                        </div>
                    </form>
                    <?php 
                        if(isset($_POST['submit'])){
                        $id = $_POST['id'];
                        $username= $_POST['username'];
                        $email= $_POST['email'];
                        $current_image=$_POST['current_image'];

                        if(isset($_FILES['image']['name'])){
                            $image_name = $_FILES['image']['name'];

                            if($image_name != ""){
                                $ext = end(explode('.',$image_name));
                                $image_name = "Admin_Img_".rand(000, 999).'.'.$ext;
                                $source_path = $_FILES['image']['tmp_name'];
                                $destination_path = "images/admin/".$image_name;
                                $upload = move_uploaded_file($source_path,$destination_path);
                                if($upload==false){
                                    $_SESSION['upload'] = "<div class='Failed-to-do'>Failed to Upload Image.</div>";
                                    header('location:'.SITEURL.'admin_area/admin-dashboard/profile.php');
                                    die();
                                }

                                if($current_image != ""){
                                    $remove_path="images/admin/".$current_image;

                                    $remove = unlink($remove_path);

                                    if($remove==false){
                                        $_SESSION['file-remove'] = "<div class='Failed-to-do'>Failed to Remove Current Image.</div>";
                                        header('location:'.SITEURL.'admin_area/admin-dashboard/profile.php');
                                        die();
                                    }
                                }
                            } else {
                                $image_name= $current_image;
                            }
                        } else {
                            $image_name = $current_image;
                        }

                        $sql = "UPDATE admin_table SET 
                                username='$username',
                                email='$email',
                                image_name='$image_name'
                                WHERE admin_id=$id
                        ";
                        $res = mysqli_query($conn,$sql);

                        if($res==true){
                                $_SESSION['update'] = "<div class='successfuly-done'>Profile Updated Successfully.</div>";
                                header('location:'.SITEURL.'admin_area/admin-dashboard/profile.php');
                        } else {
                                $_SESSION['update'] = "<div class='Failed-to-do'>Failed to Update Profile.</div>";
                                header('location:'.SITEURL.'admin_area/admin-dashboard/profile.php');
                        }
                    } 
                    ?>
                </div>
            </div>

        </main>

    </section>

    <?php include('partials/footer.php'); ?>