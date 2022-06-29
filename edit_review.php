<?php
include('include/connection.php');
session_start();

if (!isset($_SESSION['logid'])) {
    header('Location: login.php');
}

$review_id = $_GET['id'];

$sql = "SELECT * FROM reviews WHERE id = '$review_id'";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_array($res);

$rate = $row['rate'];
$content = $row['review'];




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
    <title>Review Editing...</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
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
                        <h3>Update Your Review</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end inner page section -->

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
                                <form action="subdir/update_review_sub.php" method="POST">
                                    <input type="hidden" name="review_id" value="<?= $_GET['id'] ?>" />


                                    <h1 id="showrate">Rating: <?= $rate ?> <i class="fa fa-star" style="color: #4d4814;"></i></h1>
                                    <input type="range" id="rate" name="rate" min="0" max="5" value="<?= $rate ?>" step="1" onchange="showVal(this.value)">

                                    <textarea name="content" class="one textbox" rows="10" cols="90" placeholder="Write your review..."><?= $content ?></textarea><br>

                                    <button type="button" class="emoji-btn"><i class="fas fa-grin"></i> Insert Emojies <i class="fas fa-grin-beam"></i></button>

                                    <input type="submit" style="color: black; text-align:center;" value="Update Review">
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