<?php
error_reporting(E_ALL);
ini_set("display_errors", 1); 
?> 

<html>
  <head>
	  <title>File upload script</title>
  </head>	
  <body style="font-family: arial">
<?php
if(!empty($_FILES['file'])&&($_FILES['file']['size']>0)) {?>
	  <h2>Uploaded file info</h2>
		<!--stampa le informazioni disponibili nell'array associato al
			file di cui si è fatto l'upload -->
		<b>Name: </b><em><?php echo $_FILES['file']['name']; ?></em><br />
		<b>Type: </b><em><?php echo $_FILES['file']['type']; ?></em><br />
		<b>Size: </b><em><?php echo $_FILES['file']['size']; ?></em><br />
		<b>Tmp_name: </b><em><?php echo $_FILES['file']['tmp_name']; ?></em><br />
		<b>Error: </b><em><?php echo $_FILES['file']['error']; ?></em><br />

<?php
  // copia il file temporaneo nella sottodirectory upload
  if($_FILES['file']['error']==0) {
    /* determina il path assoluto a partire da quello dello script la cartella upload deve essere scrivibile dall'utente con cui è eseguito il server web o dal suo gruppo (dipende dal SO) */
    $uploaddir = dirname($_SERVER['SCRIPT_FILENAME'])."/upload/";
    
    /* si aggiunge il nome al percorso usando il nome originario del file */
    $filename = $uploaddir.basename($_FILES['file']['name']);
    
    /* si sposta il file in modo safe e si verifica l'esito */
    if(move_uploaded_file($_FILES['file']['tmp_name'], $filename))
      echo "File uploaded successfully<br />";
    else 
      echo "Error: File not uploaded!<br />";
  }
} else {
?>
		<strong>Error: no file was uploaded!</strong>
<?php
}
?>
  </body>
</html>