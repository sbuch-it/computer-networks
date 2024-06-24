<?php
session_start();

$tags = $_REQUEST['tags'];
$type = $_REQUEST['type'];
$N = $_REQUEST['N'];

$rows = 15;
$cols = 20;

for($i=0;$i<$rows;$i++)
  for($j=0;$j<$cols;$j++) {
    $m=($_SESSION['array'][$i-1][$j-1]+$_SESSION['array'][$i+1][$j+1])/2;       
    $d = $_SESSION['array'][$i][$j]-$m;
    if($d<-$N)
      $a[$i][$j] = $_SESSION['array'][$i][$j]+$N;
    else if ($d>$N)
      $a[$i][$j] = $_SESSION['array'][$i][$j]-$N;
    else
      $a[$i][$j] = rand(0,255);
  }
?>

<html>
  <head>
    <style>
      td {border: 2px <?php echo $type; ?> salmon;}
    </style>
  </head>
  <body>
    <table>
    <?php 
    for($i=0;$i<$rows;$i++) {
      echo "<tr>";
      for($j=0;$j<$cols;$j++) {
        $l = $_SESSION['array'][$i][$j] = $a[$i][$j];
        $tag = $tags[rand(0,count($tags)-1)];
        echo "<td style=\"background-color: rgb($l,$l,$l)\"><$tag>O</$tag></td>";
      }
      echo "</tr>";
    }
    ?>
    </table>
  </body>
</html>