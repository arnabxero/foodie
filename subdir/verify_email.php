<?php

class verifymail
{
    function check_vercode_and_transfer_user()
    {
        include("../include/connection.php");
        $verification_code = $_GET['vcode'];
        $id = $_GET['id'];
        $email = $_GET['email'];

        $sql = "SELECT * FROM users WHERE verified = $verification_code";
        $res = mysqli_query($con, $sql);
        $count = mysqli_num_rows($res);

        if ($count < 1) {
            echo "Check your email, if verification email exist then you are already verified, <a href='../login.php'>Login</a><br>If verification email not exists, then please <a href='../register.php'>Register</a>";
        } else {

            $sql2 = "UPDATE users SET verified = 'YES' WHERE id = $id";
            $res2 = mysqli_query($con, $sql2);

            if ($res2 && $res) {
                echo "Verification Successfull <a href='../login.php'>Go to Login</a>";
            } else {
                echo "Failed Verification.";
            }
        }
    }
}


$veruser = new verifymail();
$veruser->check_vercode_and_transfer_user();
header('Location: ../login.php');
