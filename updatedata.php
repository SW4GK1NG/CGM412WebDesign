<?php

  require_once 'config.php';

  $stu_id = $_POST["ID"];
  $stu_name = $_POST["Name"];
  $stu_sur = $_POST["Surname"];
  $stu_major = $_POST["Major"];

  $sql = "UPDATE students SET stu_name='$stu_name', stu_surname='$stu_sur', stu_major='$stu_major' WHERE stu_id=$stu_id";

  if(mysqli_query($conn, $sql)) {
    echo "New Record Added";
    header ("location: ReadDB.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);

?>
