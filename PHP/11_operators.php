<html>
	<head>
	  <title>Variable variables</title>
	</head>
	<body>
	<?php
	$users = array('admin'=>'12345',
	   				     'marco'=>'6789',
					       'pippo'=>'pluto');
	/* l'uso di variabili variabili permette di rendere più compatto il codice quando devono essere caricate delle variabili da un array indicizzato con i loro nomi */
	
  /* si estraggono i valori delle variabili di un form e si assegnano alle variabili corrispondenti con un unico ciclo */
  foreach($_REQUEST as $var=>$val)
	  $$var = $val;
	
  /* le varibili $user e $pass sono specificate nella richiesta HTTP */
	if(!empty($users[$user])&&($users[$user]==$pass)) {
	  echo "Welcome ${user}!<br />";
	if($user=='admin')
		echo 'You have administration privileges!';
	} else {
		echo "Login failed: you have guest privileges";
	}
	?>    	
	</body>
</html>