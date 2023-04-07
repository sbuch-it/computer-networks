<?php
$colors = ['orange','salmon','red','tomato','crimson'];
$dims = ['15px','25px','35px','45px','55px'];
$numbers = [80,100,120,140];

require 'generaMenu.php';
?>

<html>
  <body>
    <form action="2021_09_07_es1_script.php">
      Colori del bordo <?php generaMenu($colors,"colors[]",true); ?>
      Dimensione cella <?php generaMenu($dims,"dim",false); ?>
      Numero <?php generaMenu($numbers,"N",false); ?>
      <input type="submit" value="Genera!" />
    </form>
  </body>
</html>