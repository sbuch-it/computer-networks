<?php
// directory dei file
$contentdir = "./";

// array dei contenuti predefiniti
$index = array("php" => array("titolo"=>"PHP language", "file"=>"php"),"asp" => array("titolo"=>"ASP language", "file"=>"asp"),"jsp" => array("titolo"=>"JSP language", "file"=> "jsp"));

// fornisce la stringa titolo associata all'identificatore $id
function include_title($id) {
	global $index; // altrimenti $index non sarebbe visibile
  if(!empty($index[$id]['titolo']))
		return $index[$id]['titolo'];
	else
		return "Contenuto non disponibile";
}

/* manda in output il contenuto associato all'identificatore $id includendo il file corrispondente. Nel file si suppone che sia definita anche la variabile $last_modified */
function include_content($id) {
  // variabili globali
  global $index, $contentdir;
  
	/* se si commenta non è più accessibile all'esterno della funzione */
  global $last_modified;
  if(!empty($index[$id]['file'])) {
  	// il nome del file da includere è definito dinamicamente
  	include "${contentdir}{$index[$id]['file']}.inc";
	}
	else {
		echo "Contenuto non disponibile";
	}
}  
?>