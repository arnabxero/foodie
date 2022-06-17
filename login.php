<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet" />
    <title>Foodie - Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="files/icons/webcon.png" />



    <style>
        body {
            background-image: url("files/backgrounds/login.jpg");
        }
    </style>
</head>

<body>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <div class="container">
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-4" style="margin-top: 60px;">

                <div style="text-align:center;">
                    <a href="index.php">
                        <img src="files/icons/foodie.gif" height="50px" width="170px" style="margin-bottom: 10px;">
                    </a>
                    <br>
                    <img src="files/icons/login.gif" height="50px" width="170px" style="margin-bottom: 50px;">

                </div>
                <form action="subdir/logsub.php" method="POST">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form2Example1" class="form-control" name="email" />
                        <label class="form-label" for="form2Example1">Username or Email address</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="form2Example2" class="form-control" name="password" />
                        <label class="form-label" for="form2Example2">Password</label>
                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4" style="text-align:center;">
                        <div class="col">
                            <button type="submit" name="submit" class="btn btn-primary btn-block mb-4 basic-btn">Log in</button>
                        </div>
                    </div>

                    <div style="text-align:center;">
                        <a href="recover_account.php">Forgot password?</a>

                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>Not a member? <a href="signup.php">Register</a></p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">

            </div>
        </div>
    </div>
</body>

</html>