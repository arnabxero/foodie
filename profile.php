<?php
include('include/connection.php');
include('subdir/profile_backend.php');

session_start();

$id = -99;
$tab_active_1 = "";
$tab_active_2 = "";
$tab_active_3 = "";

$admin_btn_disp = "display: none;";

if (!(isset($_SESSION['logid']))) {
    header('Location: login.php');
} else {
    $id = $_SESSION['logid'];
}


if ($_SESSION['rank'] == 'admin') {
    $admin_btn_disp = "";
}

if (isset($_GET['show'])) {
    if ($_GET['show'] == 'postlist') {
        $tab_active_1 = "-active";
    } else if ($_GET['show'] == 'reviews') {
        $tab_active_2 = "-active";
    } else if ($_GET['show'] == 'restaurants') {
        $tab_active_3 = "-active";
    } else {
        $tab_active_1 = "-active";
    }
} else {
    $tab_active_1 = "-active";
}

$first_name = "Not Found";
$last_name = "Not Found";
$username = "Not Found";
$address = "Not Found";
$email = "Not Found";
$phone = "Not Found";
$join_date = "None";
$posts = "0";
$reviews = "0";
$restaurants = "0";

$dp_dialog = "";

$twitter = "Not Set";
$fb = "Not Set";
$instagram = "Not Set";

$sql = "SELECT * FROM users WHERE id = '$id'";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_array($res);

$first_name = $row['first_name'];
$last_name = $row['last_name'];
$username = $row['userName'];
$address = $row['address'];
$email = $row['email'];
$phone = $row['phone'];
$join_date = $row['join_date'];
$posts = $row['posts'];
$reviews = $row['reviews'];
$restaurants = $row['restaurants'];

$twitter = $row['twitter'];
$fb = $row['fb'];
$instagram = $row['instagram'];



function push_profile_photo_string_to_db($get_id, $get_id_str)
{
    include('include/connection.php');

    $psql = "UPDATE users SET pro_pic = '$get_id_str' WHERE id = '$get_id'";

    $res = mysqli_query($con, $psql);

    if ($res) {
        $dp_dialog = "<p style='Color: red; font-weight: bold;'>Profile Picture Upload Failed</p>";
    } else {
        $dp_dialog = "<p style='Color: red; font-weight: bold;'>Profile Picture Upload Failed</p>";
    }
}

