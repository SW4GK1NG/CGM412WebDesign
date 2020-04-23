<!DOCTYPE html>

<?php
  session_start();

  if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header ("location: login.php");
    exit;
  }
?>

<html>
  <head>

    <title>Welcome To Hell</title>

  </head>

  <body>

    <?php
      echo "<br><br>" . "User: " . $_SESSION['username'] . "   ";
      echo "[<a href='logout.php'>Logout</a>]<br><br>"
    ?>

    <?php

      require_once 'config.php';

      $sql = "SELECT * FROM userdata ORDER BY userdata.UserID ASC";
      $result = mysqli_query($conn, $sql);

      if(mysqli_num_rows($result) > 0) {
        echo "<table border = 1>";
        echo "<tr><td>User ID</td>";
        echo "<td>Username</td>";
        echo "<td>Favorite Emote</td>";
        echo "<td>Most Used Emote</td>";
        echo "<td>Edit</td>";
        echo "</tr>";
        while($row = mysqli_fetch_assoc($result)) {
          echo "<tr><td>" . $row['UserID'] . "</td>";
          echo "<td>" . $row['Username'] . "</td>";
          echo "<td>" . $row['FavoriteEmote'] . "</td>";
          echo "<td>" . $row['MostUseEmote'] . "</td>";
          echo "<td> <a href='edit.php?user_id=" . $row["UserID"] . "'>Edit</a> <a href='delete.php?user_id=" . $row["UserID"] . "'>Delete</a></td>";
          echo "</tr>";
        }
      } else {
        echo "No Data.";
      }

      mysqli_close($conn);

    ?>

    </table>

    <h2>Add New TwitchChat</h2>
    <form action="insertdata.php" method="post">

      ID: <input type="text" name="ID" value="Your User ID Here :)"><br><br>
      Username: <input type="text" name="Name" value="Your Username Here :)"><br><br>
      Favorite Emote: <input type="text" name="FEmote" value="Your Favorite Emote Here :)"><br><br>
      Most Used Emote: <input type="text" name="UseEmote" value="Your Most Used Emote Here :)"><br><br>

      <input type="submit" value="Submit">
    </form>

  </body>

<html>
