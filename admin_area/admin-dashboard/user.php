<?php include('partials/header.php'); ?>
    <!-- Start Side Bar -->
    <?php include('partials/sidebar.php'); ?>
        <!--  Navbar Ends -->

        <main>
            <div class="page-header">
                <div>
                    <h1>Users</h1>
                    <small>Monitor and View users details.</small>
                    <?php 
                        if(isset($_SESSION['add-user'])){
                            echo $_SESSION['add-user'];
                            unset($_SESSION['add-user']);
                        }
                        if(isset($_SESSION['no-user-found'])){
                            echo $_SESSION['no-user-found'];
                            unset($_SESSION['no-user-found']);
                        }
                        if(isset($_SESSION['update'])){
                            echo $_SESSION['update'];
                            unset($_SESSION['update']);
                        }
                        if(isset($_SESSION['delete'])){
                            echo $_SESSION['delete'];
                            unset($_SESSION['delete']);
                        }
                    ?>
                </div>
                <div class="header-actions">
                    <a href="user-add.php">
                        Add User<i class='bx bx-chevron-right'></i>
                    </a>
                </div>
            </div>

            <div class="jobs">
                <div class="table-responsive">
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="head">Index</div>
                                </td>
                                <td>
                                    <div class="head">Full Name</div>
                                </td>
                                <td>
                                    <div class="head">Email</div>
                                </td>
                                <td>
                                    <div class="head">Address</div>
                                </td>
                                <td>
                                    <div class="head">Contact</div>
                                </td>
                                <td>
                                    <div class="head">Action</div>
                                </td>
                            </tr>
                            <?php 
                                $sql = "SELECT * FROM user_table";

                                $res = mysqli_query($conn,$sql);

                                if($res==TRUE){
                                    $count = mysqli_num_rows($res);

                                    if($count>0){
                                        $sn = 1;
                                        while($rows=mysqli_fetch_assoc($res)){
                                            $user_id = $rows['user_id'];
                                            $first_name = $rows['first_name'];
                                            $last_name = $rows['last_name'];
                                            $email = $rows['email'];
                                            $address = $rows['address'];
                                            $contact_number = $rows['contact_number'];
                                            ?>
                            <tr>
                                <td>
                                    <div><?php echo $sn++; ?></div>
                                </td>
                                <td>
                                    <div><?php echo $first_name." ".$last_name; ?></div>
                                </td>
                                <td>
                                    <div><?php echo $email; ?></div>
                                </td>
                                <td>
                                    <div><?php echo $address; ?></div>
                                </td>
                                <td>
                                    <div>+94<?php echo $contact_number; ?></div>
                                </td>
                                <td>
                                    <div>
                                        <a href="<?php echo SITEURL; ?>admin_area/admin-dashboard/user-update.php?id=<?php echo $user_id; ?>" class="update">Upadate</a>
                                        <a href="<?php echo SITEURL; ?>admin_area/admin-dashboard/user-delete.php?id=<?php echo $user_id; ?>" class="remove">Remove</a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                                        }
                                    } else {
                                        echo "<div class='error'>There is no data in the table</div>";
                                    }
                                }
                            
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </section>

    <?php include('partials/footer.php'); ?>