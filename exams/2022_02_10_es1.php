<?php
$colors = ['green','red','yellow','cyan'] ;
$sizes = ['20px','30px','40px','50px'];
$numbers = [0.6,0.8,1,1.2,1.4];

require 'generaMenu.php';
?>

<html>
  <body>
    <form action="es1_script.php">
      Colore del bordo <?php generaMenu($colors,"color",false); ?>
      Dimensione delle celle <?php generaMenu($sizes,"size",false); ?>
      Numeri <?php generaMenu($numbers,"F[]",true); ?>
      <input type="submit" value="Genera!" />
    </form>
  </body>
</html>