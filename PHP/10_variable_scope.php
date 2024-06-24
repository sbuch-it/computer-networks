<html>
	<head>
		<title>Scope delle variabili</title>
	</head>
	<body style="font-family: arial">
	<?php
	$pi = 3.14;
	  
	/* calcola la circonferenza dato il raggio cerca di usare la variabile $pi definita nel contesto esterno, che però non è accessibile */
	function circle($r) {
	  return 2*$pi*$r;
	} 
  /* dichiara la variabile $pi come global e quindi accede al valore disponibile all'esterno della funzione	   */
	function circleG($r) {
	  global $pi;
	  return 2*$pi*$r;
	}
	
  /* utilizza l'array $GLOBALS per accedere al valore della variabile */
	function circleGA($r) {
	  return 2*$GLOBALS['pi']*$r;
	}
	?>
	  <h2>Global variables in function scope</h2>
	  <b>$pi is local: </b><?php echo circle(1); ?><br />
	  <b>$pi is declared global: </b><?php echo circleG(1); ?><br />
	  <b>$pi is from $GLOBALS array: </b><?php echo circleGA(1); ?>
	</body>
</html>