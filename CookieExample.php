<?php

setcookie("item", "Camera", time()+(3600 * 24));
echo "Item in cart: " . $_COOKIE["item"];

?>
