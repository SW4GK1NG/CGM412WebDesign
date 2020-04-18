<?php
  session_start();

  if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    haeder ("location: login.php");
    exit;
  }
?>

<?php

session_start();
session_destroy();
header ("location: login.php");
exit;

?>
