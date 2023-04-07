<html>
<body style="background-color: lavender;font-family: arial">
<?php
  // connect to DB
  require "DBConnect.php";
        
  // issue a query
  $query = "SELECT nome, cognome, titolo, voto
            FROM studenti, corsi, esami
            WHERE esami.matricola=studenti.matricola AND esami.corso=corsi.codice".
            " ORDER BY cognome, nome, titolo";

  $result = mysqli_query($conn,$query);
  // verify the query result
  if(!$result) {
    echo "Database error: ".mysqli_error($conn)."</body></html>";
	mysqli_close($conn);
	die();
  }
  
  echo "<h2>Esami degli studenti</h2>";
  echo "<table style=\"border: 2px solid gray; border-collapse: collapse\">\n";
  // table rows
  while ($row = mysqli_fetch_row($result)) {
    echo "\t<tr>\n";
    // table columns
    foreach ($row as $col_value)
        echo "\t\t<td style=\"border: 1px solid black;\" >$col_value</td>\n";
    echo "\t</tr>\n";
  }
  echo "</table>\n";

  // Free resultset
  mysqli_free_result($result);
  // Closing connection
  mysqli_close($conn);
?>
<a href="20-InsertExamForm.php">Inserisci Esame</a>
</body>

</html>