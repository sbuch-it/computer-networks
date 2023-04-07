<?php
session_start();

$t = $_REQUEST['tipo'];
$cs = $_REQUEST['car'];
$n = $_REQUEST['num'];

if(!empty($t)&&!empty($cs)&&!empty($n)) {
	if($n>=1&&$n<=50) {
		foreach($cs as $c) {
			/*
                         // mostra il caso in cui si vuole memorizzare
                         // il massimo fra i valori inseriti
                         
                         if(!isset($_SESSION['max'][$t][$c])||
			$_SESSION['max'][$t][$c]<$n)
				$_SESSION['max'][$t][$c] = $n;
			echo "Tipo $t Caratteristica $c Max ".
				$_SESSION['max'][$t][$c]. "<br />";
                         */
			$_SESSION['tot'][$t][$c] += $n;
			$_SESSION['Nins'][$t][$c]++;
			echo "Tipo $t Caratteristica $c Totale ".
			$_SESSION['tot'][$t][$c]." Inserimenti ".
			$_SESSION['Nins'][$t][$c]. "<br />";

		}
	} else {
		echo "Numero di messaggi non valido";
	}
} else {
	echo "form non riempito correttamente";
}
?>
