<div class="sidebar">
        <div class="logo-details">
            <img src="./images/logo_2.jpg" alt="">
        </div>
        <?php 
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>
        <ul class="nav-links">
            <li>
                <a href="index.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="user.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Users</span>
                </a>
            </li>
            <li>
                <a href="category.php">
                    <i class='bx bx-box'></i>
                    <span class="links_name">Categories</span>
                </a>
            </li>
            <li>
                <a href="item.php">
                    <i class='bx bx-food-menu'></i>
                    <span class="links_name">Items</span>
                </a>
            </li>
            <li>
                <a href="order.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Order list</span>
                </a>
            </li>
            <li class="log_out">
                <a href="./logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- End Side Bar -->
    <section class="home-section">
        <!-- Navbar satrt -->
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
            </div>
            <div class="profile-details">
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
                                <img src="./images/person-icon1.png" alt="">
                            <?php
                        } else {
                            ?>
                                <img src="./images/admin/<?php echo $image_name; ?>" alt="">
                            <?php
                        }
                        ?>
                <span class="admin_name"><?php echo $username; ?></span>
                <?php 
                        }
                    }
                ?>
                <a href="profile.php">
                    <i class='bx bx-chevron-down'></i>
                </a>
            </div>
        </nav>