<html>
<body style="background-color: lavender;font-family: arial">
        <?php
           // get form variable
           $esame = $_REQUEST['esame'];
           $studente = $_REQUEST['studente'];
           $voto = $_REQUEST['voto'];
           // verify form
           if(empty($esame)||empty($studente)||empty($voto)) {
               echo "<h2>Form incompleto</h2>";
           } else {
               // connect to database
               require "DBConnect.php";

               // insert query
                $query = "INSERT into esami values ('$studente','$esame',$voto)";

                $result = mysqli_query($conn,$query);
                // verify result
                if(!$result) {
                    echo "Database error: ".mysqli_error($conn)."<br />";
                } else {
                    echo "Esame inserito <br />";
                }
                // close DB connection
                mysqli_close($conn);
           }
        ?>
        <a href="20-DBexample.php">Visualizza risultati</a><br />
        <a href="20-InsertExamForm.php">Inserisci Esame</a>
</body>
</html>
