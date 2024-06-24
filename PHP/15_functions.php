<?php
/* calcolo del minimo elemento di un array (indipendentemente dal tipo di dati degli elementi) */

function mymin($arr) {
  // verifica se è un array
  if(!is_array($arr))
		return $arr;
	
	// seleziona il primo elemento
	reset($arr);
  $minval = current($arr);
	
	// trova il minimo 
  foreach($arr as $value) {
	  if($value<$minval)
	    $minval = $value;
  }
  return $minval;
}
  
/* calcolo della media degli elementi di un array */

function myaverage($arr) {
  // verifica se è un array
  if(!is_array($arr))
		return $arr;

  // calcola la somma degli elementi
  $tot = 0;
	foreach($arr as $value)
	  $tot += $value;
	
	/* calcola la media (ha problemi per vettori vuoti) */
	return $tot/count($arr);
}
?>