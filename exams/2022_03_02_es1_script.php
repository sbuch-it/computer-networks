<?php
ini_set('display_errors',0);
session_start();

$cls = $_REQUEST['colors'];
$S = $_REQUEST['S'];
$F = $_REQUEST['F'];

//$rows = 12;
//$cols = 15;
$rows = 14;
$cols = 17;

for($i=0;$i<$rows;$i++)
  for($j=0;$j<$cols;$j++) {
    //$v = $_SESSION['array'][$i][$j]*$F;
    $v = $_SESSION['array'][$i][$j]/$F;

    // if($v<100)
    if($v<80)
      // $_SESSION['array'][$i][$j] = rand(200,255);
      $_SESSION['array'][$i][$j] = rand(180,255);
    else
      $_SESSION['array'][$i][$j] = $v;
  }
?>

<html>
  <head>
    <style>
      td {
        width: 30px;
        height: 30px;
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
        $v = (int)$_SESSION['array'][$i][$j];
        $c = $cls[rand(0,count($cls)-1)];
        $l = $S[rand(0,strlen($S)-1)];
        //echo "<td style=\"background-color: rgb($v,0,0); color: $c\">$l</td>"; // 1
        echo "<td style=\"background-color: rgb($v,0,$v); color: $c\">$l</td>";  // 2
      }
      echo "</tr>";
    }
    ?>
    </table>
  </body>
</html>