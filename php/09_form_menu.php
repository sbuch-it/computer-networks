<?php
function generaMenu($name,$options,$multiple) {
  if ($multiple) {
    $opt = "name=\"${name}[]\" multiple size=\"".count($options)."\"";
  } else {
    $opt = "name=\"$name\"";
  }
  echo "<select $opt>";
  foreach ($options as $key => $value) {
    echo "<option value=\"$key\">".$value."</option>";
  }
  echo "</select>";
}

$opt_menu1 = ["opz1","opz2","opz3"];
$opt_menu2 = $opt_menu1;
$opt_menu3 = ["332211"=>"Mario Rossi","112233"=>"Mario Verdi","221133"=>"Mario Bianchi"];
?>

<html>
  <body>
    <form action="" method="GET">
      <h2>Menu 1: menu a tendina</h2>
      <?php generaMenu("menu1",$opt_menu1,false); ?>
      <h2>Menu 2: menu con scelta multipla</h2>
      <?php generaMenu("menu2",$opt_menu2,true); ?>
      <h2>Menu 3: menu a tendina con chiave per ogni valore</h2>
      <?phpgeneraMenu("menu3",$opt_menu3,false);?>
      <input type="submit" value="Invia">
    </form>
    <h2>Variabili GET</h2>
    <?php
    foreach($_GET as $key => $value) {
      echo "<b>$key</b>: $value<br>";
    }
    ?>
  </body>
</html>