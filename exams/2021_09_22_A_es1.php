<?php
$tags = ['em','b','tt','del'];
$types = ['solid','dotted','dashed','ridge'];
$numbers = [5,10,15,20,25];

require 'generaMenu.php';
?>

<html>
  <body>
    <form action="2021_09_22_A_es1_script.php">
      Tags <?php generaMenu($tags,"tags[]",true); ?>
      Tipo di bordo <?php generaMenu($types,"type",false); ?>
      Numero <?php generaMenu($numbers,"N",false); ?>
      <input type="submit" value="Genera!" />
    </form>
  </body>
</html>