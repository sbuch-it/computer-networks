<?php
session_start();

$cls = $_REQUEST['colors'];
$size = $_REQUEST['size'];
$N = $_REQUEST['N'];

$rows = 10;
$cols = 12;

for($i=0;$i<$rows;$i++)
  for($j=0;$j<$cols;$j++) {
    if(rand(0,$N)==1) {
      $_SESSION['array'][$i][$j] = null;
    } else if(!isset($_SESSION['array'][$i][$j])) {
      $_SESSION['array'][$i][$j] = $cls[rand(0,count($cls)-1)];
    } else {
      $di = rand(-1,1);
      $dj = rand(-1,1);
      $temp = $_SESSION['array'][$i][$j];
      $_SESSION['array'][$i][$j] = $_SESSION['array'][$i+$di][$j+$dj];
      $_SESSION['array'][$i+$di][$j+$dj] = $temp;
    }
}
?>

<html>
  <head>
      <style>
        td {
          width: <?php echo $size?>;
          height: <?php echo $size?>
        }
      </style>
  </head>
  <body>
    <table>
    <?php
    for($i=0;$i<$rows;$i++) {
      echo "<tr>";
      for($j=0;$j<$cols;$j++) {
        if(isset($_SESSION['array'][$i][$j])) {
          $c = $_SESSION['array'][$i][$j];
        } else {
          $c = 'white';
        }
        echo "<td style=\"background-color: $c\"></td>";
      }
      echo "</tr>";
    }
    ?>
    </table>
  </body>
</html>