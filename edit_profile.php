<?php
include('include/connection.php');
session_start();

if (!(isset($_SESSION['logid']))) {
    header('Location: login.php');
}

$id = $_SESSION['logid'];

$sql = "SELECT * FROM users WHERE id = '$id'";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_array($res);

$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email'];
$username = $row['userName'];
$phone = $row['phone'];
$address = $row['address'];
$twitter = $row['twitter'];
$fb = $row['fb'];
$instagram = $row['instagram'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet" />
    <title>Foodie - Update Profile</title>
    <link rel="shortcut icon" type="image/x-icon" href="files/icons/webcon.png" />



    <style>
        body {
            background-image: url("files/backgrounds/update_profile.jpg");
        }
    </style>
</head>

<body>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script src="lib/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script>
        function checkAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "subdir/check_availability_username_update.php",
                data: 'username=' + $("#username").val(),
                type: "POST",
                success: function(data) {
                    setTimeout(function() {
                        $("#user-availability-status").html(data);
                        $("#loaderIcon").hide();
                    }, 1000);
                },
                error: function() {}
            });
        }
    </script>
    <script>
        function checkAvailability2() {
            $("#loaderIcon2").show();
            jQuery.ajax({
                url: "subdir/check_availability_phone_update.php",
                data: 'phone=' + $("#phone").val(),
                type: "POST",
                success: function(data) {
                    setTimeout(function() {
                        $("#email-availability-status").html(data);
                        $("#loaderIcon2").hide();
                    }, 1000);
                },
                error: function() {}
            });
        }
    </script>


    <div class="container">
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-4" style="margin-top: 60px;">

                <div style="text-align:center;">
                    <a href="index.php">
                        <img src="files/icons/foodie.gif" height="50px" width="170px" style="margin-bottom: 10px;">
                    </a>
                    <br>
                    <img src="files/icons/update_profile.gif" height="50px" width="340px" style="margin-bottom: 50px;">

                </div>
                <form action="subdir/update_pro_sub.php" method="POST">
                    <!-- Details input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form2Example1" class="form-control" name="first_name" value="<?= $first_name ?>" />
                        <label class="form-label" for="form2Example1">First Name</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" id="form2Example1" class="form-control" name="last_name" value="<?= $last_name ?>" />
                        <label class="form-label" for="form2Example1">Last Name</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" id="form2Example1" class="form-control" name="address" value="<?= $address ?>" />
                        <label class="form-label" for="form2Example1">Address</label>
                    </div>

                    <div class="form-outline mb-4">
                        <div id="frmCheckUsername">
                            <input name="username" type="text" id="username" class="form-control" onBlur="checkAvailability()" value="<?= $username ?>"><span id="user-availability-status"></span>
                            <label class="form-label" for="form2Example1">Username</label>
                            <img src="files/icons/loading.gif" id="loaderIcon" height="20px" width="20px" style="display:none" />
                        </div>
                    </div>

                    <div class="form-outline mb-4">
                        <div id="frmCheckUsername">
                            <input name="phone" type="text" id="phone" class="form-control" onBlur="checkAvailability2()" value="<?= $phone ?>"><span id="email-availability-status"></span>
                            <label class="form-label" for="form2Example1">Phone</label>
                            <img src="files/icons/loading.gif" id="loaderIcon2" height="20px" width="20px" style="display:none" />
                        </div>
                    </div>

                    <div class="form-outline mb-4">
                        <div id="frmCheckUsername">
                            <input name="twitter" type="text" id="username" class="form-control" value="<?= $twitter ?>" />
                            <label class="form-label" for="form2Example1">Twitter ID</label>
                        </div>
                    </div>
                    <div class="form-outline mb-4">
                        <div id="frmCheckUsername">
                            <input name="fb" type="text" id="username" class="form-control" value="<?= $fb ?>" />
                            <label class="form-label" for="form2Example1">Facebook ID</label>
                        </div>
                    </div>
                    <div class="form-outline mb-4">
                        <div id="frmCheckUsername">
                            <input name="instagram" type="text" id="username" class="form-control" value="<?= $instagram ?>" />
                            <label class="form-label" for="form2Example1">Instagram ID</label>
                        </div>
                    </div>



                    <!--
            <div class="form-outline mb-4">
                <div id="frmCheckUsername">
                    <input name="email" type="email" id="email" class="form-control" onBlur="checkAvailability2()"><span id="email-availability-status"></span>
                    <label class="form-label" for="form2Example1">Email</label>
                    <img src="files/icons/loading.gif" id="loaderIcon2" height="20px" width="20px" style="display:none" />
                </div>
            </div>

            <div class="form-outline mb-4">
                <input type="password" id="form2Example2" class="form-control" name="password" />
                <label class="form-label" for="form2Example2">Password</label>
            </div> -->

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4" style="text-align:center;">
                        <div class="col">
                            <button type="submit" name="submit" class="btn btn-primary btn-block mb-4 basic-btn">Update</button>
                        </div>
                    </div>

                    <div style="text-align:center;">
                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>Don't want to change? <a href="profile.php">Go Back</a></p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">

            </div>
        </div>
    </div>
</body>

</html>