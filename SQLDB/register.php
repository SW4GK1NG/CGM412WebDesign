<?php

require_once 'config.php';

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter a valid Useraname";
  } else {
    $username = trim($_POST["username"]);
    $sql = "SELECT id FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
      $username_err = "Username already taken";
    }
  }

  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a valid Password";
  } elseif (strlen(trim($_POST["password"])) < 8) {
    $password_err = "Password needs to be at least 8 characters";
  } else {
    $password = trim($_POST["password"]);
  }

  if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Please confirm your Password";
  } else {
    $confirm_password = trim($_POST["confirm_password"]);
    if ($password != $confirm_password) {
      $confirm_password_err = "Please make sure to input the same Password";
    }
  }

  if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $sql)) {
      header ("location: login.php");
    } else {
      echo "Le error has arrived, please try again later";
    }
  }
  mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Register Page</title>
  </head>

  <body>

    <h1>Register</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      Username: <input type="text" name="username" value="<?php echo $username; ?>"> <?php echo $username_err; ?> <br><br>
      Password: <input type="password" name="password" value="<?php echo $password; ?>"> <?php echo $password_err; ?><br><br>
      Confirm Password: <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>"> <?php echo $confirm_password_err; ?><br><br>
      <input type="submit" value="Register">
      <input type="reset" value="Reset">
    </form>
  </body>

</html>
