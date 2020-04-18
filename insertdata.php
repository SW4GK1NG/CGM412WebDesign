<?php

  require_once 'config.php';

  $stu_id = $_POST["ID"];
  $stu_name = $_POST["Name"];
  $stu_sur = $_POST["Surname"];
  $stu_major = $_POST["Major"];

  $sql = "INSERT INTO students(stu_id, stu_name, stu_surname, stu_major) VALUES ('$stu_id','$stu_name','$stu_sur','$stu_major')";

  if(mysqli_query($conn, $sql)) {
    echo "New Record Added";
    header ("location: ReadDB.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);

?>
