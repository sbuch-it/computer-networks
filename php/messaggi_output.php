<?php
session_start();
require "defs.php";
?>

<html>
<body>
<table>
<?php

// è implementato solo il codice che stampa la tabella

echo "<tr><th></th>";
foreach($car as $c)
    echo "<th>$c</th>";
echo "</tr>";

foreach($tipi as $t) {
    echo "<tr><th>$t</th>";
    foreach($car as $c) {
	$tot = $_SESSION['tot'][$t][$c];
	$n = $_SESSION['Nins'][$t][$c];
	if(isset($tot)&&isset($n)) {
            $m = $tot/$n;
	echo "<td>$m</td>";
	} else
            echo "<td>-</td>";
    }
    echo "</tr>";
}
?>
</table>
</body>
</html>