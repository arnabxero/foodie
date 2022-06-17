<?php
include('include/connection.php');
session_start();

$name = "Guest";
$id = "-99";
$profile_link = "login.php";
$profile_photo = "webcon.png";
$display = "";

if (isset($_SESSION['logid'])) {
   $id = $_SESSION['logid'];

   $sql = "SELECT * FROM users WHERE id = '$id'";
   $res = mysqli_query($con, $sql);
   $row = mysqli_fetch_array($res);

   $name = $row['last_name'];
   $profile_link = "profile.php";
   $profile_photo = $row['pro_pic'];
   $display = "display:none;";
}

class Homepage
{
   function recomend()
   {
      include('include/connection.php');
      $sql = "SELECT * FROM restaurants";
      $res = mysqli_query($con, $sql);

      $c = 0;

      while ($row = mysqli_fetch_assoc($res)) {

         if ($c > 5) {
            break;
         }
         $details = $row['details'];

         if (strlen($details) > 30) {
            $details = substr($details, 0, 30);
         }

         echo '
         <div class="col-sm-6 col-md-4 col-lg-4">
               <div class="box">
                  <div class="option_container">
                     <div class="options">
                        <a href="view_restaurant.php?id=' . $row['id'] . '" class="option2">
                           View Restaurant
                        </a>
                     </div>
                  </div>
                  <div class="img-box">
                     <img src="files/rest_dp/' . $row['pro_pic'] . '" alt="">
                  </div>
                  <div class="detail-box">
                     <h5>
                        ' . $row['name'] . '
                     </h5>
                     <h6>
                        ' . $row['name'] . '
                     </h6>
                  </div>
               </div>
            </div>';

         $c++;
      }
   }
}
?>



<!DOCTYPE html>
<html>

<head>
   <!-- Basic -->
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <!-- Site Metas -->
   <meta name="keywords" content="" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <link rel="shortcut icon" href="files/icons/webcon.png" type="">
   <title>FOODIE</title>
   <!-- bootstrap core css -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
   <!-- font awesome style -->
   <link href="css/font-awesome.min.css" rel="stylesheet" />
   <!-- Custom styles for this template -->
   <link href="css/style.css" rel="stylesheet" />
   <!-- responsive style -->
   <link href="css/responsive.css" rel="stylesheet" />
</head>

<style>

</style>

