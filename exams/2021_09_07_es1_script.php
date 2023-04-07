<?php
session_start();

$cls = $_REQUEST['colors'];
$dim = $_REQUEST['dim'];
$N = $_REQUEST['N'];

$rows = 16;
$cols = 12;

for($i=0;$i<$rows;$i++)
  for($j=0;$j<$cols;$j++) {
    if($_SESSION['array'][$i][$j]==0) {
      $a[$i][$j] = rand($N,255);
    } else {
      $a[$i][$j] = $N+abs($_SESSION['array'][$i][$j-1]-$_SESSION['array'][$i][$j+1]);
      if($a[$i][$j]>255)
        $a[$i][$j] = 255;
    }
  }
?>

<html>
  <head>
      <style>
        td {
          width: <?php echo $dim; ?>;
          height: <?php echo $dim; ?>;
        }
      </style>
  </head>
  <body>
    <table>
    <?php 
    for($i=0;$i<$rows;$i++) {
      echo "<tr>";
      for($j=0;$j<$cols;$j++) {
        $_SESSION['array'][$i][$j] = $a[$i][$j];
        //$c = $cls[rand(0,count($cls)-1)];
        $c = $cls[rand(0,count($cls)-1)];
        echo "<td style=\"background-color: rgb(0,0,".$a[$i][$j].");border: 2px dashed $c;\"></td>";
      }
      echo "</tr>";
    }
    ?>
    </table>
  </body>
</html>