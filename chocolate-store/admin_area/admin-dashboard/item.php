<?php include('partials/header.php'); ?>
    <!-- Start Side Bar -->
    <?php include('partials/sidebar.php'); ?>
        <!--  Navbar Ends -->

        <main>
            <div class="page-header">
                <div>
                    <h1>Items</h1>
                    <small>Monitor and View Items.</small>
                    <?php 
                        if(isset($_SESSION['add-item'])){
                            echo $_SESSION['add-item'];
                            unset($_SESSION['add-item']);
                        }
                        if(isset($_SESSION['no-item-found'])){
                            echo $_SESSION['no-item-found'];
                            unset($_SESSION['no-item-found']);
                        }
                        if(isset($_SESSION['update'])){
                            echo $_SESSION['update'];
                            unset($_SESSION['update']);
                        }
                        if(isset($_SESSION['remove'])){
                            echo $_SESSION['remove'];
                            unset($_SESSION['remove']);
                        }
                        if(isset($_SESSION['delete'])){
                            echo $_SESSION['delete'];
                            unset($_SESSION['delete']);
                        }
                    ?>
                </div>
                <div class="header-actions">
                    <a href="item-add.php">
                        Add Items<i class='bx bx-chevron-right'></i>
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
                                    <div class="head">Item name</div>
                                </td>
                                <td>
                                    <div class="head">Image</div>
                                </td>
                                <td>
                                    <div class="head">Description</div>
                                </td>
                                <td>
                                    <div class="head">Price</div>
                                </td>
                                <td>
                                    <div class="head">Category</div>
                                </td>
                                <td>
                                    <div class="head">Action</div>
                                </td>
                            </tr>
                            <?php 
                                $sql = "SELECT * FROM item_table";

                                $res = mysqli_query($conn,$sql);

                                if($res==TRUE){
                                    $count = mysqli_num_rows($res);

                                    if($count>0){
                                        $sn=1;
                                        while($rows = mysqli_fetch_assoc($res)){
                                            $item_id = $rows['item_id'];
                                            $item_name = $rows['item_name'];
                                            $image_name = $rows['image_name'];
                                            $description = $rows['description'];
                                            $price= $rows['price'];
                                            $category_id= $rows['category_id'];

                                            $sql1 = "SELECT * FROM category_table WHERE category_id=$category_id";
                                            $res1 = mysqli_query($conn,$sql1);
                                            $count1 = mysqli_num_rows($res1);
                                            if($count1>0){
                                                while($row1=mysqli_fetch_assoc($res1)){
                                                    $category_name = $row1['category_name'];
                                                }
                                            }
                                            ?>
                            <tr>
                                <td>
                                    <div><?php echo $sn++; ?></div>
                                </td>
                                <td>
                                    <div><?php echo $item_name; ?></div>
                                </td>
                                <td>
                                    <div><img src="images/item/<?php echo $image_name; ?>" alt=""></div>
                                </td>
                                <td>
                                    <div><?php echo $description; ?></div>
                                </td>
                                <td>
                                    <div>Rs <?php echo $price; ?></div>
                                </td>
                                <td>
                                    <div><?php echo $category_name; ?></div>
                                </td>
                                <td>
                                    <div>
                                        <a href="<?php echo SITEURL; ?>admin_area/admin-dashboard/item-update.php?id=<?php echo $item_id; ?>" class="update">Upadate</a>
                                        <a href="<?php echo SITEURL; ?>admin_area/admin-dashboard/item-delete.php?id=<?php echo $item_id; ?>&image_name=<?php echo $image_name; ?>" class="remove">Remove</a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                                        }

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