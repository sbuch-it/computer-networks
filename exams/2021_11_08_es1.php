<?php
$colors = ['lavender','salmon','beige','gold','linen'] ;
$sizes = ['15px','25px','35px','45px'];
$numbers = [3,6,9,12];

require 'generaMenu.php';
?>

<html>
  <body>
    <form action="es1_script.php">
      Colori delo sfondo <?php generaMenu($colors,"colors[]",true); ?>
      Dimensione delle celle <?php generaMenu($sizes,"size",false); ?>
      Numero <?php generaMenu($numbers,"N",false); ?>
      <input type="submit" value="Genera!" />
    </form>
  </body>
</html>