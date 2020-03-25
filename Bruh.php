<!DOCTYPE html>
<html>
  <head>

    <title>Welcome To Hell</title>

  </head>

  <body>
      <?php
        echo "Welcome " . $_POST['Name'] . " " . $_POST['Surname'] . ", Your Student ID is " . $_POST['ID']
        . ".</br></br>" . "You are " . $_POST['Age'] . " years old and your email is " . $_POST['Email'];
      ?>
  </body>

<html>
