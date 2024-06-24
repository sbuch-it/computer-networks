<?php
/* definizione delle proprietà che sono definibili nella pagina delle preferenze con i relativi valori ammessi */

$properties = array(
  // colore dello sfondo
  "background-color" => array("AliceBlue"=>"AliceBlue",
  							"Beige"=>"Beige",
  							"Lavender"=>"Lavender",
  							"LightPink"=>"LightPink"),
  // tipo di font per i caratteri
  "font-family" => array("Arial"=>"arial",
  						  "Helvetica"=>"helvetica",
  						  "Courier"=>"courier",
  						  "Georgia"=>"georgia"),
  // dimensioni (in pixel) predefinite per i caratteri
  "font-size" => array("Small"=>"8px",
  					    "Medium"=>"12px",
  					    "Large"=>"16px")
);

/* stampa la sezione <style> dell'header di un file HTML usando i valori preferiti inviati dal browser come cookie. Le preferenze si applicano alla sezione <body> del documento. I cookie sono organizzati in un array PHP chiamando i singoli elementi con il nome degli elementi dell'array ovvero pref['nome proprietà'] */

function get_style_pref() {
	global $properties;
	
  echo "<style>\n";
	// per tutte le proprietà oggetto di preferenza
	foreach($properties as $prop=>$values) {
		// se la prorietà è definita nel cookie si genera la riga corrispondente */
		$val = $_COOKIE['pref'][$prop];
		if(!empty($val))
		  echo "body { $prop: $val }\n";
	}
  echo "</style>";	
}

// stampa la lista delle opzioni per un elemento <select> per la proprietà passata come parametro */
function get_opts($prop) {
  global $properties;

  /* se la proprietà è già definita in un cookie si estrae il valore attuale per definire l'opzione selezionata nel menu */
  if(!empty($_COOKIE['pref'][$prop]))
     $selected = $_COOKIE['pref'][$prop];
  
  // si stampano le opzioni disponibili
  foreach($properties[$prop] as $name=>$val) {
  	if($val==$selected)
		$sel = "selected=\"selected\"";
	else
		$sel = "";
	/* l'elemento del menu è visualizzato con lo style proprio dell'opzione che permette di scegliere $name è la stringa visualizzata nel menu mentre $val è il valore della proprietà associato come valore dell'opzione */
  echo "<option $sel style=\"$prop: $val\" value=\"$val\">$name</option>";
  }
}

/* funzione che estrae i valori delle opzioni dai campi inviati con un form HTML. Il nome dell'elemento di input del form (il nome della variabile GET o POST) è quello della proprietà.
La funzione setta un cookie che corrisponde ad un array 'pref'  in cui il nome della proprietà è la chiave per accedere al valore. Si può creare un array PHP in un cookie assegnandoli come nome la stringa che definisce l'elemento di un array. La funzione produce il valore true se almeno una proprietà è stata inviata come variabile $_REQUEST altrimenti ritorna false */

function form_get_prefs() {
  global $properties;
  
  // default: nessuna proprietà trovata
  $retval = false;	
  // per ogni proprietà che può essere specificata
  foreach($properties as $prop=>$values) {
  	// estrae il valore della variabile $_REQUEST corrispondente
  	$setprop = $_REQUEST[$prop];
	  /* se la variabile $_REQUEST non è definita per la proprietà $prop si passa alla successiva */
    if(empty($setprop))
		  continue;
	  /* se si arriva qua la proprietà è definita e si setta il cookie. Questa funzione deve essere chiamat prima di generare qualsiasi output del corpo della risposta HTTP a meno di non usare le funzioni di output buffering */
	  setcookie("pref[$prop]","$setprop",0);
    // ha trovato almeno una proprietà
	  $retval = true;
  }
  return $retval;
}
?>