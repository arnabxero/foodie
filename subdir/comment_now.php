<?php

include('../include/connection.php');
session_start();

if (!isset($_SESSION['logid'])) {
    header('Location: login.php');
}


$user_id = $_POST['user_id'];
$post_id = $_POST['post_id'];
$content = $_POST['content'];
$today = new DateTime("now", new DateTimeZone('Asia/Dhaka'));
$saveTime =  $today->format('h:i A | Y/m/d');


$sql = "INSERT INTO `comments` (`user_id`, `post_id`, `content`, `time`) VALUES ('$user_id', '$post_id', '$content', '$saveTime')";
$res = mysqli_query($con, $sql);

$goto = 'Location: ../view_post.php?id=' . $post_id;
header($goto);


?>
