<?php
session_start();

$color = $_REQUEST['color'];
$size = $_REQUEST['size'];
$chars = $_REQUEST['chars'];

$rows = 11;
$cols = 13;

for($i=0;$i<$rows;$i++)
  for($j=0;$j<$cols;$j++) {
    $c = $chars[rand(0,count($chars)-1)];
    if(!isset($_SESSION['array'][$i][$j])) {
      $_SESSION['array'][$i][$j] = "$c$c";
    } else {
      $_SESSION['array'][$i][$j] = $_SESSION['array'][$i][$j][1].$c;
    }
  }
?>

<html>
  <head>
    <style>
      td {
        width: <?php echo $size?>;
        height: <?php echo $size?>;
        color: <?php echo $color?>;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <table>
    <?php
    for($i=0;$i<$rows;$i++) {
      echo "<tr>";
      for($j=0;$j<$cols;$j++) {
        if($_SESSION['array'][$i][$j][0]<$_SESSION['array'][$i][$j][1]) {
          $bg = "lightgreen";
        } else if($_SESSION['array'][$i][$j][0]==$_SESSION['array'][$i][$j][1]) {
          $bg = "lightyellow";
        } else {
          $bg = "lightsalmon";
        }
        echo "<td style=\"background-color: $bg\">".$_SESSION['array'][$i][$j]."</td>";
      }
      echo "</tr>";
    }
    ?>
  </table>
  </body>
</html>