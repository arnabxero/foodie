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

function show_star($stars)
{
   $star_icon = '<i class="fa fa-star-o"></i>';

   if ($stars == 0) {
      $star_icon = '<i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
   } else if ($stars == 1) {
      $star_icon = '<i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
   } else if ($stars == 2) {
      $star_icon = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
   } else if ($stars == 3) {
      $star_icon = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
   } else if ($stars == 4) {
      $star_icon = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>';
   } else if ($stars == 5) {
      $star_icon = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
   }
   return $star_icon;
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

                     <?php
                     $rev_sql = "SELECT * FROM reviews WHERE rest_id = '$rest_id'";
                     $rev_res = mysqli_query($con, $rev_sql);
                     $total_reviews = mysqli_num_rows($rev_res);
                     $avg_rate = 0;

                     while ($rev_row = mysqli_fetch_assoc($rev_res)) {
                        $avg_rate = $avg_rate + $rev_row['rate'];
                     }
                     if ($total_reviews > 0) {
                        $avg_rate = $avg_rate / $total_reviews;
                     }

                     $floored_rate = number_format($avg_rate, 0);
                     echo show_star($floored_rate);

                     ?>
                  </span>


               </h1>

            </div>
         </div>
      </section>
      <!-- end slider section -->
   </div>


   <?php
   $rev_sql = "SELECT * FROM reviews WHERE rest_id = '$rest_id'";
   $rev_res = mysqli_query($con, $rev_sql);
   $total_reviews = mysqli_num_rows($rev_res);
   $avg_rate = 0;

   while ($rev_row = mysqli_fetch_assoc($rev_res)) {
      $avg_rate = $avg_rate + $rev_row['rate'];
   }
   if ($total_reviews > 0) {
      $avg_rate = $avg_rate / $total_reviews;
   }

   ?>

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
                  <h6><strong>Total Reviews: <?= $total_reviews ?></strong></h6>
                  <h6><strong>Average Rating: <?= number_format($avg_rate, 1) ?> <i class="fa fa-star"></i></strong></h6>
                  <hr>
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
                        <button id="toggle2" type="button">
                           View The Menu <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
                        </button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>



   <!-- subscribe section -->
   <div class="cdp-form" id="upl2" style="display: none;">
      <section class="subscribe_section">
         <div class="container-fuild">
            <div class="box">


               <h1>All Menu</h1>

               <?php

               function check_restaurant_owner($rest_id)
               {
                  include('include/connection.php');

                  $sql = "SELECT * FROM restaurants WHERE id = '$rest_id'";
                  $res = mysqli_query($con, $sql);
                  $row = mysqli_fetch_array($res);

                  return $row['owner_id'];
               }
               $cmnt_sql = "SELECT * FROM menu WHERE rest_id = '$rest_id' ORDER BY id DESC";
               $cmnt_res = mysqli_query($con, $cmnt_sql);

               if ($total_reviews == 0) {
                  echo '<h3>No Items Yet</h3>';
               }
               while ($row = mysqli_fetch_assoc($cmnt_res)) {

                  $menu_name = $row['name'];
                  $menu_price = $row['price'];

                  $menu_edit_btn = "display: none;";
                  if ($_SESSION['logid'] == check_restaurant_owner($rest_id)) {
                     $menu_edit_btn = "";
                  }
                  echo '
                    <div class="col-md-12" style="  box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-top: 10px; margin-bottom:10px; border: 0px solid black; background-color:white; color:black; padding:15px; border-radius:5px;">
                        <div class="subscribe_form ">
                            <div class="heading_container heading_center">
                                <h4>' . $menu_name . '</h4>
                            </div>
                            <hr>
                            <p>' . $menu_price . '</p>
                            <div style="' . $menu_edit_btn . '  font-size: 10px;">
                            <hr>
                                <a href="update_menu.php?id=' . $row['id'] . '" class="blog-edit-a">Edit</a>
                                <a href="delete_menu.php?id=' . $row['id'] . '" class="blog-edit-a">Delete</a>
                            </div>
                  
                            
                        </div>
                    </div>
                    ';
               }
               ?>
            </div>
         </div>
      </section>
   </div>

   <?php
   $add_menu_btn = "display: none;";
   if ($_SESSION['logid'] == check_restaurant_owner($rest_id)) {
      $add_menu_btn = "";
   }
   ?>

   <div style="<?= $add_menu_btn ?>">
      <section class="subscribe_section">
         <div class="container-fuild">
            <div class="box" style="background-color: white; padding-top: 0px;">
               <div class="row">
                  <div class="col-md-6 offset-md-3">
                     <div class="subscribe_form ">
                        <form>
                           <button id="toggle3" type="button">
                              Add Menu Item <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
                           </button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>

   <!-- subscribe section -->
   <div class="cdp-form" id="upl3" style="display: none;">
      <section class="subscribe_section">
         <div class="container-fuild">
            <div class="box">


               <h1>Add New Menu Item</h1>
               <hr>

               <script>
                  if (window.history.replaceState) {
                     window.history.replaceState(null, null, window.location.href);
                  }
               </script>

               <?php
               if (isset($_POST['menu_submit'])) {
                  $menu_rest_id = $_POST['rest_id'];
                  $menu_item_name = $_POST['item_name'];
                  $menu_item_price = $_POST['item_price'];

                  $sql = "INSERT INTO `menu` (`rest_id`, `name`, `price`) VALUES ('$menu_rest_id', '$menu_item_name', '$menu_item_price')";
                  $res = mysqli_query($con, $sql);
               }
               ?>

               <form method="POST">
                  <fieldset>
                     <input type="hidden" value="<?= $rest_id ?>" name="rest_id" />
                     <h4>Menu Item Name</h4>
                     <input type="text" placeholder="Enter Item Name" name="item_name" required />
                     <h4>Price </h4>
                     <input type="text" placeholder="Enter Price" name="item_price" id="showrate2" required />
                     <input type="range" id="rate" name="rate" min="0" max="5000" value="0" step="1" onchange="showVal2(this.value)">

                     <input type="submit" name="menu_submit" value="Add Item To The Menu" />
                  </fieldset>
               </form>

            </div>
         </div>
      </section>
   </div>

   <script>
      function showVal2(newVal) {
         document.getElementById("showrate2").value = newVal + ' BDT';
      }
   </script>




   <section class="subscribe_section">
      <div class="container-fuild">
         <div class="box" style="background-color: white; padding-top: 0px;">
            <div class="row">
               <div class="col-md-6 offset-md-3">
                  <div class="subscribe_form ">
                     <form>
                        <button id="toggle" type="button">
                           View All Reviews <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
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

               $cmnt_sql = "SELECT * FROM reviews WHERE rest_id = '$rest_id' ORDER BY id DESC";
               $cmnt_res = mysqli_query($con, $cmnt_sql);

               if ($total_reviews == 0) {
                  echo '<h3>No Reviews Yet</h3>';
               }
               while ($row = mysqli_fetch_assoc($cmnt_res)) {

                  $user_row = get_user_details($row['user_id']);
                  $comment = $row['review'];
                  $time = $row['time'];
                  $user_name = $user_row['first_name'] . " " . $user_row['last_name'];

                  $cmnt_edit_btn = "display: none;";
                  if ($_SESSION['logid'] == $row['user_id']) {
                     $cmnt_edit_btn = "";
                  }
                  echo '
                    <div class="col-md-6 offset-md-3" style="  box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-top: 10px; margin-bottom:10px; border: 0px solid black; background-color:white; color:black; padding:15px; border-radius:15px;">
                        <div class="subscribe_form ">
                            <div class="heading_container heading_center">
                                <a href="view_profile.php?id=' . $row['user_id'] . '">
                                <h4>' . $user_name . '</h4>
                                </a>
                                <p style="font-style:italic; font-size: 10px;">' . $time . '</p>
                            </div>
                            <div style="' . $cmnt_edit_btn . '  font-size: 10px;">
                            <hr>
                                <a href="edit_review.php?id=' . $row['id'] . '" class="blog-edit-a">Edit</a>
                                <a href="delete_review.php?id=' . $row['id'] . '" class="blog-edit-a">Delete</a>
                            </div>
                            <hr>
                            <p>Rated: ' . $row['rate'] . ' ' . show_star($row['rate']) . '</p>
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
            btn.innerHTML = 'View All Reviews <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>';
         } else {
            targetDiv.style.display = "block";
            btn.innerHTML = 'View All Reviews <i class="fa fa-chevron-circle-up" aria-hidden="true"></i>';
         }
      };
   </script>



   <script>
      const targetDiv2 = document.getElementById("upl2");
      const btn2 = document.getElementById("toggle2");
      btn2.onclick = function() {
         if (targetDiv2.style.display !== "none") {
            targetDiv2.style.display = "none";
            btn2.innerHTML = 'View The Menu <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>';

         } else {
            targetDiv2.style.display = "block";
            btn2.innerHTML = 'View The Menu <i class="fa fa-chevron-circle-up" aria-hidden="true"></i>';

         }
      };
   </script>



   <script>
      const targetDiv3 = document.getElementById("upl3");
      const btn3 = document.getElementById("toggle3");
      btn3.onclick = function() {
         if (targetDiv3.style.display !== "none") {
            targetDiv3.style.display = "none";
            btn3.innerHTML = 'Add Menu Item <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>';

         } else {
            targetDiv3.style.display = "block";
            btn3.innerHTML = 'Add Menu Item <i class="fa fa-chevron-circle-up" aria-hidden="true"></i>';

         }
      };
   </script>
   <!-- end subscribe section -->




   <script>
      function showVal(newVal) {
         document.getElementById("showrate").innerHTML = "Rating: " + newVal + ' <i class="fa fa-star" style="color: #4d4814;"></i>';
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
                     <form action="subdir/review_sub.php" method="POST">
                        <input type="hidden" name="rest_id" value="<?= $_GET['id'] ?>" />
                        <input type="hidden" name="user_id" value="<?= $_SESSION['logid'] ?>" />


                        <h1 id="showrate">0</h1>
                        <input type="range" id="rate" name="rate" min="0" max="5" value="0" step="1" onchange="showVal(this.value)">

                        <textarea name="content" class="one textbox" rows="10" cols="90" placeholder="Write your review..."></textarea><br>

                        <button type="button" class="emoji-btn"><i class="fas fa-grin"></i> Insert Emojies <i class="fas fa-grin-beam"></i></button>

                        <input type="submit" style="color: black; text-align:center;" value="Submit Review">
                     </form>

                  </div>
               </div>

            </div>

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