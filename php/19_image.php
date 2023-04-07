<?php
// definisce il corretto tipo MIME
//header("Content-type: " . image_type_to_mime_type(IMAGETYPE_JPEG));

// dimensioni dell'immagine
$width = 256;
$height = 256;
  
// eventuale stringa da mettere nell'immagine
// passata come parametro GET
if(!empty($_GET['text']))
  $txt = $_GET['text'];
else
  $txt = "PHP5";

// genera l'immagine  
$img = imagecreatetruecolor($width, $height);
// colore del background
$background = imagecolorallocate($img, 0xDD, 0xEE, 0xBB);
imagefill($img, 0, 0, $background);

// penna per disegnare
$pencolor = imagecolorallocate($img, 0xFF, 0x00, 0x00);

//disegna una circonferenza
imagearc($img,128,128,200,200,0,0,$pencolor);
// scrive la stringa
imagestring($img,5,100,120,$txt,$pencolor);
  
// genera e scrive un'immagine jpeg
imagejpeg($img);
  
// libera la memoria
imagedestroy($img);
?>