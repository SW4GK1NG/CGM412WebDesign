<!DOCTYPE html>
<html>
  <head>

    <title>My PHP Program</title>

  </head>

  <body>
    <?php
      echo "KEKW</br>";

      $color = array("red", "green", "blue");
      foreach ($color as $value) {
        echo "" . $value . "</br>";
      }

      $emote = array("KEKL" => "61", "Bruh" => "Racist");
      foreach ($emote as $key => $value) {
        echo "$key = $value </br>";
      }

      function SendName() {
        echo "PepeLaugh</br>";
      }

      function something($smt) {
        echo "Print something </br>";
        echo "$smt LULW</br>";
      }

      function RecCal($x, $y) {
        $area = $x * $y;
        return $area;
      }

      echo "<h1>Function Called</h1></br>";
      SendName();
      something("AdmiralC");

      echo "<h1>Return Function</h1></br>";
      echo RecCal(15, 642) . "</br>";

      echo $color[0] . "</br>";

      define("PI", "3.14");
      echo PI . "</br>";

    ?>
  </body>

<html>
