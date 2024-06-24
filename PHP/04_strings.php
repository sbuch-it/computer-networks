<?php
// if the parameter n is set in the request (either GET or POST)
if(isset($_REQUEST['n']))
	$n=(int)$_REQUEST['n'];
// select string to process by the value of $n (defult is 0)
switch($n) {
  case 0:
    $s = '=?ISO-8859-1?Q?perch=E9 =E8 una prova (iso-8859-1)?=';
    break;
	case 1:
    $s = '=?UTF-8?Q?perch=C3=A9 =C3=A8 una prova (utf-8)?=';
    break;
	case 2:
    $s= '=?ISO-8859-1?Q?perch=C3=A9 =C3=A8 una prova (utf-8)?=';
    break;
}
// split input string using ? as separator character
$parts = explode('?',$s);

// verify if the input string is a quoted printable encoding
// the first token is the = at the beginning
// the last token is the = at the end
// there are 5 tokens (the 2 =s and 3 parts)
if(count($parts)!=5||$parts[0]!='='||$parts[4]!='=') { ?>
<html>
  <body>
 	  <strong>Error: not a quoted printable string!</strong><br />
    <?php echo 'Input string: <em>'.$s.'</em>'; ?>
  </body>
</html>
<?php } else if($parts[2]!='Q') {
// verify that encoding is Q for quoted printable?>
<html>
  <body>
 	  <strong>Error: encoding is not quoted printable!</strong><br />
 	  String is encoded with <?php echo $parts[2]; ?> encoding.<br />
 	  <?php echo "Input string: <em>$s</em>"; ?>
  </body>
</html>
<?php } else {
  // the string seems a quoted printable encoding
  // set the correct charset for the HTTP header
  ini_set('default_charset', $parts[1]);
?>

<html>
  <head>
    <title>Quoted printable decoding</title>
 	  <meta charset="<?php echo $parts[1];?>" />
  </head>
  <body>
    Input string: <em><?php echo $s; ?></em><br />
 	  The converted string is <em><?php echo quoted_printable_decode($parts[3]); ?></em><br />
<?php
// strpos - Find the position of the first occurrence of a substring in a string
$mystring = 'abc';
$findme   = 'a';
$pos = strpos($mystring, $findme);

// Note our use of ===.  Simply == would not work as expected
// because the position of 'a' was the 0th (first) character.
if ($pos === false) {
    echo "The string '$findme' was not found in the string '$mystring'";
} else {
    echo "The string '$findme' was found in the string '$mystring'";
    echo " and exists at position $pos";
}
?>
  </body>
</html>
<?php } ?>