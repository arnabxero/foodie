<?php
include('include/connection.php');
session_start();

$id = -99;

if (!(isset($_SESSION['logid']))) {
    header('Location: login.php');
} else {
    $id = $_SESSION['logid'];
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
                        </div>
                        <div class="col-sm-4 profile-social">
                            <ul class="fa-ul">
                                <li><i class="fa-li fa fa-twitter-square"></i><a href="#"><?= $twitter ?></a></li>
                                <li><i class="fa-li fa fa-facebook-square"></i><a href="#"><?= $fb ?></a></li>
                                <li><i class="fa-li fa fa-instagram"></i><a href="#"><?= $instagram ?></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="tabs-wrapper profile-tabs">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab-activity" data-toggle="tab">Your Posts</a></li>
                            <li><a href="#tab-friends" data-toggle="tab">Your Reviews</a></li>
                            <li><a href="#tab-chat" data-toggle="tab">Your Restaurants</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-activity">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="text-center">
                                                    <i class="fa fa-comment"></i>
                                                </td>
                                                <td>
                                                    John Doe posted a comment in <a href="#">Avengers Initiative</a> project.
                                                </td>
                                                <td>
                                                    2014/08/08 12:08
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <i class="fa fa-truck"></i>
                                                </td>
                                                <td>
                                                    John Doe changed order status from <span class="label label-primary">Pending</span> to <span class="label label-success">Completed</span>
                                                </td>
                                                <td>
                                                    2014/08/08 12:08
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <i class="fa fa-check"></i>
                                                </td>
                                                <td>
                                                    John Doe posted a comment in <a href="#">Lost in Translation opening scene</a> discussion.
                                                </td>
                                                <td>
                                                    2014/08/08 12:08
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <i class="fa fa-users"></i>
                                                </td>
                                                <td>
                                                    John Doe posted a comment in <a href="#">Avengers Initiative</a> project.
                                                </td>
                                                <td>
                                                    2014/08/08 12:08
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <i class="fa fa-heart"></i>
                                                </td>
                                                <td>
                                                    John Doe changed order status from <span class="label label-warning">On Hold</span> to <span class="label label-danger">Disabled</span>
                                                </td>
                                                <td>
                                                    2014/08/08 12:08
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <i class="fa fa-check"></i>
                                                </td>
                                                <td>
                                                    John Doe posted a comment in <a href="#">Lost in Translation opening scene</a> discussion.
                                                </td>
                                                <td>
                                                    2014/08/08 12:08
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <i class="fa fa-truck"></i>
                                                </td>
                                                <td>
                                                    John Doe changed order status from <span class="label label-primary">Pending</span> to <span class="label label-success">Completed</span>
                                                </td>
                                                <td>
                                                    2014/08/08 12:08
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <i class="fa fa-users"></i>
                                                </td>
                                                <td>
                                                    John Doe posted a comment in <a href="#">Avengers Initiative</a> project.
                                                </td>
                                                <td>
                                                    2014/08/08 12:08
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="tab-friends">
                                <ul class="widget-users row">
                                    <li class="col-md-6">
                                        <div class="img">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt="">
                                        </div>
                                        <div class="details">
                                            <div class="name">
                                                <a href="#">John Doe </a>
                                            </div>
                                            <div class="time">
                                                <i class="fa fa-clock-o"></i> Last online: 5 minutes ago
                                            </div>
                                            <div class="type">
                                                <span class="label label-danger">Admin</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-6">
                                        <div class="img">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt="">
                                        </div>
                                        <div class="details">
                                            <div class="name">
                                                <a href="#">Mila Kunis</a>
                                            </div>
                                            <div class="time online">
                                                <i class="fa fa-check-circle"></i> Online
                                            </div>
                                            <div class="type">
                                                <span class="label label-warning">Pending</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-6">
                                        <div class="img">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt="">
                                        </div>
                                        <div class="details">
                                            <div class="name">
                                                <a href="#">Ryan Gossling</a>
                                            </div>
                                            <div class="time online">
                                                <i class="fa fa-check-circle"></i> Online
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-6">
                                        <div class="img">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt="">
                                        </div>
                                        <div class="details">
                                            <div class="name">
                                                <a href="#">Robert Downey Jr.</a>
                                            </div>
                                            <div class="time">
                                                <i class="fa fa-clock-o"></i> Last online: Thursday
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-6">
                                        <div class="img">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt="">
                                        </div>
                                        <div class="details">
                                            <div class="name">
                                                <a href="#">Emma Watson</a>
                                            </div>
                                            <div class="time">
                                                <i class="fa fa-clock-o"></i> Last online: 1 week ago
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-6">
                                        <div class="img">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt="">
                                        </div>
                                        <div class="details">
                                            <div class="name">
                                                <a href="#">George Clooney</a>
                                            </div>
                                            <div class="time">
                                                <i class="fa fa-clock-o"></i> Last online: 1 month ago
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-6">
                                        <div class="img">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt="">
                                        </div>
                                        <div class="details">
                                            <div class="name">
                                                <a href="#">Mila Kunis</a>
                                            </div>
                                            <div class="time online">
                                                <i class="fa fa-check-circle"></i> Online
                                            </div>
                                            <div class="type">
                                                <span class="label label-warning">Pending</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-6">
                                        <div class="img">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt="">
                                        </div>
                                        <div class="details">
                                            <div class="name">
                                                <a href="#">Ryan Gossling</a>
                                            </div>
                                            <div class="time online">
                                                <i class="fa fa-check-circle"></i> Online
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <br>
                                <a href="#" class="btn btn-success pull-right">View all users</a>
                            </div>

                            <div class="tab-pane fade" id="tab-chat">
                                <div class="conversation-wrapper">
                                    <div class="conversation-content">
                                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 340px;">
                                            <div class="conversation-inner" style="overflow: hidden; width: auto; height: 340px;">

                                                <div class="conversation-item item-left clearfix">
                                                    <div class="conversation-user">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt="">
                                                    </div>
                                                    <div class="conversation-body">
                                                        <div class="name">
                                                            Ryan Gossling
                                                        </div>
                                                        <div class="time hidden-xs">
                                                            September 21, 2013 18:28
                                                        </div>
                                                        <div class="text">
                                                            I don't think they tried to market it to the billionaire, spelunking, base-jumping crowd.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="conversation-item item-right clearfix">
                                                    <div class="conversation-user">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt="">
                                                    </div>
                                                    <div class="conversation-body">
                                                        <div class="name">
                                                            Mila Kunis
                                                        </div>
                                                        <div class="time hidden-xs">
                                                            September 21, 2013 12:45
                                                        </div>
                                                        <div class="text">
                                                            Normally, both your asses would be dead as fucking fried chicken, but you happen to pull this shit while I'm in a transitional period so I don't wanna kill you, I wanna help you.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="conversation-item item-right clearfix">
                                                    <div class="conversation-user">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt="">
                                                    </div>
                                                    <div class="conversation-body">
                                                        <div class="name">
                                                            Mila Kunis
                                                        </div>
                                                        <div class="time hidden-xs">
                                                            September 21, 2013 12:45
                                                        </div>
                                                        <div class="text">
                                                            Normally, both your asses would be dead as fucking fried chicken, but you happen to pull this shit while I'm in a transitional period so I don't wanna kill you, I wanna help you.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="conversation-item item-left clearfix">
                                                    <div class="conversation-user">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt="">
                                                    </div>
                                                    <div class="conversation-body">
                                                        <div class="name">
                                                            Ryan Gossling
                                                        </div>
                                                        <div class="time hidden-xs">
                                                            September 21, 2013 18:28
                                                        </div>
                                                        <div class="text">
                                                            I don't think they tried to market it to the billionaire, spelunking, base-jumping crowd.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="conversation-item item-right clearfix">
                                                    <div class="conversation-user">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt="">
                                                    </div>
                                                    <div class="conversation-body">
                                                        <div class="name">
                                                            Mila Kunis
                                                        </div>
                                                        <div class="time hidden-xs">
                                                            September 21, 2013 12:45
                                                        </div>
                                                        <div class="text">
                                                            Normally, both your asses would be dead as fucking fried chicken, but you happen to pull this shit while I'm in a transitional period so I don't wanna kill you, I wanna help you.
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(0, 0, 0);"></div>
                                            <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div>
                                        </div>
                                    </div>
                                    <div class="conversation-new-message">
                                        <form>
                                            <div class="form-group">
                                                <textarea class="form-control" rows="2" placeholder="Enter your message..."></textarea>
                                            </div>

                                            <div class="clearfix">
                                                <button type="submit" class="btn btn-success pull-right">Send message</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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