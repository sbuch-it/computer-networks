<?php
session_start();

$c = $_REQUEST['color'];
$chars = $_REQUEST['chars'];
$nums = $_REQUEST['nums'];

$dim = 15;

for($i=0;$i<$dim;$i++)
  for($j=0;$j<$dim;$j++) {
    $sum = $_SESSION['array'][$i][$j]+$nums[rand(0,count($nums)-1)];
        
    if($sum>1) {
      $_SESSION['array'][$i][$j] = 1;
    } else if($sum<0) {
      $_SESSION['array'][$i][$j]=0;
    } else {
      $_SESSION['array'][$i][$j]=$sum;
    }
  }
?>

<html>
  <head>
    <style>
      td {background-color: <?php echo $c; ?>;}
    </style>
  </head>
  <body>
    <table>
    <?php
    for($i=0;$i<$dim;$i++) {
      echo "<tr>";
      for($j=0;$j<$dim;$j++) {
        $chr = $chars[rand(0,count($chars)-1)];
        $o = $_SESSION['array'][$i][$j];
        echo "<td style=\"opacity: $o\">$chr</td>";
      }
      echo "</tr>";
    }
    ?>
    </table>
  </body>
</html>