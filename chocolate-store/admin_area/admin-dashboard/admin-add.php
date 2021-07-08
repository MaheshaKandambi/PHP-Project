<?php include('partials/header.php'); ?>
    <!-- Start Side Bar -->
    <?php include('partials/sidebar.php'); ?>
        <!--  Navbar Ends -->

        <main>
            <div class="page-header">
                <div>
                    <h1>Add New Admin</h1>
                    <small>Fill new admin details.</small>
                    <?php 
                        if(isset($_SESSION['add-admin'])){
                            echo $_SESSION['add-admin'];
                            unset($_SESSION['add-admin']);
                        }
                    ?>
                </div>
            </div>

            <div class="form-body">
                <div class="container">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="input-data">
                                <input type="text" name="username" required>
                                <div class="underline"></div>
                                <label>User Name</label>
                            </div>
                            <div class="input-data">
                                <input type="email" name="email" required>
                                <div class="underline"></div>
                                <label>Email</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="input-data">
                                <input type="password" name="password" required>
                                <div class="underline"></div>
                                <label>Password</label>
                            </div>
                            <div class="input-data">
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
                            $username = $_POST['username'];
                            $email = $_POST['email'];
                            $password = md5($_POST['password']);

                            $sql = "INSERT INTO admin_table SET
                                username = '$username',
                                email = '$email',
                                password = '$password'
                            ";
                            $res = mysqli_query($conn, $sql) or die(mysqli_error());
                            if($res==true){
                                $_SESSION['add-admin'] = "<div class='successfuly-done'>Admin Added Successfully.</div>";
                                header("location:".SITEURL.'admin_area/admin-dashboard/index.php');
                            } else {
                                $_SESSION['add-admin'] = "<div class='Failed-to-do'>Failed to Added Admin.</div>";
                                header("location:".SITEURL.'admin_area/admin-dashboard/admin-add.php');
                            }
                        }
                    ?>
                </div>
            </div>
        </main>

    </section>

    <?php include('partials/footer.php'); ?>