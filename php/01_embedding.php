<html>
  <body>
	  <h2>Che ora &egrave; per il server?</h2> 
<?php
/* Questo è uno script PHP che stampa il nome del server a cui è richiesta la pagina e la data impostata sul server */

echo "<b>Server: </b>".$_SERVER['SERVER_NAME']."<br />";

/* Stampa la data chiamando la funzione date() che produce
la data con il formato specificato come argomento
 - F: nome completo del mese
 - j: numero del giorno
 - Y: anno su 4 cifre
 - g: ora su 12
 - i: minuti con eventuale 0 iniziale
 - a: am/pm
L'operatore . concatena le stringhe.
Per non avere un messaggio di warning viene impostata la Timezone
per la generazione della data (in alternativa si può impostare
nel file php.ini con la variabile date.timezone) */

date_default_timezone_set("Europe/Rome");
echo "\n<b>Data: </b> ".date("F j, Y, g:i a")."\n";
?>
		<h2>Che browser usi?</h2>
		Client IP: <?php  echo $_SERVER['REMOTE_ADDR']; ?><br />
		Client Port: <?php  echo $_SERVER['REMOTE_PORT']; ?><br />
    Browser model: 
<?php
$agent = $_SERVER['HTTP_USER_AGENT'];
if(strpos($agent,"Firefox")) {
?>
	  <em style="color: orange">Firefox</em>
<?php } else if(strpos($agent,"Chrome")) { ?>
	  <em style="color: green">Chrome</em>
<?php } else if(strpos($agent,"Safari")) { ?>
	  <em style="color: gold">Safari</em>
<?php } else { ?>
	  <em style="color: red">Unsupported browser</em>
<?php } ?>
		<br />
    User-agent string: <em><?php echo $agent; ?></em>
  </body>
</html>