if (isset($_FILES['image'])) {

    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    $new_file_name = $_SESSION['logid'] . '.jpg';

    $hold_tmp = explode('.', $_FILES['image']['name']);

    $file_ext = strtolower(end($hold_tmp));

    $extensions = array("jpeg", "jpg", "png");

    push_profile_photo_string_to_db($id, $new_file_name);

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        $dp_dialog = "<p style='Color: red; font-weight: bold;'>extension not allowed, please choose a JPEG or PNG file.</p>";
    }

    if ($file_size > 2097152) {
        $errors[] = 'File size must be excately 2 MB';
        $dp_dialog = '<p style="Color: red; font-weight: bold;">File size must be excately 2 MB</p>';
    }

    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "files/profile/" . $new_file_name);
        $dp_dialog = "<p style='Color: green; font-weight: bold;'>Profile Picture Updated</p>";
    } else {
        $dp_dialog = $dp_dialog . "<p style='Color: red; font-weight: bold;'>Profile Picture Upload Failed</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/third_party_styles_profile.css?v=<?php echo time(); ?>">

    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        body {
            background-image: url("files/backgrounds/profile.jpg");
        }
    </style>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container bootstrap snippets bootdeys">
        <div class="row" id="user-profile">
            <div class="col-lg-3 col-md-4 col-sm-4">
                <div class="main-box clearfix" style="background-color: rgba(255, 255, 255, 0.8);">
                    <div style="text-align:center;">
                        <a href="index.php">
                            <img src="files/icons/foodie.gif" height="50px" width="170px" style="margin-bottom: 10px;">
                        </a>
                    </div>
                    <hr>
                    <h2><?= $first_name . ' ' . $last_name ?></h2>
                    <!-- <div class="profile-status">
                        <i class="fa fa-check-circle"></i> Online
                    </div> -->
                    <img src="files/profile/<?= $row['pro_pic'] ?>" alt="" class="profile-img img-responsive center-block">
                    <div style="text-align: center;">
                        <?= $dp_dialog ?>

                        <button class="btn btn-primary edit-profile pink-btn" id="toggle">Change DP <i class="fas fa-caret-square-down"></i></button>
                        <div class="cdp-form" id="upl" style="display: none;">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input class="up-file-dp" type="file" name="image" />
                                <input class="up-file-btn" type="submit" name="submit" value="Change Profile Photo" />
                            </form>
                        </div>
                        <br>

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
                    </div>

                    <!-- <div class="profile-stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <span>Super User</span>
                    </div> -->

                    <br>
                    <div class="profile-since">
                        Member since: <?= $join_date ?>
                    </div>

                    <div class="profile-details">
                        <ul class="fa-ul">
                            <li><i class="fa-li fa fa-star"></i>Reviews: <span><?= $posts ?></span></li>
                            <li><i class="fa-li fa fa-comment"></i>Posts: <span><?= $reviews ?></span></li>
                            <li><i class="fa-li fa fa-tasks"></i>Restaurants: <span><?= $restaurants ?></span></li>
                        </ul>
                    </div>

                    <div class="profile-message-btn center-block text-center">
                        <a href="subdir/logout.php" class="btn btn-danger">
                            <i class="fa fa-envelope"></i> Log Out
                        </a>
                    </div>
                    <div class="profile-message-btn center-block text-center" style="<?= $admin_btn_disp ?>">
                        <br>
                        <a href="admin/index.php" class="btn btn-danger">
                            <i class="fa fa-gear"></i> Admin Panel
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-8 col-sm-8">
                <div class="main-box clearfix" style="background-color: rgba(255, 255, 255, 0.8);">
                    <div class="profile-header">
                        <h3><span>User info</span></h3>
                        <a href="edit_profile.php" class="btn btn-primary edit-profile pink-btn">
                            <i class="fa fa-pencil-square fa-lg"></i> Edit profile
                        </a>
                    </div>


                    <div class="row profile-user-info">
                        <div class="col-sm-8">
                            <div class="profile-user-details clearfix">
                                <div class="profile-user-details-label">
                                    First Name
                                </div>
                                <div class="profile-user-details-value">
                                    <?= $first_name ?>
                                </div>
                            </div>
                            <div class="profile-user-details clearfix">
                                <div class="profile-user-details-label">
                                    Last Name
                                </div>
                                <div class="profile-user-details-value">
                                    <?= $last_name ?>
                                </div>
                            </div>
                            <div class="profile-user-details clearfix">
                                <div class="profile-user-details-label">
                                    Address
                                </div>
                                <div class="profile-user-details-value">
                                    <?= $address ?>
                                </div>
                            </div>
                            <div class="profile-user-details clearfix">
                                <div class="profile-user-details-label">
                                    Email
                                </div>
                                <div class="profile-user-details-value">
                                    <?= $email ?>
                                </div>
                            </div>
                            <div class="profile-user-details clearfix">
                                <div class="profile-user-details-label">
                                    Phone number
                                </div>
                                <div class="profile-user-details-value">
                                    <?= $phone ?>
                                </div>
                            </div>
                            <div class="profile-user-details clearfix">
                                <div class="profile-user-details-label">
                                    Username
                                </div>
                                <div class="profile-user-details-value">
                                    <?= $username ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 profile-social">
                            <ul class="fa-ul">
                                <li><i class="fa-li fa fa-twitter-square"></i><a href="https://www.twitter.com/<?= $twitter ?>"><?= $twitter ?></a></li>
                                <li><i class="fa-li fa fa-facebook-square"></i><a href="https://www.facebook.com/<?= $fb ?>"><?= $fb ?></a></li>
                                <li><i class="fa-li fa fa-instagram"></i><a href="https://www.instagram.com/<?= $instagram ?>"><?= $instagram ?></a></li>
                            </ul>
                        </div>
                    </div>

                    <hr>

                    <div style="padding-bottom:15px;">
                        <a href="profile.php?show=postlist" class="profile-tab<?= $tab_active_1 ?>">Your Posts</a>
                        <a href="profile.php?show=reviews" class="profile-tab<?= $tab_active_2 ?>">Your Reviews</a>
                        <a href="profile.php?show=restaurants" class="profile-tab<?= $tab_active_3 ?>">Your Restaurants</a>
                    </div>

                    <div style="max-height:377px; overflow-y:scroll;">

                        <?php

                        $obj = new profile_tab();

                        if (isset($_GET['show'])) {
                            if ($_GET['show'] == 'postlist') {
                                $obj->postlist_creation($_SESSION['logid']);
                            } else if ($_GET['show'] == 'reviews') {
                                $obj->revlist_creation($_SESSION['logid']);
                            } else if ($_GET['show'] == 'restaurants') {
                                $obj->restlist_creation($_SESSION['logid']);
                            } else {
                                $obj->postlist_creation($_SESSION['logid']);
                            }
                        } else {
                            $obj->postlist_creation($_SESSION['logid']);
                        }
                        ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <style type="text/css">

    </style>

    <script type="text/javascript">

    </script>
</body>

</html>