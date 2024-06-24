<html>
  <body style="font-family: arial">
    <h2>La lista della spesa</h2>
<?php
// viene generato un array associativo con 3 elementi
$Lista_Spesa = array("Pane"=>0.5, "Latte"=>1,"Biscotti"=>3);

// se sono passati i parametri cosa e quanto nella richiesta
// HTTP (sia GET che POST), si aggiunge la quantità 'quanto'
// all'oggetto 'cosa'
if(isset($_REQUEST['cosa']) && isset($_REQUEST['quanto'])) {
  $cosa = $_REQUEST['cosa'];
  $quanto = $_REQUEST['quanto'];
  $Lista_Spesa[$cosa] += $quanto;
}

// si stampa la lista della spesa con il ciclo foreach che
// permette di scandire gli array associativi come coppie
// key => value
foreach ($Lista_Spesa as $cosa => $quanto) {
  print "Comprare: $quanto di $cosa <br />\n";
}

//         $cosa   $quanto
//  iter1  Pane      0.5
//  iter2  Latte     1
//  iter3  Biscotti  3
 
// verifica se è presente un prodotto specifico e lo stampa
print "<br />";
if(isset($Lista_Spesa['Cioccolata']))
  print "Cioccolata: {$Lista_Spesa['Cioccolata']} tavolette";
else
  print "Cioccolata: non comprare!!";
?>
    <h4>Lista ordinata</h4>
<?php
  // ordino gli elementi dell'array per chiave
  ksort($Lista_Spesa);
  foreach ($Lista_Spesa as $cosa => $quanto) {
    print "Comprare: $quanto di $cosa <br />\n";
  }  
?>
    <h2>La lista degli impegni</h2>
<?php
//crea un array a due dimensioni
// il primo indice è un intero
// non specificando l'indice gli elementi sono aggiunti in coda
$impegni[] = array('month' => 'Jan', 'day'=>10, 'hour'=>12, 'desc'=>'Lecture');
$impegni[] = array('month' => 'Feb', 'day'=>5, 'hour'=>14, 'desc'=>'Conference');
$impegni[] = array('month' => 'Mar', 'day'=>22, 'desc'=>'Birthday');

// +---+-------+-----+------+--------------+
// |   | month | day | hour |     desc     |
// +---+-------+-----+------+--------------+
// | 0 |  Jan  | 10  |  12  | Lecture      |
// +---+-------+-----+------+--------------+
// | 1 |  Feb  |  5  |  14  | Conference   |
// +---+-------+-----+------+--------------+
// | 2 |  Mar  | 22  |  ND  | Birthday     |
// +---+-------+-----+------+--------------+

//  $impegni[0]['month'] Jan (string)
//  $impegni[0]['day'] 10 (integer)
//  $impegni[0]['hour'] 12 (integer)
//  $impegni[0]['desc'] Lecture (string)

// // scorre la lista degli elementi usando un indice intero
// L'alternativa è usare il ciclo foreach($impegni as $impegno)
// count indica i numero di lementi dell'array
// !! l'ipotesi è che gli indici siano in sequenza !!!

for($i=0;$i<count($impegni);$i++) {
  // gli elementi dell'array bidimensionale si specificano
  // con il dioppio indice. Nelle costanti stringa double quoted
  // gli elementi dia rray devono stare fra {}
  print "$i. {$impegni[$i]['month']} {$impegni[$i]['day']}";
	if(isset($impegni[$i]['hour']))
	  print " at {$impegni[$i]['hour']}";
	print ": <em>{$impegni[$i]['desc']}</em><br />";  
}
?>
  </body>
</html>