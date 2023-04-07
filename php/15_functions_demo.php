<?php require "15-functions.php"; ?>
<html>
  <head>
		<title>Functions</title>
	</head>
	<body>
		<h2>Funzioni su vettori</h2>
		<!-- le funzioni mymin e myaverage applicate ad un vettore di interi -->
		Il minimo del vettore [2, 3, 5, -2, 1] <?php $a = array(2,3,5,-2,1); ?> è <?php echo mymin($a); ?>  mentre la media è <?php echo myaverage($a); ?><br />
		
		<!-- le funzioni mymin e myaverage applicate ad un vettore di stringhe -->
		Il minimo del vettore ["a", "b", "c", "d", "e"] <?php $b = array("a","b","c","d","e"); ?> è <?php echo mymin($b) ?> mentre la media è <?php echo myaverage($b); ?><br />
		
		<!-- le funzioni mymin e myaverage applicate ad un vettore associativo di interi -->
		Il minimo del vettore ["a"=>1, "b"=>2, "c"=>3, "d"=>4, "e"=>5]
		<?php $c = array("a"=>1,"b"=>2,"c"=>3,"d"=>4,"e"=>5); ?> è <?php echo mymin($c) ?> mentre la media è <?php echo myaverage($c); ?><br />
		
		<!-- le funzioni mymin e myaverage applicate ad una variabile non array -->
		Il minimo per una variabile con valore 1 <?php $d = 1; ?> è <?php echo mymin($d) ?> mentre la media è <?php echo myaverage($d); ?><br />
		
		<h2>Variabili funzioni</h2>
		<?php
		// array delle funzioni selezionabili per il calcolo
		$functs = array("sin","cos","tan","exp","log");
	  /* variabili della richiesta HTTP (GET o POST) usate per selezionare la funzione da usare (functID) e l'argomento (x) */
		$f = $_REQUEST['functID'];
		$x = $_REQUEST['x'];
		?>
		
    <!-- form per richiedere il calcolo della funzione -->
    <form action="15-functiondemo.php" >
      <select name="functID" >
      <?php
      // riempie le opzioni del menu
      foreach($functs as $fname)
				echo "<option>${fname}</option>";
			?>
      </select>
      <!-- input per il valore dell'argomento -->
      <input type="text" size="8" name="x" />
      <input type="submit" value="calcola"/>
    </form>
    <br />
		<?php
		/* calcolo del valore della funzionese i parametri sono stati specificati*/
		if(!empty($f) && !empty($x)) {
			$result = $f($x);
			/* la funzione è chiamata in base al nome memorizzato nella variabile $f */
			echo "${f}(${x}) = ${result}";
		}
    ?>
	</body>
</html>