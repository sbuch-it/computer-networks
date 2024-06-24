<?php
$tags = ['i','strong','tt','del'];
$colors = ['salmon','green','lavender','yellow'];
$numbers = [3,8,13,18,23];

require 'generaMenu.php';
?>

<html>
  <body>
    <form action="2021_09_22_B_es1_script.php">
      Tags <?php generaMenu($tags,"tags[]",true); ?>
      Colore del bordo <?php generaMenu($colors,"color",false); ?>
      Numero <?php generaMenu($numbers,"N",false); ?>
      <input type="submit" value="Genera!" />
    </form>
  </body>
</html>