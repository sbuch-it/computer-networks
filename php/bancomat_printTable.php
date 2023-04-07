<?php
include "defs.php";
?>

<html>
<head>
<style>
table {border: 1px solid black; border-collapse: collapse;}
td,th {border: 1px solid black;}
</style>
</head>
<body>
<table>
<?php
 echo "<tr><th></th>";
 foreach($agenzie as $a) {
	 echo "<th>$a</th>";
 }
 echo "</tr>";
 foreach($bancomat as $p=>$d) {
	 echo "<tr><th>$p</th>";
	 foreach($agenzie as $a) {
		if(isset($d[$a]))
			echo "<td>$d[$a]</td>";
		else
			echo "<td>-</td>";
	 }
	 echo "</tr>";
 }
?>
</table>
</body>
</html>