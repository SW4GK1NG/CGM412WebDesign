<!DOCTYPE html>
<html>
  <head>

    <title>Welcome To Hell</title>

  </head>

  <body>

    <table style="border: 5px solid red; width:70%; border-spacing: 5px" rules="group" >
    <tr><th>Student ID</th><th>Student Name</th><th>Student Surname</th><th>Student Major</th></tr>

    <?php

      $db_server = "Localhost";
      $db_username = "root";
      $db_password = "";
      $db_name = "dbsample";

      $conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);

      if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT * FROM students";
      $result = mysqli_query($conn, $sql);

      if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          echo "<tr><td>" . $row['stu_id'] . "</td><td>" . $row['stu_name'] . "</td><td>" . $row['stu_surname'] . "</td><td>" . $row['stu_major'] . "</td></tr>";
        }
      } else {
        echo "No Data.";
      }

      mysqli_close($conn);

      echo "Connected.</br>";

    ?>

    </table>

  </body>

<html>
