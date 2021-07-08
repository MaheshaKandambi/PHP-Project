<?php include('partials/header.php'); ?>
    <!-- Start Side Bar -->
    <?php include('partials/sidebar.php'); ?>
        <!--  Navbar Ends -->

        <main>
            <div class="page-header">
                <div>
                    <h1>Update Admin</h1>
                    <small>Change the existing admin details.</small>
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
                    $sql = "SELECT * FROM admin_table WHERE admin_id=$id";
                    $res= mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                    if($count==1){
                        $row = mysqli_fetch_assoc($res);
                        $username=$row['username'];
                        $email= $row['email'];
                    } else {
                        $_SESSION['no-admin-found']= "<div class='Failed-to-do'>Admin Not Founded.</div>";
                        header('location:'.SITEURL.'admin_area/admin-dashboard/index.php');
                    }
                } else {
                    header('location:'.SITEURL.'admin_area/admin-dashboard/index.php');
                }

            ?>

            <div class="form-body">
                <div class="container">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="input-data">
                                <input type="text" name="username" value="<?php echo $username ; ?>" required>
                                <div class="underline"></div>
                                <label>UserName</label>
                            </div>
                            <div class="input-data">
                                <input type="email" name="email" value="<?php echo $email ; ?>" required>
                                <div class="underline"></div>
                                <label>Email Address</label>
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
                            $admin_id = $_POST['id'];
                            $username = $_POST['username'];
                            $email = $_POST['email'];

                            $sql = "UPDATE admin_table SET
                                username = '$username',
                                email = '$email'
                                WHERE admin_id = $admin_id
                            ";
                            $res = mysqli_query($conn,$sql);

                            if($res==true){
                                    $_SESSION['update'] = "<div class='successfuly-done'>Admin Updated Successfully.</div>";
                                    header('location:'.SITEURL.'admin_area/admin-dashboard/index.php');
                            } else {
                                    $_SESSION['update'] = "<div class='Failed-to-do'>Failed to Update Admin.</div>";
                                    header('location:'.SITEURL.'admin_area/admin-dashboard/admin-update.php');
                            }
                        }
                    ?>
                </div>
            </div>
        </main>

    </section>

    <?php include('partials/footer.php'); ?>