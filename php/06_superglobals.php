<html>
  <head>
    <title>Accesso alle variabili superglobali</title>
  </head>
  <body style="font-family: arial;font-size: 12px">
<?php
// stampa delle variabili di ambiente memorizzate nei vettori
// _SERVER
// _ENV
// _COOKIE
// _GET
// _POST
// _REQUEST
// _FILES
// _SESSION

$vars = array('SERVER'=>$_SERVER,
   	 			  'ENV'=>$_ENV,
   	 			  'COOKIE'=>$_COOKIE,
   	 			  'GET'=>$_GET,
   	 			  'POST'=>$_POST,
   	 			  'REQUEST'=>$_REQUEST,
   	 			  'FILES'=>$_FILES,
   	 			  'SESSION'=>$_SESSION);

// costruzione di un indice in testa alla pagina HTML
// per riferire le sezioni relative a ciascun vettore
// di variabili
foreach($vars as $vartype=>$var)
  echo "<a href=\"#_${vartype}\">\$_${vartype}</a><br />";

// Stampa i singoli vettori
foreach($vars as $vartype=>$var) {
  // titolo della sezione
  echo "<h3>Elenco \$_${vartype}</h3>";
  // ancora per l'indice in testa al file
  echo "<a name=_${vartype}></a>";
  // scorre l'array associativo relativo alla
  // variabile superglobale $var. 
  foreach($var as $element=>$val)
	  echo "<b>$element</b>: $val<br />";
}
?>
  </body>
</html>