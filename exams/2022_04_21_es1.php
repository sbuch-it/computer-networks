<?php
$colors = ['red','green','yellow','purple','cyan'];
$sizes = ['20px','30px','40px','50px'];
$chars = ['j','k','x','w','y','z'] ;

require 'generaMenu.php';
?>

<html>
  <body>
    <form action="2022_04_21_es1_script.php">
      Caratteri <?php generaMenu($chars,"chars[]",true); ?>
      Dimensione delle celle <?php generaMenu($sizes,"size",false); ?>
      Colore del testo <?php generaMenu($colors,"color",false); ?>
      <input type="submit" value="Genera!" />
    </form>
  </body>
</html>