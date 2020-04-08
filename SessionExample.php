<?php
session_start();

$_SESSION["Name"] = "Achira Montrichok";

echo "My name: " . $_SESSION["Name"];

?>
