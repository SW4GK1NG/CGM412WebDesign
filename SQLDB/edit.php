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

      $user_id = $_GET["user_id"];
      $sql = "DELETE FROM userdata WHERE UserID='$user_id'";

      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          ?>

          <h2>Edit Your Data</h2>
          <form action="updatedata.php" method="post">

            ID: <?php echo $user_ID;?><br><br><input type="hidden" name="ID" value="<?php echo $user_ID;?>">
            Username: <input type="text" name="Name" value="<?php echo $row['Username']?>"><br><br>
            Favorite Emote: <input type="text" name="FEmote" value="<?php echo $row['FavoriteEmote']?>"><br><br>
            Most Used Emote: <input type="text" name="UseEmote" value="<?php echo $row['MostUseEmote']?>"><br><br>

            <input type="submit" value="Submit">
          </form>

          <?php
        }
      }


      mysqli_close($conn);

    ?>

  </body>

</html
