<?php
ini_set('display_errors',0);
session_start();

$c = $_REQUEST['color'];
$size = $_REQUEST['size'];
$F = $_REQUEST['F'];

$rows = 11;
$cols = 13;

for($i=0;$i<$rows;$i++)
  for($j=0;$j<$cols;$j++) {
    $n = $F[rand(0,count($F)-1)];
    $media = ($_SESSION['array'][$i][$j]+$n*$_SESSION['array'][$i][$j-1]+$n*$_SESSION['array'][$i][$j+1])/3;
        
    if($media>255)
      $_SESSION['array'][$i][$j] = 255;
    else if($media<150)
      $_SESSION['array'][$i][$j] = 150;
    else
      $_SESSION['array'][$i][$j] = $media;
  }
?>

<html>
  <head>
    <style>
      td {
        width: <?php echo $size?>;
        height: <?php echo $size?>;
        border: 2px dotted <?php echo $c ?>}
    </style>
  </head>
  <body>
    <table>
    <?php
    for($i=0;$i<$rows;$i++) {
      echo "<tr>";
      for($j=0;$j<$cols;$j++) {
        $v = (int)$_SESSION['array'][$i][$j];
        echo "<td style=\"background-color: rgb(255,0,$v)\"></td>";
      }
      echo "</tr>";
    }
    ?>
    </table>
  </body>
</html>