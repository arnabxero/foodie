<?php


class ulogin
{

    function login_user($emailusername, $password)
    {

        include('../include/connection.php');
        session_start();

        $emailusername = stripcslashes($emailusername);
        $password = stripcslashes($password);
        $emailusername = mysqli_real_escape_string($con, $emailusername);
        $password = mysqli_real_escape_string($con, $password);


        $sql = "SELECT * FROM users WHERE (userName = '$emailusername' OR email = '$emailusername') AND pass = '$password' AND verified = 'YES'";

        $result = mysqli_query($con, $sql);

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        if ($count == 1) {

            if ($row['verified'] == "YES") {
                //Admin or not check//
                //$id = $row['id'];
                //$user = $row['userName'];

                /*$adminsql = "SELECT * FROM admin_list WHERE uid = '$id' AND username = '$user'";
                $adminres = mysqli_query($con, $adminsql);
                $admincount = mysqli_num_rows($adminres);

                if($admincount>1){
                    $_SESSION["admin"] = "YES";
                }*/

                $_SESSION["logid"] = $row['id'];
                
                echo "<h1> Login Successful<br>Loading Your Profile</h1>";
                header('Location: ../index.php');
            } else {
                echo "<h2>You Have Not Verified Your New Email Address Yet, Please check inbox and click verification link to verify email.<br><a href='../login.php'>Login After Verification</a></h2>";
            }
        } else {
            echo "<h1> Login failed<br>Invalid username or password<br>Please Try Again</h1>";
            echo "<h1><a href='../login.php'>Login Again</a></h1>";
        }
    }
}

if (isset($_POST['submit'])) {
    $primemailusername = $_POST['email'];
    $primpassword = $_POST['password'];

    $ulogsub = new ulogin();

    $ulogsub->login_user($primemailusername, $primpassword);
}
