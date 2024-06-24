<?php
include "defs.php";
?>

<html>
<body>
<?php
  $p = $_REQUEST['pos'];
  $ag = $_REQUEST['ag'];
  
  echo "<h2>$p</h2>";
  echo "<ul>";
  foreach($ag as $a) {
	  echo "<li>$a".$bancomat[$p][$a]."</li>";
  }
  echo "</ul>";
?>
</body>
</html>