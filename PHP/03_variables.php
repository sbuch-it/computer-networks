<html>
  <head>
    <title>Variabili in PHP</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  </head>
  <body style="font-family: Arial">
    <h2>Inizializzazione delle variabili</h2>
    <p>Una variabile PHP viene definita al momento del primo uso. Utilizzando i costrutti <tt>bool isset($var)</tt> e <tt>bool empty($var)</tt> è possibile verificare se una variabile è stata già definita o meno.</p>
    <p>Il seguente box contiene l'esito di <tt>isset</tt> e <tt>empty</tt> sulla variabile <tt>$_REQUEST['prodotto']</tt> che si riferisce all'elemento di input <tt>prodotto</tt> passato da un form HTTP sia con metodo GET che POST.</p>
    <p style="border: 5px groove gray">
<?php
  if(isset($_REQUEST['prodotto']))
    echo "FORM variable <tt>prodotto</tt> is set <br />";
  else
    echo "FORM variable <tt>prodotto</tt> is not set <br />";

  if(empty($_REQUEST['prodotto']))
    echo "FORM variable <tt>prodotto</tt> is empty <br />";
  else
    echo "FORM variable <tt>prodotto</tt> is not empty <br />";
?>
    </p>
    <p>È possibile cambiare l'esito della verifica effettuando la richiesta dopo aver aggiunto <tt>?prodotto=val</tt> in fondo all'URL. Se <tt>val</tt> è 0 o la stringa vuota <tt>empty</tt> produce il valore <tt>true</tt>.</p>
    <p> Il seguente box contiene l'esito delle verifiche dei costrutti <tt>isset()</tt> e <tt>$empty</tt> su variabili definite o meno in precedenza. Con la funzione <tt>var_dump($var)</tt> si stampa il contenuto e il tipo della variabile.</p>
    <ul style="border: 5px groove gray">
      <li style="margin-bottom: 8px">
        <em>La variabile <tt>$v</tt> è definita assegnando il valore <tt>0</tt></em>. <br />
<?php
  $v = 0; 
  if(!isset($v))
    echo 'The variable <tt>$v</tt> is not set<br />';
  else
    echo 'The variable <tt>$v</tt> is set<br />';

  if(empty($v))
    echo 'The variable <tt>$v</tt> is empty<br />';
  else 
    echo 'The variable <tt>$v</tt> is not empty<br />';
  
  echo 'Dump of variable <tt>$v</tt>: ';
  var_dump($v);
?>
      </li>
      <li style="margin-bottom: 8px">
	      <em>La variabile <tt>$v1</tt> non è definita.</em> <br />
<?php
  if(!isset($v1))
    echo 'The variable <tt>$v1</tt> is not set<br />';
  else
    echo 'The variable <tt>$v1</tt> is set<br />';

  if(empty($v1))
    echo 'The variable <tt>$v1</tt> is empty<br />';
  else 
    echo 'The variable <tt>$v1</tt> is not empty<br />';
  
  echo 'Dump of variable <tt>$v1</tt>: ';
  var_dump($v1);
?>
      </li>
      <li style="margin-bottom: 8px">
      <em>La variabile <tt>$v1</tt> viene usata senza essere inizializzata. Viene utilizzata per la prima volta nell'assegnazione <tt>$v2=$v1+2</tt> ed assume quindi il valore 0 intero ma non viene inizializzata.</em> <br />
<?php
  $v2 = $v1+2;
  if(!isset($v1))
    echo 'The variable <tt>$v1</tt> is not set<br />';
  else
    echo 'The variable <tt>$v1</tt> is set<br />';

  if(empty($v1))
    echo 'The variable <tt>$v1</tt> is empty<br />';
  else 
    echo 'The variable <tt>$v1</tt> is not empty<br />';
  
  echo 'Dump of variable <tt>$v1</tt>: ';
  var_dump($v1);
  echo '<br />';
  echo 'Dump of variable <tt>$v2</tt>: ';
  var_dump($v2);
