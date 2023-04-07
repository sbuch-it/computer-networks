<?php
/* attiva il reporting degli errori se si vuole attivare il reporting per un'espressione, la si deve far precedere dall'operatore @ */
error_reporting(E_ALL);
ini_set("display_errors", 1); 
// include lo script PHP che definisce le funzioni 
require '14_functions.inc';
?>
<html>
	<head>
		<title>Esempio di include</title>
	</head>
	<body>
	<?php
	/* l'identificatore del contenuto da visualizzare è inviato tramite la variabile content di un form (sia POST che GET). Si disabilita il reporting per evitare la visualizzazione del messaggio di warning se si chiama lo script senza passare la variabile content. */
	$content = @$_REQUEST['content'];
	//$content = $_REQUEST['content'];
			
	// verifica se è stato passato l'id di un contenuto  
	if(empty($content)) { ?>
		<h2>Error: no content selected</h2>
		</body></html>
	<?php
		die();
	}
	?>
		<!-- chiama la funzione include_title per determinare la stringa da visualizzare nell'intestazione. La funzione è definita nel file 14-functions.inc -->
		<h2> <?php echo include_title($content); ?></h2>
		<div style="text-align: justify;border: 5px solid DodgerBlue;padding:5px">
			<!-- chiama la funzione include_content per inserire del testo da visualizzare nel box. La funzione è definita nel file 14-functions.inc -->
			<?php include_content($content); ?>
		</div>
		<!-- stampa la variabile $last_modified inibendo l'error reporting nel caso in cui la variabile non risulti definita (es. quando l'id non corrisponde a nessun contenuto o se erroneamente non si dichiara global nella funzione include_content )-->
		<em>Last modified: </em><?php echo @$last_modified ?>
	</body>
</html>