<?php
require_once("DBController.php");
$db_handle = new DBController();

session_start();
$id = $_SESSION['logid'];

if (!empty($_POST["username"])) {
  $query = "SELECT * FROM users WHERE userName='" . $_POST["username"] . "' AND id != '$id'";
  $user_count = $db_handle->numRows($query);
  if ($user_count > 0) {
    echo "<p style='color:red; float:right;' class='status-not-available'> Username Not Available.</p>";
  } else {
    echo "<p style='color:green; float:right;' class='status-available'> Username Available.</p>";
  }
}
