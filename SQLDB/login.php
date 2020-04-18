<?php

  require_once 'config.php';

  $username = $password = "";
  $username_err = $password_err = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["username"]))) {
      $username_err = "Please enter a valid Username";
    } else {
      $username = trim($_POST["username"]);
    }

    if (empty(trim($_POST["password"]))) {
      $password_err = "Please enter a valid Password";
    } else {
      $password = trim($_POST["password"]);
    }

    if (empty($username_err) && empty($password_err)) {
      $sql = "SELECT username, password FROM users WHERE username='$username'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) == 1) {
        while($row = mysqli_fetch_assoc($result)) {
          if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION["username"] = $username;
            header("location: ReadDB.php");
          } else {
            $password_err = "Password is invalid";
          }
        }
      } else {
        $username_err = "Username is invalid";
      }
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
  </head>

  <body>

    <h1>Login</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      Username: <input type="text" name="username" value="<?php echo $username; ?>"> <?php echo $username_err; ?> <br><br>
      Password: <input type="password" name="password" value="<?php echo $password; ?>"> <?php echo $password_err; ?><br><br>
      <input type="submit" value="Login"><br><br>
      <p>Don't have an account? <a href="register.php">Sign up here!!</a></p>
    </form>
  </body>

</html>
