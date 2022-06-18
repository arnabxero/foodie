<?php

include('../include/connection.php');
session_start();


class post_now
{
    function get_filename_random()
    {
        $legal_charset = 'abcdefghijklmnopqrstwxyzABCDEFGHIJKLMNOPQRSTWXYZ0123456789';
        $legal_charset_len = strlen($legal_charset);
        $random_filename = "";

        for ($i = 0; $i < 20; $i++) {
            $random_filename .= $legal_charset[rand(0, $legal_charset_len - 1)];
        }
        return $random_filename;
    }

    function check_filename_unique($gen_fname)
    {
        include('../include/connection.php');

        $rt = false;

        $sql = "SELECT * FROM posts WHERE photo = '$gen_fname'";
        $res = mysqli_query($con, $sql);
        $count = mysqli_num_rows($res);

        if ($count < 1) {
            $rt = true;
        }
        return $rt;
    }

    function generate_filename()
    {
        $temp_filename = $this->get_filename_random();
        $temp_filename = $temp_filename . $_SESSION['logid'];

        while (!$this->check_filename_unique($temp_filename)) {
            $temp_filename = $this->get_filename_random();
            $temp_filename = $temp_filename . $_SESSION['logid'];
        }

        return $temp_filename;
    }

    function push_file($media_name)
    {
        $errors = array();
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];

        $directory = "../files/images/";
        $dirname = "";

        $hold_tmp = explode('.', $_FILES['image']['name']);
        $file_ext = strtolower(end($hold_tmp));

        $new_file_name = $media_name . '.' . $file_ext;

        $extensions = array("jpeg", "jpg", "png", "bmp", "gif", "webp");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a proper image or video file.";
        }

        if ($file_size > 200000000) {
            $errors[] = 'File size must be excately 250 MB';
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $directory . $new_file_name);
        } else {
            return false;
        }

        return $dirname . $new_file_name;
    }

    function push_post($media_name_with_dir, $content, $authorid, $saveTime, $title)
    {
        include('../include/connection.php');

        $sql = "INSERT INTO `posts` (`user_id`, `post`, `date_time`, `title`, `photo`) 
        VALUES ('$authorid', '$content', '$saveTime', '$title', '$media_name_with_dir')";

        $res = mysqli_query($con, $sql);
    }

    function create_post()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $media_name = "";
        $media_name_with_dir = "";
        $authorid = $_SESSION['logid'];
        $today = new DateTime("now", new DateTimeZone('Asia/Dhaka'));
        $saveTime =  $today->format('h:i A|Y/m/d');

        $post_sub = true;


        $hold_tmp = explode('.', $_FILES['image']['name']);

        $media_name = $this->generate_filename();

        $media_name_with_dir = $this->push_file($media_name);

        if ($media_name_with_dir == false) {
            $post_sub = false;
        }

        if ($post_sub == true) {
            echo "<h1>Post Success</h1>";

            $this->push_post($media_name_with_dir, $content, $authorid, $saveTime, $title);
        } else {
            echo "<h1>File format or size error</h1>";
        }
    }
}


if (isset($_SESSION['logid'])) {
    if ($_POST['content'] != "" || $_FILES['image']['name'] != "") {
        $obj = new post_now();
        $obj->create_post();
        header('Refresh: 3; URL=../blog.php');
    } else {
        echo "<h1>Post Failed</h1>";
        header('Refresh: 3; URL=../index.php');
    }
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
    <title>Posting.....</title>


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