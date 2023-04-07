<?php
//$colors = ['LightCyan','PaleTurquoise','Aquamarine','Turquoise','MediumTurquoise'];
$colors = ['BlanchedAlmond','Bisque','NavajoWhite','Wheat','BurlyWood'];

//$strings = ['javascript','python','prolog','haskell'];
$strings = ['fortran','basic','pascal','modula'];

//$numbers = [0.8,0.85,0.9,0.95,1];
$numbers = [1.25,1.18,1.1,1.05,1];

require 'generaMenu.php';
?>

<html>
  <body>
    <form action="2022_03_02_es1_script.php">
      Colori di sfondo <?php echo generaMenu($colors,"colors[]",true); ?>
      Stringa <?php generaMenu($strings,"S",false); ?>
      Numero <?php generaMenu($numbers,"F",false); ?>
      <input type="submit" value="Genera!" />
    </form>
  </body>
</html>