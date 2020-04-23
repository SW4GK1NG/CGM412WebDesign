<?php
  session_start();

  if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    haeder ("location: login.php");
    exit;
  }
?>

<?php

  require_once 'config.php';

  $stu_id = $_POST["ID"];
  $stu_name = $_POST["Name"];
  $stu_sur = $_POST["FEmote"];
  $stu_major = $_POST["UseEmote"];

  $sql = "INSERT INTO userdata(UserID, Username, FavoriteEmote, MostUseEmote) VALUES ('$stu_id','$stu_name','$stu_sur','$stu_major')";

  if(mysqli_query($conn, $sql)) {
    echo "New Record Added";
    header ("location: ReadDB.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);

?>
