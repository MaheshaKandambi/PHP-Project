<?php include('partials/header.php'); ?>
    <!-- Start Side Bar -->
    <?php include('partials/sidebar.php'); ?>
        <!--  Navbar Ends -->

        <main>
            <div class="page-header">
                <div>
                    <h1>Categories</h1>
                    <small>Monitor and View Categories.</small>
                    <?php 
                        if(isset($_SESSION['add-category'])){
                            echo $_SESSION['add-category'];
                            unset($_SESSION['add-category']);
                        }
                        if(isset($_SESSION['no-category-found'])){
                            echo $_SESSION['no-category-found'];
                            unset($_SESSION['no-category-found']);
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
                    <a href="category-add.php">
                        Add Category<i class='bx bx-chevron-right'></i>
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
                                    <div class="head">Category Name</div>
                                </td>
                                <td>
                                    <div class="head">Image</div>
                                </td>
                                <td>
                                    <div class="head">Action</div>
                                </td>
                            </tr>
                            <?php 
                                $sql = "SELECT * FROM category_table";

                                $res = mysqli_query($conn,$sql);

                                if($res==TRUE){
                                    $count = mysqli_num_rows($res);

                                    if($count>0){
                                        $sn = 1;
                                        while($rows=mysqli_fetch_assoc($res)){
                                            $category_id = $rows['category_id'];
                                            $category_name = $rows['category_name'];
                                            $image_name = $rows['image_name'];
                                            ?>
                            <tr>
                                <td>
                                    <div><?php echo $sn++; ?></div>
                                </td>
                                <td>
                                    <div><?php echo $category_name; ?></div>
                                </td>
                                <td>
                                    <div>
                                    <?php 
                                        if($image_name!=""){
                                            ?>
                                            <img src="images/category/<?php echo $image_name; ?>">
                                            <?php
                                        } else {
                                            echo "<div class='error'>Image not Added.</div>";
                                        }
                                
                                    ?>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <a href="<?php echo SITEURL; ?>admin_area/admin-dashboard/category-update.php?id=<?php echo $category_id; ?>" class="update">Upadate</a>
                                        <a href="<?php echo SITEURL; ?>admin_area/admin-dashboard/category-delete.php?id=<?php echo $category_id; ?>&image_name=<?php echo $image_name; ?>" class="remove">Remove</a>
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