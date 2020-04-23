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

  $sql = "UPDATE userdata SET Username='$stu_name', FavoriteEmote='$stu_sur', MostUseEmote='$stu_major' WHERE UserID=$stu_id";

  if(mysqli_query($conn, $sql)) {
    echo "New Record Added";
    header ("location: ReadDB.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);

?>
