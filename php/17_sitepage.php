<?php require "17-pref.inc"; ?>

<html>
	<head>
		<title>Seleziona preferenze</title>
		<!-- la sezione <style> viene creata estraendo le preferenze dai cookie se sono definiti (altrimenti la sezione è vuota)-->
		<?php get_style_pref(); ?>
	</head>
	<body>
		<h2>Selezione delle preferenze</h2>
		<p>Le preferenze per la generazione delle pagine Web (colore dello sfondo, tipo di font per i caratteri, dimensione dei caratteri) sono memorizzate in cookie che vengono generati dallo script associato alla pagina di <a href="17-pref.php">selezione delle preferenze</a>.</p>
		<p>I cookie nella intestazione HTTP questione sono i seguenti.
			<ul>
			<?php
			// stampa i cookie presenti nell'intestazione
			foreach($_COOKIE as $name=>$val) {
				echo "<li><b>$name</b>: <pre>";
				var_dump($val);
				echo "</pre></li>";
			}
			?>
			</ul>
		</p>
		<a href="17-pref.php">Selezione preferenze</a>
	</body>
</html>