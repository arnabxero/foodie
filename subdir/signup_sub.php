<?php


class uregister
{
    public $class_uid;
    public $class_link;

    function sub_reg($first_name, $last_name, $address, $username, $email, $password)
    {
        include('../include/connection.php');
        include('../include/mailer.php');

        $first_name = stripcslashes($first_name);
        $last_name = stripcslashes($last_name);
        $address = stripcslashes($address);
        $username = stripcslashes($username);
        $email = stripcslashes($email);
        $password = stripcslashes($password);


        $first_name = mysqli_real_escape_string($con, $first_name);
        $last_name = mysqli_real_escape_string($con, $last_name);
        $address = mysqli_real_escape_string($con, $address);
        $username = mysqli_real_escape_string($con, $username);
        $email = mysqli_real_escape_string($con, $email);
        $password = mysqli_real_escape_string($con, $password);


        //insert user into database table --start
        $sql = "INSERT INTO `users` (`first_name`, `last_name`, `address`, `userName`, `email`, `pass`) VALUES ('$first_name', '$last_name', '$address', '$username', '$email', '$password')";
        $rs = mysqli_query($con, $sql);
        //insert user into database table --end

        //create a row for that user in database --start
        $sql2 = "SELECT * FROM users WHERE userName = '$username' AND email = '$email' AND pass = '$password'";
        $res2 = mysqli_query($con, $sql2);
        $row = mysqli_fetch_array($res2, MYSQLI_ASSOC);
        $this->class_uid = $row['id'];

        //mail verification email to user email address --start
        $codegen = rand(0000, 9999);
        $vercode = $codegen . $this->class_uid;
        $this->class_link = "<h3><a href='" . $verifymail_website . "subdir/verify_email.php?vcode=" . $vercode . "&id=" . $this->class_uid . "&email=" . $email . "'>Click and Verify Your Email On FOODIE</a></h3>";

        //verification status insert --start
        $sql4 = "UPDATE users SET verified = '" . $vercode . "' WHERE id = " . $this->class_uid;
        $rs4 = mysqli_query($con, $sql4);
        //verification status insert --end

    }

    function mail_the_code()
    {
        include('../include/mailer.php');
        require_once('../phpmailer/PHPMailerAutoload.php');

        $mail = new PHPMailer();
        $mail->CharSet =  "utf-8";
        $mail->IsSMTP();
        // enable SMTP authentication
        $mail->SMTPAuth = true;
        // GMAIL username
        $mail->Username = $mailer_mail;
        // GMAIL password
        $mail->Password = $mailer_pass;
        $mail->SMTPSecure = "ssl";
        // sets GMAIL as the SMTP server
        $mail->Host = "smtp.gmail.com";
        // set the SMTP port for the GMAIL server
        $mail->Port = "465";
        $mail->From = 'foodie.mailing.system@gmail.com';
        $mail->FromName = 'Foodie Mailing System';
        $name = $_POST['first_name'] . ' ' . $_POST['last_name'];
        $mail->AddAddress($_POST['email'], $name);
        $mail->Subject  =  'Verify Your Account on Foodie';
        $mail->IsHTML(true);
        $mail->Body    = 'Foodie Email Verification System - Click on this link to Verify Your Account : ' . $this->class_link . '';
        $mail_rs = $mail->Send();
        //mail verification email to user email address --start

        if ($mail_rs) {
            return true;
        } else {
            return false;
        }
    }
}



$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$address = $_POST['address'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];



$register_user = new uregister();

if ($register_user->sub_reg($first_name, $last_name, $address, $username, $email, $password)) {
    echo "<h1>Sorry User Already Registered</h1>";
}

if ($register_user->mail_the_code()) {
    echo "Registration Successfull";
    header('Location: ../login.php');
} else {
    echo "Registration Failed";
}
