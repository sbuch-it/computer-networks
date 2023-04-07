<?php
	$tipi = array("promozione","evento","review","presentazione");
	$car  = array("positivo","negativo","neutro","non pertinente");
	
function generateSelect($name,$list,$mul) {
	if($mul)
		$mopt = "multiple=\"on\"";
	else
		$mopt ="";
	echo "<select name=\"$name\" $mopt>";
	foreach($list as $l)
		echo "<option>$l</option>";
	echo "</select>";
}	
?>