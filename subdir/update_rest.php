<?php

include('../include/connection.php');
session_start();


if (!isset($_SESSION['logid'])) {
    header('Location: ../login/php');
}


$id = $_POST['rest_id'];

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$details = $_POST['details'];

$map_lat = $_POST['map_lat'];
$map_lng = $_POST['map_lng'];


$sql = "UPDATE restaurants SET name = '$name', phone = '$phone', email = '$email', address = '$address', details = '$details', map_lat = '$map_lat', map_lng = '$map_lng' WHERE id = '$id'";
$res = mysqli_query($con, $sql);



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

    <?php


    if ($res) {
        echo '<h1>Updated Info Successfully</h1>';
        header('Refresh: 3; URL=../view_restaurant.php?id=' . $id);
    } else {
        echo '<h1>Info Updating Failed</h1>';
        header('Refresh: 3; URL=../view_restaurant.php?id=' . $id);
    }


    ?>
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