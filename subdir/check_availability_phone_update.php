<?php
require_once("DBController.php");
$db_handle = new DBController();

session_start();
$id = $_SESSION['logid'];

if (!empty($_POST["phone"])) {
  $query = "SELECT * FROM users WHERE phone='" . $_POST["phone"] . "' AND id != '$id'";
  $user_count = $db_handle->numRows($query);
  if ($user_count > 0) {
    echo "<p style='color:red; float:right;' class='status-not-available'> Phone Not Available.</p>";
  } else {
    echo "<p style='color:green; float:right;' class='status-available'> Phone Available.</p>";
  }
}
