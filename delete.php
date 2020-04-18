<?php

  require_once 'config.php';

  $stu_id = $_GET["stu_id"];

  $sql = "DELETE FROM students WHERE stu_id='$stu_id'";

  if (mysqli_query($conn, $sql)) {
    header ("location: ReadDB.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);

?>
