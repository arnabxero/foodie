<?php


class uregister
{
    public $class_uid;
    public $class_link;

    function sub_reg($first_name, $last_name, $address, $username, $phone, $twitter, $fb, $instagram)
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
                                    fb = '$fb', instagram = '$instagram'";

        $res = mysqli_query($con, $sql1);

        if ($res) {
            echo "Successfully Updated";
            $goto = 'Refresh: 3; URL=../profile.php';
            header($goto);
        } else {
            echo "Failed to Update";
            $goto = 'Refresh: 3; URL=../profile.php';
            header($goto);
        }
    }
}



$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$address = $_POST['address'];
$username = $_POST['username'];
$phone = $_POST['phone'];
$twitter = $_POST['twitter'];
$fb = $_POST['fb'];
$instagram = $_POST['instagram'];



$register_user = new uregister();

if ($register_user->sub_reg($first_name, $last_name, $address, $username, $phone, $twitter, $fb, $instagram)) {
    echo "<h1>Sorry User Already Registered</h1>";
}
