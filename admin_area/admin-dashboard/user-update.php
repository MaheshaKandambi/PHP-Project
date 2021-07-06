<?php include('partials/header.php'); ?>
    <!-- Start Side Bar -->
    <?php include('partials/sidebar.php'); ?>
        <!--  Navbar Ends -->

        <main>
            <div class="page-header">
                <div>
                    <h1>Update User</h1>
                    <small>Change the existing user details.</small>
                    <?php 
                        if(isset($_SESSION['update'])){
                            echo $_SESSION['update'];
                            unset($_SESSION['update']);
                        }
                    ?>
                </div>
            </div>
            <?php 
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM user_table WHERE user_id=$id";
                    $res= mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                    if($count==1){
                        $row = mysqli_fetch_assoc($res);
                        $first_name=$row['first_name'];
                        $last_name=$row['last_name'];
                        $email= $row['email'];
                        $address= $row['address'];
                        $contact_number= $row['contact_number'];
                    } else {
                        $_SESSION['no-user-found']= "<div class='Failed-to-do'>User Not Founded.</div>";
                        header('location:'.SITEURL.'admin_area/admin-dashboard/user.php');
                    }
                } else {
                    header('location:'.SITEURL.'admin_area/admin-dashboard/user.php');
                }

            ?>

            <div class="form-body">
                <div class="container">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="input-data">
                                <input type="text" name="f_name" value="<?php echo $first_name ; ?>" required>
                                <div class="underline"></div>
                                <label>First Name</label>
                            </div>
                            <div class="input-data">
                                <input type="text" name="l_name" value="<?php echo $last_name ; ?>" required>
                                <div class="underline"></div>
                                <label>Last Name</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="input-data">
                                <input type="email" name="email" value="<?php echo $email ; ?>" required>
                                <div class="underline"></div>
                                <label>Email Address</label>
                            </div>
                            <div class="input-data">
                                <input type="number" name="contact" value="<?php echo $contact_number ; ?>" required>
                                <div class="underline"></div>
                                <label>Contact Number</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="input-data">
                                <input type="text" name="address" value="<?php echo $address ; ?>" required>
                                <div class="underline"></div>
                                <label>Address</label>
                            </div>
                        </div>
                        <div class="form-row submit-btn">
                            <div class="input-data">
                                <div class="inner"></div>
                                <input type="hidden" name="id" value="<?php echo $id ; ?>">
                                <input type="submit" name="submit" value="submit">
                            </div>
                        </div>
                    </form>
                    <?php 
                        if(isset($_POST['submit'])){
                            $user_id = $_POST['id'];
                            $f_name = $_POST['f_name'];
                            $l_name = $_POST['l_name'];
                            $email = $_POST['email'];
                            $address = $_POST['address'];
                            $contact = $_POST['contact'];

                            $sql = "UPDATE user_table SET
                                first_name = '$f_name',
                                last_name = '$l_name',
                                email = '$email',
                                address = '$address',
                                contact_number = '$contact'
                                WHERE user_id = $user_id
                            ";
                            $res = mysqli_query($conn,$sql);

                            if($res==true){
                                    $_SESSION['update'] = "<div class='successfuly-done'>User Updated Successfully.</div>";
                                    header('location:'.SITEURL.'admin_area/admin-dashboard/user.php');
                            } else {
                                    $_SESSION['update'] = "<div class='Failed-to-do'>Failed to Update User.</div>";
                                    header('location:'.SITEURL.'admin_area/admin-dashboard/user-update.php');
                            }
                        }
                    ?>
                </div>
            </div>
        </main>

    </section>

    <?php include('partials/footer.php'); ?>