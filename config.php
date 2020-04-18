<?php

  $db_server = "Localhost";
  $db_username = "root";
  $db_password = "";
  $db_name = "dbsample";

  $conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);

  if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
  }
?>
