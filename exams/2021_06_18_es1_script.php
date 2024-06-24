<?php
session_start();

$cls = $_REQUEST['colors'];
$sz = $_REQUEST['size'];
$N = $_REQUEST['N'];

$dim = 14;

for($i=0;$i<$dim;$i++)
  for($j=0;$j<$dim;$j++) {
    $v = $_SESSION['array'][$i][$j]+rand(-$N,$N);
    if($v>15)
      $_SESSION['array'][$i][$j] = 15;
    else if($v<1)
      $_SESSION['array'][$i][$j] = 1;
    else
    $_SESSION['array'][$i][$j] = $v;
  }
?>

<html>
  <head>
    <style>
      td {
        width: <?php echo $sz; ?>;
        height: <?php echo $sz; ?>;
      }
    </style>
  </head>
  <body>
    <table>
    <?php
    for($i=0;$i<$dim;$i++) {
      echo "<tr>";
      for($j=0;$j<$dim;$j++) {
        $c = $cls[rand(0,count($cls)-1)];
        echo "<td style=\"border: ".$_SESSION['array'][$i][$j]."px solid $c\"></td>";
      }
      echo "</tr>";
    }
    ?>
    </table>
  </body>
</html>