?>
      </li>
    </ul>

    <h2>Conversione di tipo</h2>
    <p>La conversione di tipo avviene in modo implicito in base al contesto. La variabile assume il tipo del valore in un'istruzione di assegnazione, mentre quando viene usata in un'epressione il valore viene convertito al tipo più opportuno.</p>

    <ul style="border: 5px groove gray">
      <li style="margin-bottom: 8px">
        Alla variabile <tt>$var</tt> viene assegnato il valore della costante <tt>10</tt><?php $var= 10; ?> e quindi assume il tipo <tt><?php echo gettype($var); ?></tt> con valore <tt><?php echo '$var = '.$var; ?></tt>.
      </li>

      <li style="margin-bottom: 8px">
        Se si calcola l'espressione <tt>$var *= 1.5</tt><?php $var *= 1.5; ?> la variabile diventa di tipo <tt><?php echo gettype($var); ?></tt> con valore <tt><?php echo '$var = '.$var; ?></tt>.
      </li>

      <li style="margin-bottom: 8px">
        Se si esegue l'assegnazione <tt>$var+="44 cats"</tt><?php $var += "44 cats"; ?> la variabile è ora di tipo <tt><?php echo gettype($var); ?></tt> con valore <tt><?php echo '$var = '.$var; ?></tt>. La costante stringa "44 cats" viene convertita nel tipo della variabile (double) facendo una scansione da sinistra fino a che si trovano cifre.
      </li>

      <li style="margin-bottom: 8px">
        Se si esegue l'assegnazione <tt>$s = "2+$var"</tt><?php $s = "2+$var"; ?> la variabile <tt>$var</tt> si trova nel contesto della definizione di una costante stringa con <em>double quotes</em> e ne viene usato il valore scritto come stringa di caratteri. Quindi il tipo di <tt>$s</tt> è <tt><?php echo gettype($s); ?></tt> e il suo valore è <tt><?php echo $s;?></tt>.
      </li>

      <li style="margin-bottom: 8px">
        Se si utilizza la variabile <tt>$s</tt> in un contesto numerico essa viene convertita con scansione delle cifre decimali da sinistra a destra. Si può vedere come avviene la conversione facendo un'assegnazione con cast <tt>$yav = (int)$s</tt> <?php $yav = (int)$s;?> ottendo che <tt>$yav</tt> è di tipo <tt><?php echo gettype($yav); ?></tt> con valore <tt><?php echo $yav; ?></tt>. Come si può vedere la conversione non implica fare una valutazione di un'eventuale espressione contenuta nella stringa.
      </li>
    </ul>

    <h2>Costanti stringa</h2>
    <p>Una stringa è una sequenza di caratteri codificati su un byte.
    Una stringa può essere definita usando i doppi apici (<em>double quoted</em>) come in <tt>$str = "Questa è una stringa";</tt><?php $str = "Questa è una stringa"; ?> che si stampa in <tt><?php echo $str; ?></tt> ed è di lunghezza <tt><?php echo strlen($str); ?></tt>. Il fatto che la codifica è a 8 bit si vede cercando di stampare il carattere nella posizione 7 che dovrebbe corrispondere a 'è' ma invece risulta <tt><?php echo $str[7]; ?></tt> che è il primo carattere della sua codifica Unicode che è su 2 byte.</p>
    <p> Se si usa la definizione <em>single quoted</em> eventuali variabili o sequenze di escape non vengono convertite nel loro valore. Se si assegna <tt>$cats=44</tt>
	  <?php $cats=44 ?> e si stampa la stringa <tt>'$cats cats\n'</tt> si ottiene
	  <tt><?php echo '$cats cats\n'; ?></tt> mentre con <tt>"$cats cats\n"</tt> si
	  stampa <tt><?php echo "$cats cats\n"; ?></tt>.</p>
    <p> In alcuni casi può essere necessario delimitare le variabili (o il loro nome) con parentesi graffe {} per separarle dal testo che deve comparire subito dopo senza caratteri di separazione. Ad esempio se si definiscono le variabili <tt>$fruit="apple"; $howmany="four";</tt> <?php $fruit="apple"; $howmany="four";?> e si stampa la stringa <tt>"I ate $howmany $fruits"</tt> si ottiene <tt><?php echo "I ate $howmany $fruits";?></tt>, mentre con <tt>"I ate $howmany ${fruit}s"</tt> si ha la stampa corretta <tt><?php echo "I ate $howmany ${fruit}s";?></tt>.</p>
  </body>
</html>