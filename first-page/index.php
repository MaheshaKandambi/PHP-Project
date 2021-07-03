<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chocolate.lk</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"> -->
    <link rel="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body>
   
   <div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
               <a href="#" class="btn btn-success btn-sm">Welcome</a>
               <a href="checkout.php">4 Items In Your Cart | Total Price: Rs 3500.00 LKR </a>
               
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6"><!-- col-md-6 Begin -->
               
               <ul class="menu"><!-- cmenu Begin -->
                   
                   <li>
                       <a href="customer_register.php">User Login</a>
                   </li>
                   <li>
                       <a href="checkout.php">My Account</a>
                   </li>
                   <li>
                       <a href="cart.php">Go To Cart</a>
                   </li>
                   <li>
                       <a href="admin_area/Admin-Login-Signup/Login/login.html">Admin Login</a>
                   </li>
                   
               </ul><!-- menu Finish -->
               
           </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- Top Finish -->
   
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="navbar-header"><!-- navbar-header Begin -->
               
               <a href="index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   
                   <img src="images/logo_2.jpg" alt="Chocolate Logo Logo" class="hidden-xs">
                   <img src="images/logo_2.jpg" alt="Chocolate Logo Mobile" class="visible-xs">
                   
               </a><!-- navbar-brand home Finish -->
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Toggle Navigation</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   
                   <span class="sr-only">Toggle Search</span>
                   
                   <i class="fa fa-search"></i>
                   
               </button>
               
           </div><!-- navbar-header Finish -->
           
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
               <div class="padding-nav"><!-- padding-nav Begin -->
                   
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       
                       <li class="active">
                           <a href="index.php">Home</a>
                       </li>
                       <li>
                           <a href="shop.php">Shop</a>
                       <li>
                           <a href="checkout.php">My Account</a>
                       </li>
                       <li>
                           <a href="cart.php">Shopping Cart</a>
                       </li>
                       <li>
                           <a href="contact.php">Contact Us</a>
                       </li>
                       
                   </ul><!-- nav navbar-nav left Finish -->
                   
               </div><!-- padding-nav Finish -->
               
               <a href="cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span>4 Items In Your Cart</span>
                   
               </a><!-- btn navbar-btn btn-primary Finish -->
               
               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->
                   
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->
                       
                       <span class="sr-only">Toggle Search</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button><!-- btn btn-primary navbar-btn Finish -->
                   
               </div><!-- navbar-collapse collapse right Finish -->
               
               <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->
                   
                   <form method="get" action="results.php" class="navbar-form"><!-- navbar-form Begin -->
                       
                       <div class="input-group"><!-- input-group Begin -->
                           
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           
                           <span class="input-group-btn"><!-- input-group-btn Begin -->
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->
                               
                               <i class="fa fa-search"></i>
                               
                           </button><!-- btn btn-primary Finish -->
                           
                           </span><!-- input-group-btn Finish -->
                           
                       </div><!-- input-group Finish -->
                       
                   </form><!-- navbar-form Finish -->
                   
               </div><!-- collapse clearfix Finish -->
               
           </div><!-- navbar-collapse collapse Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- navbar navbar-default Finish -->
   
   <div class="container" id="slider"><!-- container Begin -->
       
       <div class="col-md-12"><!-- col-md-12 Begin -->
           
           <div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- carousel slide Begin -->
               
               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                   
                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                   <li data-target="#myCarousel" data-slide-to="3"></li>
                   
               </ol><!-- carousel-indicators Finish -->
               
               <div class="carousel-inner"><!-- carousel-inner Begin -->
                   
                   <div class="item active">
                       
                       <img src="admin_area/slides_images/slide-1.jpg" alt="Slider Image 1">
                       
                   </div>
                   
                   <div class="item">
                       
                       <img src="admin_area/slides_images/slide-2.jpg" alt="Slider Image 2">
                       
                   </div>
                   
                   <div class="item">
                       
                       <img src="admin_area/slides_images/slide-3.jpg" alt="Slider Image 3">
                       
                   </div>
                   
                   <div class="item">
                       
                       <img src="admin_area/slides_images/slide-4.jpg" alt="Slider Image 4">
                       
                   </div>
                   
               </div><!-- carousel-inner Finish -->
               
               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                   
                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Previous</span>
                   
               </a><!-- left carousel-control Finish -->
               
               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- left carousel-control Begin -->
                   
                   <span class="glyphicon glyphicon-chevron-right"></span>
                   <span class="sr-only">Next</span>
                   
               </a><!-- left carousel-control Finish -->
               
           </div><!-- carousel slide Finish -->
           
       </div><!-- col-md-12 Finish -->
       
   </div><!-- container Finish -->

   <div id="advantages"><!-- #advantages Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="same-height-row"><!-- same-height-row Begin -->
               
               <div class="col-sm-4"><!-- col-sm-4 Begin -->
                   
                   <div class="box same-height"><!-- box same-height Begin -->
                       
                       <div class="icon"><!-- icon Begin -->
                           
                           <i class="fa fa-gift"></i>
                           
                       </div><!-- icon Finish -->
                       
                       <h3><a href="#">Choco gift Packs</a></h3>
                       
                       <p>Gifts for any occasion</p>
                       
                   </div><!-- box same-height Finish -->
                   
               </div><!-- col-sm-4 Finish -->
               
               <div class="col-sm-4"><!-- col-sm-4 Begin -->
                   
                   <div class="box same-height"><!-- box same-height Begin -->
                       
                       <div class="icon"><!-- icon Begin -->
                           
                           <i class="fa fa-car" style="font-size:80px"></i>
                           
                       </div><!-- icon Finish -->
                       
                       <h3><a href="#">Islandwide Shipping</a></h3>
                       
                       <p>Islandwide delivery in 2-3 working days</p>
                       
                   </div><!-- box same-height Finish -->
                   
               </div><!-- col-sm-4 Finish -->
               
               <div class="col-sm-4"><!-- col-sm-4 Begin -->
                   
                   <div class="box same-height"><!-- box same-height Begin -->
                       
                       <div class="icon"><!-- icon Begin -->
                           
                           <i class="fa fa-thumbs-up"></i>
                           
                       </div><!-- icon Finish -->
                       
                       <h3><a href="#">100% Money Back</a></h3>
                       
                       <p>If you're not satisfied</p>
                       
                   </div><!-- box same-height Finish -->
                   
               </div><!-- col-sm-4 Finish -->
               
           </div><!-- same-height-row Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- #advantages Finish -->


   
   <div id="hot"><!-- #hot Begin -->
       
       <div class="box"><!-- box Begin -->
           
           <div class="container"><!-- container Begin -->
               
               <div class="col-md-12"><!-- col-md-12 Begin -->
                   
                   <h2>
                       Our Latest Products
                   </h2>
                   
               </div><!-- col-md-12 Finish -->
               
           </div><!-- container Finish -->
           
       </div><!-- box Finish -->
       
   </div><!-- #hot Finish -->
   
   <div id="content" class="container"><!-- container Begin -->
       
       <div class="row"><!-- row Begin -->
           
           <div class="col-sm-4 col-sm-6 single"><!-- col-sm-4 col-sm-6 single Begin -->
               
               <div class="product"><!-- product Begin -->
                   
                   <a href="details.php">
                       
                       <img class="img-responsive" src="admin_area/product_images/product-1.jpg" alt="Product 1">
                       
                   </a>
                   
                   <div class="text"><!-- text Begin -->
                       
                       <h3>
                           <a href="details.php">
                           Danette Hazelnut Pudding
                           </a>
                       </h3>
                       
                       <p class="price">Rs 700.00 LKR*</p>
                       
                       <p class="button">
                           
                           <a href="details.php" class="btn btn-default">View Details</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Add To Cart
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div><!-- text Finish -->
                   
               </div><!-- product Finish -->
               
           </div><!-- col-sm-4 col-sm-6 single Finish -->
           
           <div class="col-sm-4 col-sm-6 single"><!-- col-sm-4 col-sm-6 single Begin -->
               
               <div class="product"><!-- product Begin -->
                   
                   <a href="details.php">
                       
                       <img class="img-responsive" src="admin_area/product_images/product-13.jpg" alt="Product 1">
                       
                   </a>
                   
                   <div class="text"><!-- text Begin -->
                       
                       <h3>
                           <a href="details.php">
                           Cledor Ice Cream 
                           </a>
                       </h3>
                       
                       <p class="price">Rs 1550.00 LKR*</p>
                       
                       <p class="button">
                           
                           <a href="details.php" class="btn btn-default">View Details</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Add To Cart
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div><!-- text Finish -->
                   
               </div><!-- product Finish -->
               
           </div><!-- col-sm-4 col-sm-6 single Finish -->
           
           <div class="col-sm-4 col-sm-6 single"><!-- col-sm-4 col-sm-6 single Begin -->
               
               <div class="product"><!-- product Begin -->
                   
                   <a href="details.php">
                       
                       <img class="img-responsive" src="admin_area/product_images/product-9.jpg" alt="Product 1">
                       
                   </a>
                   
                   <div class="text"><!-- text Begin -->
                       
                       <h3>
                           <a href="details.php">
                               Toblerone Chocolate
                           </a>
                       </h3>
                       
                       <p class="price">Rs 450.00 LKR*</p>
                       
                       <p class="button">
                           
                           <a href="details.php" class="btn btn-default">View Details</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Add To Cart
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div><!-- text Finish -->
                   
               </div><!-- product Finish -->
               
           </div><!-- col-sm-4 col-sm-6 single Finish -->
           
           <div class="col-sm-4 col-sm-6 single"><!-- col-sm-4 col-sm-6 single Begin -->
               
               <div class="product"><!-- product Begin -->
                   
                   <a href="details.php">
                       
                       <img class="img-responsive" src="admin_area/product_images/product-4.jpg" alt="Product 1">
                       
                   </a>
                   
                   <div class="text"><!-- text Begin -->
                       
                       <h3>
                           <a href="details.php">
                           Tate's Bake Shop Cookies
                           </a>
                       </h3>
                       
                       <p class="price">Rs 2560.00 LKR*</p>
                       
                       <p class="button">
                           
                           <a href="details.php" class="btn btn-default">View Details</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Add To Cart
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div><!-- text Finish -->
                   
               </div><!-- product Finish -->
               
           </div><!-- col-sm-4 col-sm-6 single Finish -->
           
           <div class="col-sm-4 col-sm-6 single"><!-- col-sm-4 col-sm-6 single Begin -->
               
               <div class="product"><!-- product Begin -->
                   
                   <a href="details.php">
                       
                       <img class="img-responsive" src="admin_area/product_images/product-5.jpg" alt="Product 1">
                       
                   </a>
                   
                   <div class="text"><!-- text Begin -->
                       
                       <h3>
                           <a href="details.php">
                               London Dairy Ice Cream
                           </a>
                       </h3>
                       
                       <p class="price">Rs 382.50 LKR*</p>
                       
                       <p class="button">
                           
                           <a href="details.php" class="btn btn-default">View Details</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Add To Cart
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div><!-- text Finish -->
                   
               </div><!-- product Finish -->
               
           </div><!-- col-sm-4 col-sm-6 single Finish -->
           
           <div class="col-sm-4 col-sm-6 single"><!-- col-sm-4 col-sm-6 single Begin -->
               
               <div class="product"><!-- product Begin -->
                   
                   <a href="details.php">
                       
                       <img class="img-responsive" src="admin_area/product_images/product-15.jpg" alt="Product 1">
                       
                   </a>
                   
                   <div class="text"><!-- text Begin -->
                       
                       <h3>
                           <a href="details.php">
                           Nantucket Dark Chocolate
                           </a>
                       </h3>
                       
                       <p class="price">Rs 995.00 LKR*</p>
                       
                       <p class="button">
                           
                           <a href="details.php" class="btn btn-default">View Details</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Add To Cart
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div><!-- text Finish -->
                   
               </div><!-- product Finish -->
               
           </div><!-- col-sm-4 col-sm-6 single Finish -->
           
           <div class="col-sm-4 col-sm-6 single"><!-- col-sm-4 col-sm-6 single Begin -->
               
               <div class="product"><!-- product Begin -->
                   
                   <a href="details.php">
                       
                       <img class="img-responsive" src="admin_area/product_images/product-16.jpg" alt="Product 1">
                       
                   </a>
                   
                   <div class="text"><!-- text Begin -->
                       
                       <h3>
                           <a href="details.php">
                           Dufflet chocolate Fudge
                           </a>
                       </h3>
                       
                       <p class="price">Rs 2900.00 LKR*</p>
                       
                       <p class="button">
                           
                           <a href="details.php" class="btn btn-default">View Details</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Add To Cart
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div><!-- text Finish -->
                   
               </div><!-- product Finish -->
               
           </div><!-- col-sm-4 col-sm-6 single Finish -->
           
           <div class="col-sm-4 col-sm-6 single"><!-- col-sm-4 col-sm-6 single Begin -->
               
               <div class="product"><!-- product Begin -->
                   
                   <a href="details.php">
                       
                       <img class="img-responsive" src="admin_area/product_images/product-11.png" alt="Product 1">
                       
                   </a>
                   
                   <div class="text"><!-- text Begin -->
                       
                       <h3>
                           <a href="details.php">
                           Lindt Lindor Chocolate 
                           </a>
                       </h3>
                       
                       <p class="price">Rs 1200.00 LKR*</p>
                       
                       <p class="button">
                           
                           <a href="details.php" class="btn btn-default">View Details</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Add To Cart
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div><!-- text Finish -->
                   
               </div><!-- product Finish -->
               
           </div><!-- col-sm-4 col-sm-6 single Finish -->
           
       </div><!-- row Finish -->
       
   </div><!-- container Finish -->
    
   <?php 
    
    include("includes/footer.php");
    
   ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    
    
</body>
</html>