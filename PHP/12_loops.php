<html>
	<head>
	  <title>PHP Loops demo</title>
	</head>
	<body style="font-family: Arial">
	<?php
	/* apre in lettura il file con nome 'data' nella directory in cui si trova lo script l'operatore @ permette di sopprimere in output eventuali messaggi di errore */
	$file = @fopen('data','r');
	
  /* verifica se l'apertura del file è avvenuta correttamente se il file non è stato aperto la variabile $file vale false */
	if(!$file) {
  ?>
	  <h2>Error: cannot open data file</h2>
	</body>
	</html>
  <?php
	  // esce dallo script
	  die();		
	}
	
  /* scorre le linee del file si assume il formato città; Tmin; Tmax */
	while($line=fgets($file)) {
	 	// estrae i 3 campi usando ; come separatore
		$data = explode(';',$line);
		/* se c'è stato qualche errore si salta alla linea seguente */
		if(count($data)!=3)
			continue;
			/* si inseriscono i dati letti in un array associativo a tre dimensioni */
		$temp[$data[0]] = array($data[1],$data[2]);
	}
	// ordina il vettore di dati per chiave
	ksort($temp);
	// chiude il file
	fclose($file);
	?>
	  <h2>Temperature in Toscana</h2>
	  <table>
		  <tr>
        <th style="text-align: left">Citt&agrave;</th>
			  <th style="text-align: center">Tmin</th>
			  <th style="text-align: center">Tmax</th>
      </tr>
	    <?php
	    /* stampa la tabella delle temperature e trova la città con la minima più bassa e quella con la massima più alta */
	    
		  $minTmin = 100;
      // variabile per trovare il minimo delle minime
		  $maxTmax = -100;
      // variabile per trovare il massimo delle massime

		  foreach($temp as $citta=>$minmax){
        /* assegna le due componenti dell'array $minmax alle due variabili $Tmin $Tmax per evitare di dover accedere a questi valori nel vettore per 3 volte */
        list($Tmin,$Tmax)=$minmax;
        
        // stampa la riga della tabella
        echo "<tr><td>$citta</td><td>$Tmin</td><td>$Tmax</td></tr>";
        
        // verifica se occorre aggiornare il minimo della minima
        if($Tmin<$minTmin) {
          $minTmin = $Tmin;
          $minCitta = $citta;
        }
        // verifica se occorre aggiornare il massimo della massima
        if($Tmax>$maxTmax) {
          $maxTmax = $Tmax;
          $maxCitta = $citta;
        }
		  }
	    ?>
	  </table>
	  <!-- stampa la minima minima e la massima massima con le relative città -->
	  <p>La citt&agrave; pi&ugrave; fredda &egrave; <?php echo "$minCitta ($minTmin)";?><br /> 
	  La citt&agrave; pi&ugrave; calda &egrave; <?php echo "$maxCitta ($maxTmax)";?></p>
	</body>
</html>