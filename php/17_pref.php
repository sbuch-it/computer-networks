<?php
require "17-pref.inc";

/* verifica se ci sono parametri POST o GET che ridefiniscono il valori delle preferenze. In tal caso la funzione crea o aggiorna i cookie corrispondenti e ritorna il valore true. */
if(form_get_prefs()) {
	/* se sono stati aggiornati i cookie si ricarica la pagina in modo da vedere l'effetto del cambiamento (occorre che i nuovi valori siano stati aggiornati nei cookie). Con l'header Location si specifica una redirezione alla stessa pagina in modo che venga ricaricata */
	header("Location: 17-pref.php");
	// si interrompe lo script
	die();
}
?>

<html>
	<head>
		<title>Seleziona preferenze</title>
		<!-- la sezione <style> viene creata estraendo le preferenze dai cookie se sono definiti (altrimenti la sezione è vuota)-->
		<?php get_style_pref(); ?>
	</head>
	<body>
		<h2>Seleziona le tue preferenze</h2>
		<!-- form per la scelta delle preferenze. L'action è lo script stesso che in testa chiama la funzione form_get_prefs() per leggere le variabili inviate dal form -->
		<form action="17-pref.php" method="post">
			<!-- input per la proprità background-color. Le opzioni sono generate dalla chiamata di funzione get_opts("background-color") -->
			Colore dello sfondo:
			<select name="background-color">
				<?php get_opts("background-color") ?>
			</select></br />
			<!-- input per la proprità font-family. Le opzioni sono generate dalla chiamata di funzione get_opts("font-family") -->
			Tipo di carattere:
			<select name="font-family">
				<?php get_opts("font-family") ?>
			</select></br />
			<!-- input per la proprità font-size. Le opzioni sono generate dalla chiamata di funzione get_opts("font-size") -->
			Dimensione del carattere:
			<select name="font-size">
				<?php get_opts("font-size") ?>
			</select><br />
	    <input type="submit" value="Applica" /><br />
		</form>
		<!-- link alla pagina principale del mini-sito -->
		<p><a href="17-sitepage.php">Pagina principale</a></p>
	</body>
</html>