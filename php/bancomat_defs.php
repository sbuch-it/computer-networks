<?php
$bancomat = array(
	'piazza del campo'=>array('Ag1'=>400,'Ag2'=>200,'Ag3'=>100,'Ag4'=>500),
	'Via Roma' => array('Ag1'=>300,'Ag2'=>50,'Ag3'=>150,'Ag4'=>600),
	'Fortezza' => array('Ag1'=>700,'Ag2'=>650,'Ag3'=>350,'Ag4'=>60));
$agenzie = array('Ag1','Ag2','Ag3','Ag4','Ag5');

function generateSelect($name,$list,$mul) {
	if($mul)
		$mulopt = "multiple=\"on\"";
	else
		$mulopt ="";
	
	echo "<select name=\"$name\" $mulopt>";
	foreach($list as $l)
		echo "<option>$l</option>";
	echo "</select>";
}
?>