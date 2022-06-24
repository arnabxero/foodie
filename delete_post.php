<?php
include('include/connection.php');
session_start();

$t_id = $_GET['id'];
$id = $_SESSION["logid"];

$sql = "SELECT * FROM posts WHERE id = '$t_id'";

$res = mysqli_query($con, $sql);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
$aid = $row['user_id'];

if ($id == $aid) {
    $vis = "visible";
} else {
    $vis = "hidden";
    echo "<h1>You dont have access!</h1>";
}
?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">

</head>

<body style="text-align:center; visibility: <?= $vis ?>">

    <h1 style="color:red;">POST DELETE</h1>

    <h4>
        Are you sure want to delete the post ?
    </h4>

    <?php

    if (array_key_exists('yes', $_POST)) {
        yes();
    }
    function yes()
    {
        include("include/connection.php");
        $ptid =  $_GET['id'];
        $sql2 = "DELETE FROM `posts` WHERE `id` = $ptid";
        $res2 = mysqli_query($con, $sql2);

        //$sql3 = "DELETE FROM `comments` WHERE `pid` = $ptid";
        //$res3 = mysqli_query($con, $sql3);

        header("Location: blog.php");
    }
    ?>

    <form method="post">
        <input class="del-btn" type="submit" name="yes" class="button" value="Yes" />
    </form>
    <button class="del-btn" onclick="window.location.href='view_post.php?id=<?= $t_id ?>';">No</button>

    </head>

</html>