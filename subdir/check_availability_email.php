<?php
require_once("DBController.php");
$db_handle = new DBController();


if(!empty($_POST["email"])) {
  $query = "SELECT * FROM users WHERE email='" . $_POST["email"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<p style='color:red; float:right;' class='status-not-available'> Email Not Available.</p>";
  }else{
      echo "<p style='color:green; float:right;' class='status-available'> Email Available.</p>";
  }
}
