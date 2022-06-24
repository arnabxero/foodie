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


function get_user_details($uid)
{
   include('include/connection.php');

   $sql_user_details = "SELECT * FROM users WHERE id = '$uid'";
   $res = mysqli_query($con, $sql_user_details);
   $row = mysqli_fetch_array($res);

   return $row;
}

$rest_id = $_GET['id'];

$sql = "SELECT * FROM restaurants WHERE id = '$rest_id'";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_array($res);

$cover_photo_link = $row['pro_pic'];
$rest_name = $row['name'];
$phone = $row['phone'];
$email = $row['email'];
$address = $row['address'];
$details = $row['details'];
$map_lat = $row['map_lat'];
$map_lng = $row['map_lng'];

$owner_btn_vis = "display:none;";

$owner_id = $row['owner_id'];

if ($owner_id == $id) {
   $owner_btn_vis = "";
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
   <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

</head>

<style>
   #map {
      height: 400px;
      width: 50%;
   }
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
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="all.php">All</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="blog.php">Blog</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
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
            <img src="files/rest_dp/<?= $cover_photo_link ?>" alt="">
         </div>

         <div class="container ">
            <div class="detail-box" style="background-color:aliceblue; text-align:center;">
               <h1>
                  <span>
                     <?= $rest_name ?>
                  </span>
                  <hr>
                  <span>

                     <i class="fa fa-star"></i>
                     <i class="fa fa-star"></i>
                     <i class="fa fa-star"></i>
                     <i class="fa fa-star"></i>
                  </span>

                  <i class="fa fa-star-o"></i>

               </h1>

            </div>
         </div>
      </section>
      <!-- end slider section -->
   </div>



   <!-- product section -->
   <section class="product_section layout_padding">
      <div class="container">
         <div class="heading_container heading_center">
            <h3>
               <?= $rest_name ?>
            </h3>
         </div>
         <div class="row">
            <div class="col-sm-6">
               <div style="text-align:center;">
                  <h6>Phone: <?= $phone ?></h6>
                  <h6>Email: <?= $email ?></h6>
                  <h6>Address: <?= $address ?></h6>
               </div>
            </div>

            <div class="col-sm-6">
               <div style="text-align:center;">
                  <h5>About</h5>
                  <p><?= $details ?></p>
               </div>
            </div>



            <div class="btn-box">
               <a href="tel:<?= $phone ?>">
                  Contact Restaurant
               </a>
            </div>
            <div style="margin-left:100px; <?= $owner_btn_vis ?>">
               <div class="btn-box">
                  <a href="update_restaurant.php?id=<?= $rest_id ?>">
                     Edit Info
                  </a>
               </div>
            </div>
         </div>
   </section>
   <!-- end product section -->


   <section style="margin-left:500px;">
      <h1>Map Location</h1>
      <div id="map"></div>
      <a target="_blank" href="https://maps.google.com/?q=<?= $map_lat ?>,<?= $map_lng ?>"><button class="btn1">Open In Google Maps</button></a>

   </section>

   <script>
      // Initialize and add the map
      function initMap() {
         // The location of Uluru
         const uluru = {
            lat: <?= $map_lat ?>,
            lng: <?= $map_lng ?>
         };
         // The map, centered at Uluru
         const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 17,
            center: uluru,
         });
         // The marker, positioned at Uluru
         const marker = new google.maps.Marker({
            position: uluru,
            map: map,
         });
      }

      window.initMap = initMap;
   </script>

   <section class="subscribe_section">
      <div class="container-fuild">
         <div class="box" style="background-color: white; padding-top: 0px;">
            <div class="row">
               <div class="col-md-6 offset-md-3">
                  <div class="subscribe_form ">
                     <form>
                        <button id="toggle" type="button">
                           View All Reviews!
                        </button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>



   <!-- subscribe section -->
   <div class="cdp-form" id="upl" style="display: none;">
      <section class="subscribe_section">
         <div class="container-fuild">
            <div class="box">


               <h1>All Reviews</h1>

               <?php
               $post_id = '7';

               $cmnt_sql = "SELECT * FROM comments WHERE post_id = '$post_id' ORDER BY id DESC";
               $cmnt_res = mysqli_query($con, $cmnt_sql);

               while ($row = mysqli_fetch_assoc($cmnt_res)) {

                  $user_row = get_user_details($row['user_id']);
                  $comment = $row['content'];
                  $time = $row['time'];
                  $user_name = $user_row['first_name'] . " " . $user_row['last_name'];

                  $cmnt_edit_btn = "display: none;";
                  if ($_SESSION['logid'] == $row['user_id']) {
                     $cmnt_edit_btn = "";
                  }
                  echo '
                    <div class="col-md-6 offset-md-3" style="margin-top: 10px; margin-bottom:10px; border: 1px solid black; background-color:aliceblue; color:black; padding:15px; border-radius:15px;">
                        <div class="subscribe_form ">
                            <div class="heading_container heading_center">
                                <a href="view_profile.php?id=' . $row['user_id'] . '">
                                <h4>' . $user_name . '</h4>
                                </a>
                                <p style="font-style:italic; font-size: 10px;">' . $time . '</p>
                            </div>
                            <div style="' . $cmnt_edit_btn . '  font-size: 10px;">
                            <hr>
                                <a href="subdir/edit_comment.php?id=' . $row['id'] . '" class="blog-edit-a">Edit</a>
                                <a href="subdir/delete_comment.php?id=' . $row['id'] . '" class="blog-edit-a">Delete</a>
                            </div>
                            <hr>
                            <p>' . $comment . '</p>
                        </div>
                    </div>
                    ';
               }
               ?>
            </div>
         </div>
      </section>
   </div>



   <script>
      const targetDiv = document.getElementById("upl");
      const btn = document.getElementById("toggle");
      btn.onclick = function() {
         if (targetDiv.style.display !== "none") {
            targetDiv.style.display = "none";
         } else {
            targetDiv.style.display = "block";
         }
      };
   </script>
   <!-- end subscribe section -->




   <script>
      function showVal(newVal) {
         document.getElementById("showrate").innerHTML = "Rating: " + newVal + ' <i class="fa fa-star" style="color: #ffc000;"></i>';
      }
   </script>

   <!-- subscribe section -->
   <section class="subscribe_section">
      <div class="container-fuild">
         <div class="box">
            <div class="row">
               <div class="col-md-6 offset-md-3">
                  <div class="subscribe_form ">
                     <div class="heading_container heading_center">
                        <h3>Review</h3>
                     </div>
                     <p>Write your review & rate this restaurant!</p>
                     <form action="subdir/comment_now.php" method="POST">
                        <input type="hidden" name="post_id" value="<?= $post_id ?>" />
                        <input type="hidden" name="user_id" value="<?= $id ?>" />


                        <h1 id="showrate">0</h1>
                        <input type="range" id="rate" name="rate" min="0" max="5" value="0" step="0.5" onchange="showVal(this.value)">

                        <textarea name="content" class="one textbox" rows="10" cols="90" placeholder="Write your comment..."></textarea><br>

                        <button type="button" class="emoji-btn"><i class="fas fa-grin"></i> Insert Emojies <i class="fas fa-grin-beam"></i></button>

                        <input type="submit" style="color: black; text-align:center;" value="Comment Now">
                     </form>

                  </div>
               </div>

            </div>
            <hr>

         </div>
      </div>
   </section>
   <!-- end subscribe section -->

   <script src="assets/emoji/vanillaEmojiPicker.js"></script>
   <script>
      new EmojiPicker({
         trigger: [{
            selector: '.emoji-btn',
            insertInto: ['.one', '.two']
         }],
         closeButton: true,
      });
   </script>



   <!-- subscribe section -->
   <section class="subscribe_section">
      <div class="container-fuild">
         <div class="box">
            <div class="row">
               <div class="col-md-6 offset-md-3">
                  <div class="subscribe_form ">
                     <div class="heading_container heading_center">
                        <h3>Subscribe To Get Coupons and News</h3>
                     </div>
                     <p>Keep updated with restaurant opening events news, food reviews, recipes, party centers and many more!</p>
                     <form action="subdir/subscribe.php" method="post">
                        <input type="email" name="email" placeholder="Enter your email">
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


   <!-- footer start -->
   <footer>
      <div class="container">
         <div class="row">
            <div class="col-md-4">
               <div class="full">
                  <div class="logo_footer">
                     <a href="index.php"><img width="210" src="files/icons/foodie.gif" alt="Foodie" /></a>
                  </div>
                  <div class="information_f">
                     <p><strong>ADDRESS:</strong> 59, Lane - 7, Housing Estate, Amberkhana, Sylhet, Bangladesh</p>
                     <p><strong>PHONE:</strong> +880 1926 496967</p>
                     <p><strong>EMAIL:</strong> arnab.xero@gmail.com</p>
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
                                 <li><a href="index.php">Home</a></li>
                                 <li><a href="all.php">All</a></li>
                                 <li><a href="blog.php">Blog</a></li>
                                 <li><a href="contact.php">Contact</a></li>
                              </ul>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="widget_menu">
                              <h3>Account</h3>
                              <ul>
                                 <li><a href="profile.php">Account</a></li>
                                 <li><a href="recover.php">Recovery</a></li>
                                 <li><a href="login.php">Login</a></li>
                                 <li><a href="signup.php">Register</a></li>
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
      <p>© 2022 All Rights Reserved By <a target="_blank" href="https://arnabxero.github.io">Arnab & Swadhin</a></p>
   </div>
   <!-- jQery -->
   <script src="js/jquery-3.4.1.min.js"></script>
   <!-- popper js -->
   <script src="js/popper.min.js"></script>
   <!-- bootstrap js -->
   <script src="js/bootstrap.js"></script>
   <!-- custom js -->
   <script src="js/custom.js"></script>

   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUUoZJ6e4Wlwp6S7X8JojEEXHtaCe4hlI&callback=initMap&v=weekly" defer></script>

</body>

</html>