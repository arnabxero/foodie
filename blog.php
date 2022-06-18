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

class Homepage
{
    function recomend()
    {
        include('include/connection.php');
        $sql = "SELECT * FROM restaurants";
        $res = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_assoc($res)) {

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
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="all.php">All</a>
                        </li>
                        <li class="nav-item active">
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

    <!-- subscribe section -->
    <section class="subscribe_section">
        <div class="container-fuild">
            <div class="box">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="subscribe_form ">
                            <div class="heading_container heading_center">
                                <h3>Hello, <?= $name ?></h3>
                            </div>
                            <p>Write your opinion on any restaurant, food or culture!</p>
                            <form action="create_post.php">
                                <input type="submit" style="color: black; text-align:center;" value="Whats on your mind? Post Now!">
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
                    Latest Blog Posts
                </h2>
            </div>
            <div id="carouselExample3Controls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                    <?php

                    $active = "";
                    $i = 5;


                    $post_sql = "SELECT * FROM posts ORDER BY id DESC";
                    $post_res = mysqli_query($con, $post_sql);

                    while ($i > 0) {
                        if ($i == 5) {
                            $active = "active";
                        } else {
                            $active = "";
                        }

                        $post_row = mysqli_fetch_assoc($post_res);
                        $user_id = $post_row['user_id'];
                        $content = $post_row['post'];
                        if (strlen($content) > 300) {
                            $content = substr($content, 0, 300);
                        }
                        $user_details_row = get_user_details($user_id);
                        $user_photo = "files/profile/" . $user_details_row['pro_pic'];
                        $user_name = $user_details_row['first_name'] . " " . $user_details_row['last_name'];



                        echo '
                            <div class="carousel-item ' . $active . '">
                                <div class="box col-lg-10 mx-auto">
                                    <div class="img_container">
                                        <div class="img-box">
                                            <div class="img_box-inner">
                                                <img src="' . $user_photo . '" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            ' . $user_name . '
                                        </h5>
                                        <h6>
                                            User
                                        </h6>
                                        <p>
                                            ' . $content . '
                                        </p>
                                    </div>
                                </div>
                            </div>';
                        $i--;
                    }


                    ?>


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


    <!-- product section -->
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    All <span>Posts</span>
                </h2>
            </div>
            <div class="row">



                <?php


                $all_post_sql = "SELECT * FROM posts ORDER BY id DESC";
                $all_post_res = mysqli_query($con, $all_post_sql);

                while ($all_post_row = mysqli_fetch_assoc($all_post_res)) {
                    $all_poster_id = $all_post_row['user_id'];
                    $all_user_details_row = get_user_details($all_poster_id);
                    $all_username = $all_user_details_row['first_name'];

                    $date_time = $all_post_row['date_time'];
                    $content = $all_post_row['post'];
                    if (strlen($content) > 330) {
                        $content = substr($content, 0, 330);
                    }
                    $title = $all_post_row['title'];
                    if (strlen($title) > 33) {
                        $title = substr($title, 0, 33);
                    }
                    $post_id = $all_post_row['id'];

                    echo '
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="box">
                                <div class="option_container">
                                    <div class="options">
                                        <a href="view_post.php?id=' . $post_id . '" class="option2">
                                            View Post
                                        </a>
                                    </div>
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        ' . $all_username . '
                                    </h5>
                                    <h6>
                                        ' . $date_time . '
                                    </h6>
                                </div>

                                <hr>
                                <h6><strong>' . $title . '</strong></h6>
                                <hr>

                                <div style="text-align:justify;">
                                    <p>
                                        ' . $content . '
                                    </p>
                                </div>
                            </div>
                        </div>
                    ';
                }

                ?>


                <!--<div class="btn-box">
                    <a href="">
                        View All Recomendation
                    </a>
                </div>-->
            </div>
    </section>
    <!-- end product section -->


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
</body>

</html>