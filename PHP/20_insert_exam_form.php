<html>
<body style="background-color: lavender;font-family: arial">
        <?php 
            // connect to database
            require "DBConnect.php";
        ?>

        <h2>Registra un esame</h2>
        <form action="20-InsertExam.php" method="post">
            Studente <select name="studente">
            <?php
                // get student list from DB
                $query = "SELECT matricola, nome, cognome FROM studenti".
                            " ORDER BY cognome, nome";

                $result = mysqli_query($conn,$query);
                if(!$result) {
                    echo "Database error: ".mysqli_error($conn)."</body></html>";
                    mysqli_close($conn);
                    die();
                }
                // write select options
                while($row = mysqli_fetch_array($result)) {
                    echo "<option value=${row[0]}>${row[2]} ${row[1]}</option>";
                }
                mysqli_free_result($result);
            ?></select><br />
            Esame <select name="esame">
            <?php
                // get exam list from DB
                $query = "SELECT codice, titolo FROM corsi ORDER BY titolo";

                $result = mysqli_query($conn,$query);
                if(!$result) {
                    echo "Database error: ".mysqli_error($conn)."</body></html>";
                    mysqli_close($conn);
                    die();
                }
                // write select options
                while($row = mysqli_fetch_array($result)) {
                    echo "<option value=${row[0]}>${row[1]}</option>";
                }
                mysqli_free_result($result);
                
                // close DB connection
                mysqli_close($conn);

            ?></select><br />
            Voto <input type="text" name="voto" size="2"/><br />
            <input type="submit" value="Inserisci" />
        </form>
        <a href="20-DBexample.php">Visualizza risultati</a>
    </body>
</html>