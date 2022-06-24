<?php
session_start();

class uregister
{


    function sub_reg($first_name, $last_name, $address, $username, $phone, $twitter, $fb, $instagram, $id)
    {
        include('../include/connection.php');
        include('../include/mailer.php');

        $first_name = stripcslashes($first_name);
        $last_name = stripcslashes($last_name);
        $address = stripcslashes($address);
        $username = stripcslashes($username);
        $phone = stripcslashes($phone);
        $twitter = stripcslashes($twitter);
        $fb = stripcslashes($fb);
        $instagram = stripcslashes($instagram);


        $first_name = mysqli_real_escape_string($con, $first_name);
        $last_name = mysqli_real_escape_string($con, $last_name);
        $address = mysqli_real_escape_string($con, $address);
        $username = mysqli_real_escape_string($con, $username);
        $phone = mysqli_real_escape_string($con, $phone);
        $twitter = mysqli_real_escape_string($con, $twitter);
        $fb = mysqli_real_escape_string($con, $fb);
        $instagram = mysqli_real_escape_string($con, $instagram);


        $sql1 = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', userName = '$username',
                                    phone = '$phone', address = '$address', twitter = '$twitter',
                                    fb = '$fb', instagram = '$instagram' WHERE id = '$id'";

        $res = mysqli_query($con, $sql1);

        if ($res) {
            echo "<h1>Successfully Updated</h1>";
            $goto = 'Refresh: 3; URL=../profile.php';
            header($goto);
        } else {
            echo "<h1>Failed to Update</h1>";
            $goto = 'Refresh: 3; URL=../profile.php';
            header($goto);
        }
    }
}


$id = $_SESSION['logid'];

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$address = $_POST['address'];
$username = $_POST['username'];
$phone = $_POST['phone'];
$twitter = $_POST['twitter'];
$fb = $_POST['fb'];
$instagram = $_POST['instagram'];



$register_user = new uregister();

if ($register_user->sub_reg($first_name, $last_name, $address, $username, $phone, $twitter, $fb, $instagram, $id)) {
    echo "<h1>Sorry User Already Registered</h1>";
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet" />
    <title>Updating.....</title>


    <style>







    </style>
</head>

<body style="text-align: center;">


    <progress class="loading-bar" value="0" max="10" id="progressBar"></progress>

    <div class="loading-text">Loading - <div class="loading-text" id="ptext"></div> Seconds Left...</div>

    <script>
        var timeleft = 10;

        var downloadTimer = setInterval(function() {
            if (timeleft <= 0) {
                clearInterval(downloadTimer);
            }
            document.getElementById("progressBar").value = 10 - timeleft;

            document.getElementById("ptext").textContent = timeleft / 10;

            timeleft -= 1;
        }, 100);
    </script>

</body>

</html>