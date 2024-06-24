<?php
require "defs.php";
?>

<html>
<body>
<form action="insert.php" method="post">
Tipo del post <?php generateSelect("tipo",$tipi,false); ?>
Caratteristiche del messaggio <?php generateSelect("car[]",$car,true); ?>
Numero di messaggi <input type="text" name="num" />
<input type="submit" value="Inserisci" /> 
</form>
</body>
</html>