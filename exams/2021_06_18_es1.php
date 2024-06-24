<?php
$colors = ["green","red","yellow","blue"];
$sizes = ["20px","30px","40px","50px"];
$numbers = [1,2,3,4];

require 'generaMenu.php';
?>

<html>
  <body>
    <form action="2021_06_18_es1_script.php">
      Colori delle celle <?php generaMenu($colors,"colors[]",true); ?>
      Dimensione della cella <?php generaMenu($sizes,"size",false); ?>
      Numero <?php generaMenu($numbers,"N",false); ?>
      <input type="submit" value="Genera!" />
    </form>
  </body>
</html>