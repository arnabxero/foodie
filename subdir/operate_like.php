<?php

include('../include/connection.php');
session_start();

if (!isset($_SESSION['logid'])) {
    header('Location: ../login.php');
}
 
$post_id = $_GET['post_id'];
$user_id = $_GET['user_id'];
$operation = $_GET['operation'];

if ($operation == 'add') {
    $sql = "INSERT INTO `likes` (`user_id`, `post_id`) VALUES ('$user_id', '$post_id')";
    $res = mysqli_query($con, $sql);
} else if ($operation == 'rem') {
    $sql = "DELETE FROM likes WHERE user_id = '$user_id' AND post_id = '$post_id'";
    $res = mysqli_query($con, $sql);
}

header('Location: ../view_post.php?id=' . $post_id);
