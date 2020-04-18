<!DOCTYPE html>
<html>
  <head>

    <title>Welcome To Hell</title>

  </head>

  <body>


    <?php

      require_once 'config.php';

      $sql = "SELECT * FROM students ORDER BY students.stu_id ASC";
      $result = mysqli_query($conn, $sql);

      if(mysqli_num_rows($result) > 0) {
        echo "<table border = 1>";
        echo "<tr><td>Student ID</td>";
        echo "<td>Student Name</td>";
        echo "<td>Student Surname</td>";
        echo "<td>Student Major</td>";
        echo "<td>Edit</td>";
        echo "</tr>";
        while($row = mysqli_fetch_assoc($result)) {
          echo "<tr><td>" . $row['stu_id'] . "</td>";
          echo "<td>" . $row['stu_name'] . "</td>";
          echo "<td>" . $row['stu_surname'] . "</td>";
          echo "<td>" . $row['stu_major'] . "</td>";
          echo "<td> <a href='edit.php?stu_id=" . $row["stu_id"] . "'>Edit</a> <a href='delete.php?stu_id=" . $row["stu_id"] . "'>Delete</a></td>";
          echo "</tr>";
        }
      } else {
        echo "No Data.";
      }

      mysqli_close($conn);

    ?>

    </table>

    <h2>Add New Student</h2>
    <form action="insertdata.php" method="post">

      ID: <input type="text" name="ID" value="Your ID Here :)"><br><br>
      Name: <input type="text" name="Name" value="Your Name Here :)"><br><br>
      Surname: <input type="text" name="Surname" value="Your Surname Here :)"><br><br>
      Major: <input type="text" name="Major" value="Your Major Here :)"><br><br>

      <input type="submit" value="Submit">
    </form>

  </body>

<html>
