<?php
  session_start();

  if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    haeder ("location: login.php");
    exit;
  }
?>

<html>

  <head>
    <title>Edit</title>
  </head>

  <body>

    <?php

      require_once 'config.php';

      $stuID = $_GET["stu_id"];
      $sql = "SELECT * FROM students WHERE stu_id=$stuID";

      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          ?>

          <h2>Add New Student</h2>
          <form action="updatedata.php" method="post">

            ID: <?php echo $stuID;?><br><br><input type="hidden" name="ID" value="<?php echo $stuID;?>">
            Name: <input type="text" name="Name" value="<?php echo $row['stu_name']?>"><br><br>
            Surname: <input type="text" name="Surname" value="<?php echo $row['stu_surname']?>"><br><br>
            Major: <input type="text" name="Major" value="<?php echo $row['stu_major']?>"><br><br>

            <input type="submit" value="Submit">
          </form>

          <?php
        }
      }


      mysqli_close($conn);

    ?>

  </body>

</html
