<?php
include('../include/connection.php');
session_start();

if (!isset($_SESSION['logid'])) {
    header('Location: ../login.php');
}

$user_id = $_POST['user_id'];
$rest_id = $_POST['rest_id'];
$content = $_POST['content'];
$rate = $_POST['rate'];
$today = new DateTime("now", new DateTimeZone('Asia/Dhaka'));
$saveTime =  $today->format('h:i A | Y/m/d');

$sql = "INSERT INTO `reviews` (`user_id`, `rest_id`, `review`, `rate`, `time`) VALUES ('$user_id', '$rest_id', '$content', '$rate', '$saveTime')";
$res = mysqli_query($con, $sql);


if ($res == true) {
    echo "<h1>Review Submitted</h1>";
    header('Refresh: 3; URL=../view_restaurant.php?id=' . $rest_id);
} else {
    echo "<h1>Review Not Submitted</h1>";
    header('Refresh: 3; URL=../view_restaurant.php?id=' . $rest_id);
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
    <title>Submitting.....</title>


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