<?php
  // DB connection
  $dbmshost = '127.0.0.1';
  $dbmsuser = 'root';
  $dbmspass = 'MarcoMaggini22';
  $dbname = 'carriere';
  
  //Connect & select database (mysql)
  $conn = mysqli_connect($dbmshost,$dbmsuser,$dbmspass,$dbname);

  // verify connect result
  if(!$conn) {
  	echo "<h1>Database connection problems</h1>".mysqli_connect_error().
             "<a href=\"20-DBexample.php\">Visualizza risultati</a><br />".
             "<a href=\"20-InsertExamForm.php\">Inserisci Esame</a></body></html>";
	die();
  }
?>