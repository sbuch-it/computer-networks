<?php
// attiva l'error reporting completo  
error_reporting(E_ALL);
ini_set("display_errors", 1); 
?>

<html>
  <body>
    <h2>L'oggetto lampada</h2>
    <?php
    // definizione della classe lampada
    class lamp {
  	  // proprietà pubblica
      public $power;
	    // proprietà privata
      private $state="off";
      // costruttore
      public function  __construct($pwr) {
    	  $this->power=$pwr;
	      echo "Creata lampada da $pwr W <br />";
	    }
	  
      // metodi
      public function  turnon() {$this->state="on";}
      public function turnoff() {$this->state="off";}
      public function getstate() {return $this->state;}
    }
    // crea una lampada da 75W
    $lamp75 = new lamp(75);
  
    // stampa la variabile
    echo "<pre>";
    var_dump($lamp75);
    echo "</pre><br />";
  
    // chiama i metodi  
    echo "Stato della lampada: <em>".$lamp75->getstate()."</em><br />";
    $lamp75->turnon();
    echo "Dopo l'accensione (metodo turnon): <em>".$lamp75->getstate()."</em><br />";
    echo "Potenza della lampada: <em>".$lamp75->power."</em><br />";
    echo "Accesso allo stato privato: ";
    echo $lamp75->state."<br />";
    ?>
  </body>
</html>