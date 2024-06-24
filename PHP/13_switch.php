<html>
	<head>
		<title>PHP switch Demo</title>
	</head>
	<body style="font-family: Arial">
		<h2>Parsing Browser's Accept-Language</h2>
		<?php
		echo "Input string: <em>${_SERVER['HTTP_ACCEPT_LANGUAGE']}</em> <br />";
		
    /* nella stringa dell'header Accept-Language è presente una lista di codici di lingua separati da virgola ',' */
		$langs = explode(",",$_SERVER['HTTP_ACCEPT_LANGUAGE']);
		
    /* se Accept-Language non è definito si inserisce un default come "en" */
		if(count($langs)<1)
			$langs=array("en");
			
		/* ogni specifica di lingua è costituita dall'identificatore seguito eventualmente dal carattere ';' e da uno score di priorità con il formato 'q=xx' dove xx è un numero compreso fra 0 e 1. */
		for($i=0,$nl=count($langs);$i<$nl;$i++) {
			$pair = explode(";",$langs[$i]);
		
      /* si verifica se è specificata o meno il valore q. Se non è specificato si assume q=1. In ogni caso il valore è corretto con la posizione nella lista per dare priorità agli elementi in testa alla lista a parità di score */
      $corr = 0.0001*($nl-$i);
      if(count($pair)==1)
        $lang[$pair[0]] = 1+$corr;
      else {
        /* legge q=xx usando il carattere '=' come riferimento. Si legge solo il secondo elemento (quello dopo =) */
        list(,$val)=explode('=',$pair[1]);
        $lang[$pair[0]] = $val+$corr;
      }
		}
		// si ordina l'array per valori descrescenti dello score
		arsort($lang);
		echo "<p>";
		/* si stampa una stringa in base al codice della lingua o un messaggio di warning se la lingua non è fra quelle previste */
		foreach($lang as $l=>$v) {
			switch($l) {
				case 'it':
				  $msg="Preferisci l'Italiano con valore ";
					break;
				case 'en-us':
					$msg="You prefer English American with score ";
					break;
				case 'en':
					$msg="You prefer English with score ";
					break;
				default:
					$msg="<em>${l}</em> is an unknown language specification";
      }
			/* si elimina la correzione messa per gestire la priorità della posizione in lista */
			$v = round($v,1);
			echo "$msg $v <br />";
		}
		echo "</p>";			
		?>
	</body>
</html>