<?php
include "defs.php";
?>

<html>
<body>
<form action="search.php" method="post">
Posizione
<?php
$p = array_keys($bancomat);
generateSelect("pos",$p,false);
?>
Agenzia<?php generateSelect("ag[]",$agenzie,true); ?>
<input type="submit" value="cerca" />
</form>
</body>
</html>