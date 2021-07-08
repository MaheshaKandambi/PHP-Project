<?php include('partials/header.php'); ?>

    <!-- Start Side Bar -->
    <?php include('partials/sidebar.php'); ?>
        <!--  Navbar Ends -->

        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Items</div>
                        <?php 
                            $sql1 = "SELECT * FROM item_table";
                            $res1= mysqli_query($conn,$sql1);
                            $count1 = mysqli_num_rows($res1);
                        ?>
                        <div class="number"><?php echo $count1; ?></div>
                        <div class="indicator">
                            <span class="text">Total items up to now</span>
                        </div>
                    </div>
                    <i class='bx bx-food-menu cart four'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Orders</div>
                        <?php 
                            $sql2 = "SELECT * FROM order_table";
                            $res2= mysqli_query($conn,$sql2);
                            $count2 = mysqli_num_rows($res2);
                        ?>
                        <div class="number"><?php echo $count2; ?></div>
                        <div class="indicator">
                            <span class="text">Total orders up to now</span>
                        </div>
                    </div>
                    <i class='bx bx-list-ul cart'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Sales</div>
                        <?php 
                            $sql3 = "SELECT * FROM order_table WHERE status='Delivered'";
                            $res3= mysqli_query($conn,$sql3);
                            $count3 = mysqli_num_rows($res3);
                        ?>
                        <div class="number"><?php echo $count3; ?></div>
                        <div class="indicator">
                            <span class="text">Total deliveries up to now</span>
                        </div>
                    </div>
                    <i class='bx bxs-cart-add cart two'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Profit</div>
                        <?php 
                            $sql4 = "SELECT SUM(total_price) AS Total FROM order_table WHERE status='Delivered'";
                            $res4 = mysqli_query($conn,$sql4);
                            $row4 = mysqli_fetch_assoc($res4);
                            $total_revenue4 = $row4['Total'];
                        ?>
                        <div class="number">Rs <?php echo $total_revenue4; ?></div>
                        <div class="indicator">
                            <span class="text">Total profit up to now</span>
                        </div>
                    </div>
                    <i class='bx bx-cart cart three'></i>
                </div>
            </div>
        </div>

        <main class="main-index">
            <div class="page-header">
                <div>
                    <h1>Admins</h1>
                    <small>Monitor and View admin details.</small>
                    <?php 
                        if(isset($_SESSION['add-admin'])){
                            echo $_SESSION['add-admin'];
                            unset($_SESSION['add-admin']);
                        }
                        if(isset($_SESSION['remove'])){
                            echo $_SESSION['remove'];
                            unset($_SESSION['remove']);
                        }
                        if(isset($_SESSION['delete'])){
                            echo $_SESSION['delete'];
                            unset($_SESSION['delete']);
                        }
                        if(isset($_SESSION['no-admin-found'])){
                            echo $_SESSION['no-admin-found'];
                            unset($_SESSION['no-admin-found']);
                        }
                        if(isset($_SESSION['update'])){
                            echo $_SESSION['update'];
                            unset($_SESSION['update']);
                        }
                    ?>
                </div>
                <div class="header-actions">
                    <a href="admin-add.php">
                      Add Admins<i class='bx bx-chevron-right'></i>
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
                                    <div class="head">User Name</div>
                                </td>
                                <td>
                                    <div class="head">Admin Image</div>
                                </td>
                                <td>
                                    <div class="head">Email</div>
                                </td>
                                <td>
                                    <div class="head">Action</div>
                                </td>
                            </tr>
                            <?php 
                                $sql = "SELECT * FROM admin_table";

                                $res = mysqli_query($conn,$sql);

                                if($res==TRUE){
                                    $count = mysqli_num_rows($res);

                                    if($count>0){
                                        $sn = 1;
                                        while($rows=mysqli_fetch_assoc($res)){
                                            $admin_id = $rows['admin_id'];
                                            $username = $rows['username'];
                                            $email = $rows['email'];
                                            $image_name = $rows['image_name'];
                                            ?>
                            <tr>
                                <td>
                                    <div><?php echo $sn++; ?></div>
                                </td>
                                <td>
                                    <div><?php echo $username; ?></div>
                                </td>
                                <td>
                                    <div>
                                    <?php 
                                        if($image_name!=""){
                                            ?>
                                            <img src="images/admin/<?php echo $image_name; ?>">
                                            <?php
                                        } else {
                                            echo "<div style='color: crimson;'>Image not Added Yet.</div>";
                                        }
                                
                                    ?>
                                    </div>
                                </td>
                                <td>
                                    <div><?php echo $email; ?></div>
                                </td>
                                <td>
                                    <div>
                                        <a href="<?php echo SITEURL; ?>admin_area/admin-dashboard/admin-update.php?id=<?php echo $admin_id; ?>" class="update">Upadate</a>
                                        <a href="<?php echo SITEURL; ?>admin_area/admin-dashboard/admin-delete.php?id=<?php echo $admin_id; ?>&image_name=<?php echo $image_name; ?>" class="remove">Remove</a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                                        }
                                    } else {
                                        echo "<div style='color: crimson;'>There is no data in the table</div>";
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