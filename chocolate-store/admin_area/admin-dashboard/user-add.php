<?php include('partials/header.php'); ?>
    <!-- Start Side Bar -->
    <?php include('partials/sidebar.php'); ?>
        <!--  Navbar Ends -->

        <main>
            <div class="page-header">
                <div>
                    <h1>Add New User</h1>
                    <small>Fill new user details.</small>
                    <?php 
                        if(isset($_SESSION['add-user'])){
                            echo $_SESSION['add-user'];
                            unset($_SESSION['add-user']);
                        }
                    ?>
                </div>
            </div>

            <div class="form-body">
                <div class="container">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="input-data">
                                <input type="text" name="f_name" required>
                                <div class="underline"></div>
                                <label>First Name</label>
                            </div>
                            <div class="input-data">
                                <input type="text" name="l_name" required>
                                <div class="underline"></div>
                                <label>Last Name</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="input-data">
                                <input type="email" name="email" required>
                                <div class="underline"></div>
                                <label>Email Address</label>
                            </div>
                            <div class="input-data">
                                <input type="number" name="contact" required>
                                <div class="underline"></div>
                                <label>Contact Number</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="input-data">
                                <input type="text" name="address" required>
                                <div class="underline"></div>
                                <label>Address</label>
                            </div>
                            <div class="input-data">
                                <input type="password" name="password" required>
                                <div class="underline"></div>
                                <label>Password</label>
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
                            $f_name = $_POST['f_name'];
                            $l_name = $_POST['l_name'];
                            $email = $_POST['email'];
                            $address = $_POST['address'];
                            $contact = $_POST['contact'];
                            $password = md5($_POST['password']);

                            $sql = "INSERT INTO user_table SET
                                first_name = '$f_name',
                                last_name = '$l_name',
                                email = '$email',
                                address = '$address',
                                contact_number = '$contact',
                                password = '$password'
                            ";
                            $res = mysqli_query($conn, $sql) or die(mysqli_error());
                            if($res==true){
                                $_SESSION['add-user'] = "<div class='successfuly-done'>User Added Successfully.</div>";
                                header("location:".SITEURL.'admin_area/admin-dashboard/user.php');
                            } else {
                                $_SESSION['add-user'] = "<div class='Failed-to-do'>Failed to Added User.</div>";
                                header("location:".SITEURL.'admin_area/admin-dashboard/user-add.php');
                            }
                        }
                    ?>
                </div>
            </div>
        </main>

    </section>

    <?php include('partials/footer.php'); ?>