<body>
   <div class="hero_area">
      <!-- header section strats -->
      <header class="header_section">
         <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
               <a class="navbar-brand" href="index.php"><img width="180" height="50" src="files/icons/foodie.gif" alt="#" /></a>
               <form method="GET" action="search.php">
                  <div class="form-group" style="float:left;">
                     <div class="input-group" style="padding: 2%; margin-top:2%;">
                        <input type="search" name="q" class="form-control search-box" placeholder="Find a Restaurant..." style="border-radius: 50px; margin-right: 10px;" />
                        <button type="submit" class="btn btn-primary search-btn" style="background-color: rgb(255, 60, 93); border-radius: 100px; border: 0px;">
                           <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                     </div>
                  </div>
               </form>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav">
                     <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="product.html">All</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="blog_list.html">Blog</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                     </li>
                     <li class="nav-item">
                        <a href="profile.php" class="btn btn-secondary btn-sm nav-link btn1" type="button">
                           <img src="files/profile/<?= $profile_photo ?>" height="20px" width="20px" style="border-radius: 50%;">
                           <?= $name ?>
                        </a>
                     </li>
                  </ul>
               </div>
            </nav>
         </div>
      </header>
      <!-- end header section -->
      <!-- slider section -->
      <section class="slider_section ">
         <div class="slider_bg_box">
            <img src="images/slideback.jpg" alt="">
         </div>
         <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container ">
                     <div class="row">
                        <div class="col-md-7 col-lg-6 ">
                           <div class="detail-box">
                              <h1>
                                 <span>
                                    Find Best
                                 </span>
                                 <br>
                                 Restaurants on Town
                              </h1>
                              <div class="btn-box">
                                 <a href="" class="btn1">
                                    Find Now
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item ">
                  <div class="container ">
                     <div class="row">
                        <div class="col-md-7 col-lg-6 ">
                           <div class="detail-box">
                              <h1>
                                 <span>
                                    Find Best
                                 </span>
                                 <br>
                                 Cuisines
                                 <br>on Town
                              </h1>
                              <div class="btn-box">
                                 <a href="" class="btn1">
                                    Find Cuisine
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container ">
                     <div class="row">
                        <div class="col-md-7 col-lg-6 ">
                           <div class="detail-box">
                              <h1>
                                 <span>
                                    Find All
                                 </span>
                                 <br>
                                 Restaurants Around You
                              </h1>
                              <div class="btn-box">
                                 <a href="" class="btn1">
                                    View All
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container">
               <ol class="carousel-indicators">
                  <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                  <li data-target="#customCarousel1" data-slide-to="1"></li>
                  <li data-target="#customCarousel1" data-slide-to="2"></li>
               </ol>
            </div>
         </div>
      </section>
      <!-- end slider section -->
   </div>



   <!-- product section -->
   <section class="product_section layout_padding">
      <div class="container">
         <div class="heading_container heading_center">
            <h2>
               Recomended <span>Restaurants</span>
            </h2>
         </div>
         <div class="row">

            <?php
            $obj = new Homepage();
            $obj->recomend();
            ?>

            <div class="btn-box">
               <a href="">
                  View All Recomendation
               </a>
            </div>
         </div>
   </section>
   <!-- end product section -->



   <!-- product section -->
   <section class="product_section layout_padding">
      <div class="container">
         <div class="heading_container heading_center">
            <h2>
               Top Rated <span>Restaurants</span>
            </h2>
         </div>
         <div class="row">

            <?php
            $obj = new Homepage();
            $obj->recomend();
            ?>

            <div class="btn-box">
               <a href="">
                  View All Top Restaurants
               </a>
            </div>
         </div>
   </section>
   <!-- end product section -->


   <!-- subscribe section -->
   <section class="subscribe_section">
      <div class="container-fuild">
         <div class="box">
            <div class="row">
               <div class="col-md-6 offset-md-3">
                  <div class="subscribe_form ">
                     <div class="heading_container heading_center">
                        <h3>Subscribe To Get Discount Offers</h3>
                     </div>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                     <form action="">
                        <input type="email" placeholder="Enter your email">
                        <button>
                           subscribe
                        </button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end subscribe section -->
   <!-- client section -->
   <section class="client_section layout_padding">
      <div class="container">
         <div class="heading_container heading_center">
            <h2>
               Customer's Testimonial
            </h2>
         </div>
         <div id="carouselExample3Controls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="box col-lg-10 mx-auto">
                     <div class="img_container">
                        <div class="img-box">
                           <div class="img_box-inner">
                              <img src="images/client.jpg" alt="">
                           </div>
                        </div>
                     </div>
                     <div class="detail-box">
                        <h5>
                           Anna Trevor
                        </h5>
                        <h6>
                           Customer
                        </h6>
                        <p>
                           Dignissimos reprehenderit repellendus nobis error quibusdam? Atque animi sint unde quis reprehenderit, et, perspiciatis, debitis totam est deserunt eius officiis ipsum ducimus ad labore modi voluptatibus accusantium sapiente nam! Quaerat.
                        </p>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="box col-lg-10 mx-auto">
                     <div class="img_container">
                        <div class="img-box">
                           <div class="img_box-inner">
                              <img src="images/client.jpg" alt="">
                           </div>
                        </div>
                     </div>
                     <div class="detail-box">
                        <h5>
                           Anna Trevor
                        </h5>
                        <h6>
                           Customer
                        </h6>
                        <p>
                           Dignissimos reprehenderit repellendus nobis error quibusdam? Atque animi sint unde quis reprehenderit, et, perspiciatis, debitis totam est deserunt eius officiis ipsum ducimus ad labore modi voluptatibus accusantium sapiente nam! Quaerat.
                        </p>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="box col-lg-10 mx-auto">
                     <div class="img_container">
                        <div class="img-box">
                           <div class="img_box-inner">
                              <img src="images/client.jpg" alt="">
                           </div>
                        </div>
                     </div>
                     <div class="detail-box">
                        <h5>
                           Anna Trevor
                        </h5>
                        <h6>
                           Customer
                        </h6>
                        <p>
                           Dignissimos reprehenderit repellendus nobis error quibusdam? Atque animi sint unde quis reprehenderit, et, perspiciatis, debitis totam est deserunt eius officiis ipsum ducimus ad labore modi voluptatibus accusantium sapiente nam! Quaerat.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel_btn_box">
               <a class="carousel-control-prev" href="#carouselExample3Controls" role="button" data-slide="prev">
                  <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                  <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselExample3Controls" role="button" data-slide="next">
                  <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                  <span class="sr-only">Next</span>
               </a>
            </div>
         </div>
      </div>
   </section>
   <!-- end client section -->
   <!-- footer start -->
   <footer>
      <div class="container">
         <div class="row">
            <div class="col-md-4">
               <div class="full">
                  <div class="logo_footer">
                     <a href="#"><img width="210" src="images/logo.png" alt="#" /></a>
                  </div>
                  <div class="information_f">
                     <p><strong>ADDRESS:</strong> 28 White tower, Street Name New York City, USA</p>
                     <p><strong>TELEPHONE:</strong> +91 987 654 3210</p>
                     <p><strong>EMAIL:</strong> yourmain@gmail.com</p>
                  </div>
               </div>
            </div>
            <div class="col-md-8">
               <div class="row">
                  <div class="col-md-7">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="widget_menu">
                              <h3>Menu</h3>
                              <ul>
                                 <li><a href="#">Home</a></li>
                                 <li><a href="#">About</a></li>
                                 <li><a href="#">Services</a></li>
                                 <li><a href="#">Testimonial</a></li>
                                 <li><a href="#">Blog</a></li>
                                 <li><a href="#">Contact</a></li>
                              </ul>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="widget_menu">
                              <h3>Account</h3>
                              <ul>
                                 <li><a href="#">Account</a></li>
                                 <li><a href="#">Checkout</a></li>
                                 <li><a href="#">Login</a></li>
                                 <li><a href="#">Register</a></li>
                                 <li><a href="#">Shopping</a></li>
                                 <li><a href="#">Widget</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-5">
                     <div class="widget_menu">
                        <h3>Newsletter</h3>
                        <div class="information_f">
                           <p>Subscribe by our newsletter and get update protidin.</p>
                        </div>
                        <div class="form_sub">
                           <form>
                              <fieldset>
                                 <div class="field">
                                    <input type="email" placeholder="Enter Your Mail" name="email" />
                                    <input type="submit" value="Subscribe" />
                                 </div>
                              </fieldset>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <!-- footer end -->
   <div class="cpy_">
      <p>© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a></p>
   </div>
   <!-- jQery -->
   <script src="js/jquery-3.4.1.min.js"></script>
   <!-- popper js -->
   <script src="js/popper.min.js"></script>
   <!-- bootstrap js -->
   <script src="js/bootstrap.js"></script>
   <!-- custom js -->
   <script src="js/custom.js"></script>
</body>

</html>