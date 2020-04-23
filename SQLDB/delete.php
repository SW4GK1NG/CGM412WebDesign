<?php
  session_start();

  if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    haeder ("location: login.php");
    exit;
  }

  require_once 'config.php';

  $user_id = $_GET["user_id"];

  $sql = "DELETE FROM userdata WHERE UserID='$user_id'";

  if (mysqli_query($conn, $sql)) {
    header ("location: ReadDB.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);

?>
