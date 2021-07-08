<?php include('partials/header.php'); ?>
    <!-- Start Side Bar -->
    <?php include('partials/sidebar.php'); ?>
        <!--  Navbar Ends -->
        <main>
        <div class="page-header">
                <div>
                    <h1>Profile</h1>
                    <small>Update your profile and change password.</small>
                    <?php 
                        if(isset($_SESSION['no-admin-found'])){
                            echo $_SESSION['no-admin-found'];
                            unset($_SESSION['no-admin-found']);
                        }

                        if(isset($_SESSION['upload'])){
                            echo $_SESSION['upload'];
                            unset($_SESSION['upload']);
                        }

                        if(isset($_SESSION['file-remove'])){
                            echo $_SESSION['file-remove'];
                            unset($_SESSION['file-remove']);
                        }

                        if(isset($_SESSION['update'])){
                            echo $_SESSION['update'];
                            unset($_SESSION['update']);
                        }

                        if(isset($_SESSION['change_pwd'])){
                            echo $_SESSION['change_pwd'];
                            unset($_SESSION['change_pwd']);
                        }

                        if(isset($_SESSION['pwd_not_match'])){
                            echo $_SESSION['pwd_not_match'];
                            unset($_SESSION['pwd_not_match']);
                        }

                        if(isset($_SESSION['user_not_found'])){
                            echo $_SESSION['user_not_found'];
                            unset($_SESSION['user_not_found']);
                        }
                    ?> <br><br>
                </div>
            </div>
            
            <div class="profile">
                <div class="profile-info">
                    <div>
                    <?php 
                        if(isset($_SESSION['id'])){
                            $id = $_SESSION['id'];
                            
                            $sql = "SELECT * FROM admin_table WHERE admin_id=$id";
                            $res = mysqli_query($conn,$sql);
                            $count = mysqli_num_rows($res);
                            if($count==1){
                                $row = mysqli_fetch_assoc($res);
                                $username=$row['username'];
                                $email=$row['email'];
                                $image_name = $row['image_name'];

                                if($image_name == ""){
                                    ?>
                                    <img src="images/person-icon1.png" alt="img">
                                    <?php
                                } else {
                                    ?>
                                    <img src="./images/admin/<?php echo $image_name; ?>" alt="img">
                                    <?php
                                }
                                ?>
                        <h1><?php echo $username; ?></h1>
                        <span><?php echo $email; ?></span>
                    </div>
                    <?php 
                        } else {
                            $_SESSION['not-found']= "<div class='Failed-to-do'>Admin Not Founded.</div>";
                            header('location:'.SITEURL.'admin_area/admin-dashboard/login.php');
                        }
                    } else {
                        header('location:'.SITEURL.'admin_area/admin-dashboard/login.php');
                    }
                    ?>
                    <div class="profile-btn">
                        <a href="profile-update.php?id=<?php echo $id; ?>">
                            <span class="las la-file-export"></span>Update Profile
                        </a>
                        <a href="profile-password.php?id=<?php echo $id; ?>">
                            <span class="las la-file-export"></span>Update Password
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </section>

    <?php include('partials/footer.php'); ?>