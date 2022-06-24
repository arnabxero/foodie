<?php

include('../include/connection.php');
session_start();

if (!isset($_SESSION['logid'])) {
    header('Location: login.php');
}

class update_now
{
    function push_update()
    {
        include('../include/connection.php');

        $title = $_POST['title'];
        $content = $_POST['content'];
        $id = $_POST['post_id'];

        $sql = "UPDATE posts SET title = '$title', post = '$content' WHERE id = '$id'";
        $res = mysqli_query($con, $sql);

        if ($res) {
            echo "<h1>Updated Successfully</h1>";
            header('Refresh: 3; URL=../view_post.php?id=' . $id);
        } else {
            echo "<h1>Update Failed</h1>";
            header('Refresh: 3; URL=../blog.php');
        }
    }
}


if (isset($_SESSION['logid'])) {
    $obj = new update_now();
    $obj->push_update();
} else {
    header('Location: ../login.php');
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