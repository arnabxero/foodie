<?php

session_start();
include('../include/connection.php');
//include('backend.php');


if (!(isset($_SESSION['logid']))) {
    header('Location: ../login.php');
}
if ($_SESSION['rank'] != 'admin') {
    header('Location: ../profile.php');
}

$admin_opt1 = "";
$admin_opt2 = "";
$admin_opt3 = "";
$admin_opt4 = "";
$admin_opt5 = "";
$admin_opt6 = "";


$cat = "overview";

if (!isset($_GET['type'])) {
    $admin_opt1 = "active";
} else {
    if ($_GET['type'] == "overview") {
        $admin_opt1 = "active";
        $cat = "overview";
    } else if ($_GET['type'] == "pending") {
        $admin_opt2 = "active";
        $cat = "pending";
    } else if ($_GET['type'] == "user") {
        $admin_opt3 = "active";
        $cat = "user";
    } else if ($_GET['type'] == "post") {
        $admin_opt4 = "active";
        $cat = "post";
    } else if ($_GET['type'] == "admin") {
        $admin_opt5 = "active";
        $cat = "admin";
    } else if ($_GET['type'] == "extraopt") {
        $admin_opt6 = "active";
        $cat = "extraopt";
    }
}


$selected_5 = "";
$selected_10 = "";
$selected_20 = "";
$selected_100 = "";
$sz = 5;

if (isset($_GET['size'])) {
    if ($_GET['size'] == 5) {
        $selected_5 = "selected";
        $sz = 5;
    } else if ($_GET['size'] == 10) {
        $selected_10 = "selected";
        $sz = 10;
    } else if ($_GET['size'] == 20) {
        $selected_20 = "selected";
        $sz = 20;
    } else if ($_GET['size'] == 99999) {
        $selected_100 = "selected";
        $sz = 99999;
    }
}


$subtype = "";

if (isset($_GET['subtype'])) {
    $subtype = $_GET['subtype'];
} else {
    $subtype = 'op1';
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet" />
    <title>ReachMe - Admin Panel</title>
    <link rel="shortcut icon" type="image/x-icon" href="../files/icons/webcon.png" />



    <style>

    </style>
</head>

<body>

    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <div style="background-color: aliceblue;">

        <div class="row">
            <!--Search Bar Start-->
            <div class="col-sm-1">
                <a href="../index.php">
                    <img src="../files/icons/foodie.gif" height="40px" width="130px" style="float:left; margin-left:20px; margin-top:25px;">
                    <img src="../files/icons/admin_panel.gif" height="20px" width="130px" style="float:left; margin-left:20px;">
                </a>
            </div>
            <!--Search Bar End-->
            <div class="col-sm-2">

                <div style="margin-left: 40px; margin-top: 21px; display:none;" id="upl2">
                    <form id=f1 name="f1" action="" onSubmit="if(this.t1.value!=null && this.t1.value!='')findString(this.t1.value);return false">
                        <input type="text" id="t1" name="t1" value="" style="padding: 10px;">
                        <input style=" background-color:gray; color:black; padding: 10px; width:100%;" type="submit" name="b1" value="🔎 Find Anything">
                    </form>
                </div>

                <script language="JavaScript">
                    var TRange = null;

                    function findString(str) {

                        var strFound;

                        if (window.find) {
                            strFound = self.find(str);

                            if (!strFound) {
                                strFound = self.find(str, 0, 1);
                                while (self.find(str, 0, 1)) continue;
                            }
                        }
                        return true;
                    }
                </script>
            </div>


            <!--Home Nevigation Start-->
            <div class="col-sm-8">
                <div class="myTab" style="margin: 2%;">
                    <nav class="nav nav-pills nav-fill">
                        <a class="nav-link <?= $admin_opt1 ?>" href="index.php?type=overview&size=<?= $sz ?>">Overview</a>
                        <a class="nav-link <?= $admin_opt2 ?>" href="index.php?type=pending&size=<?= $sz ?>">Restaurants</a>
                        <a class="nav-link <?= $admin_opt3 ?>" href="index.php?type=user&size=<?= $sz ?>">Posts</a>
                        <a class="nav-link <?= $admin_opt4 ?>" href="index.php?type=post&size=<?= $sz ?>">Users</a>
                        <a class="nav-link <?= $admin_opt5 ?>" href="index.php?type=admin&size=<?= $sz ?>">Scan Posts</a>
                        <a class="nav-link <?= $admin_opt6 ?>" href="index.php?type=extraopt&size=<?= $sz ?>">Add Admin</a>
                    </nav>
                </div>
            </div>

            <div class="col-sm-1">
                <button style="border-radius: 5px; border:2px solid black; margin-top: 26px;" id="toggle"><i class="fas fa-cogs"> Filter</i></button>
                <div id="upl" style="display: none;">
                    <label>
                        Show Last
                        <select id="size" onchange="location = this.value;" name="example_length" aria-controls="example" class="form-select form-select-sm arnab-dropdown">
                            <option value="index.php?type=<?= $cat ?>&size=5" <?= $selected_5 ?>>5</option>
                            <option value="index.php?type=<?= $cat ?>&size=10" <?= $selected_10 ?>>10</option>
                            <option value="index.php?type=<?= $cat ?>&size=20" <?= $selected_20 ?>>20</option>
                            <option value="index.php?type=<?= $cat ?>&size=99999" <?= $selected_100 ?>>All</option>
                        </select>
                        Entries
                    </label>
                </div>
            </div>
            <!--Home Nevigation End-->





            <div class="row" style="background-color:white; width: 99.9%;">

                <div class="container">


                </div>




                <script>
                    var timeleft = 10;

                    function start_scan() {
                        var downloadTimer = setInterval(function() {
                            if (timeleft <= 0) {
                                clearInterval(downloadTimer);
                            }
                            document.getElementById("progressBar").value = 10 - timeleft;

                            document.getElementById("ptext2").textContent = (100 - timeleft);

                            document.getElementById("ptext").textContent = timeleft / 10;

                            timeleft -= 1;

                            if ((100 - timeleft) == 100) {
                                document.getElementById('scanresult').style.display = '';
                                document.getElementById('scanbox').style.display = 'none';
                            }
                        }, 100);
                    }
                </script>

                <script>
                    let h = (screen.height) - 190;
                    let hh = h.toString();
                    let pp = "px";

                    document.getElementById("home1").style.height = hh.concat(pp);
                    document.getElementById("home2").style.height = hh.concat(pp);
                    document.getElementById("home3").style.height = hh.concat(pp);
                </script>

                <script>
                    const targetDiv = document.getElementById("upl");
                    const targetDiv2 = document.getElementById("upl2");

                    const btn = document.getElementById("toggle");
                    btn.onclick = function() {
                        if (targetDiv.style.display !== "none") {
                            targetDiv.style.display = "none";
                        } else {
                            targetDiv.style.display = "block";
                        }

                        if (targetDiv2.style.display !== "none") {
                            targetDiv2.style.display = "none";
                        } else {
                            targetDiv2.style.display = "block";
                        }


                    };
                </script>



            </div>
</body>

</html>