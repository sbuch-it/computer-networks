<?php
function generaMenu($options, $name, $multiple) {
  if ($multiple) {
    $multiple_option = "multiple size=\"".count($options)."\"";
  } else {
    $multiple_option = "";
  }
  echo "<select name=\"$name\" $multiple_option>";
  foreach ($options as $key => $value) {
    echo "<option name=\"$key\">$value</option>";
  }
  echo "</select>";
}
?>