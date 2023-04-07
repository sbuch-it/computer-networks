<?php
$colors = ["green","red","yellow","blue"];
$chars = ["X","O","H","S"];
$numbers = [-0.1,-0.2,0,0.1,0.2];

require 'generaMenu.php';
?>

<html>
  <body>
    <form action="2021_07_23_es1_script.php">
      Numeri <?php generaMenu($numbers,"nums[]",true); ?>
      Colore dello sfondo <?php generaMenu($colors,"color",false); ?>
      Caratteri <?php generaMenu($chars,"chars[]",true); ?>
      <input type="submit" value="Genera!" />
    </form>
  </body>
</html>