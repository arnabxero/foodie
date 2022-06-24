<?php
include('include/connection.php');
session_start();

if (!(isset($_SESSION['logid']))) {
    header('Location: login.php');
}

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
    <link href="css/styles.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />


    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUUoZJ6e4Wlwp6S7X8JojEEXHtaCe4hlI"></script>
    <script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>
    <style type="text/css">
        #map {
            width: 100%;
            height: 200px;
        }
    </style>
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
                        <li class="nav-item active">
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
    <!-- inner page section -->
    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <h3>Enlist Your Restaurant Now</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end inner page section -->
    <!-- why section -->
    <section class="why_section layout_padding">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="full">
                        <form action="subdir/add_rest_now.php" method="POST" enctype="multipart/form-data">
                            <fieldset>
                                <label>Restaurant Name</label>
                                <input type="text" placeholder="Enter Restaurant Name" name="name" required />
                                <label>Restaurant Phone Number</label>
                                <input type="text" placeholder="Enter Restaurant Phone Number" name="phone" required />
                                <label>Restaurant Email Address</label>
                                <input type="email" placeholder="Enter Restaurant Email Address" name="email" required />
                                <label>Address</label>
                                <textarea class="post-content-area" name="address" cols="50" rows="5" placeholder="Enter Your Restaurant Address!" required></textarea>
                                <br>
                                <label>Details</label>
                                <textarea class="post-content-area" name="details" cols="50" rows="10" placeholder="Enter Your Restaurant Details!" required></textarea>
                                <br>
                                <div class="up-file-dp">
                                    <label>Add Your restaurant's Cover Photo</label>
                                    <input type="file" name="image" required />
                                </div>

                                <div id="map"></div>

                                <br>
                                <button type="button" id="confirmPosition">Confirm Position</button>
                                <br>
                                <p>Pointed Location: <span id="onIdlePositionView"></span></p>
                                <p>Choosen Location: <span id="onClickPositionView">None</span></p>

                                <input placeholder="Map Lattitude" value="" id="input_map_lat" name="map_lat" />

                                <input placeholder="Map Longitude" value="" id="input_map_lng" name="map_lng" />

                                <script>
                                    var confirmBtn = document.getElementById('confirmPosition');
                                    var onClickPositionView = document.getElementById('onClickPositionView');
                                    var onIdlePositionView = document.getElementById('onIdlePositionView');

                                    var lp = new locationPicker('map', {
                                        setCurrentPosition: true,
                                    }, {
                                        zoom: 15
                                    });

                                    confirmBtn.onclick = function() {
                                        var location = lp.getMarkerPosition();
                                        onClickPositionView.innerHTML = location.lat + ',' + location.lng;
                                        document.getElementById("input_map_lat").value = location.lat;
                                        document.getElementById("input_map_lng").value = location.lng;
                                    };

                                    google.maps.event.addListener(lp.map, 'idle', function(event) {
                                        var location = lp.getMarkerPosition();
                                        onIdlePositionView.innerHTML = location.lat + ',' + location.lng;
                                    });
                                </script>



                                <br>
                                <input type="submit" value="Submit" name="submit" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- end why section -->



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