/* costruttore per l'oggetto che definisce
un input field sotto controllo.
  - id è l'identificatore del campo nel documento HTML
  - trId è l'identificatore della riga su cui si trova il campo
  - checkId è il nome della funzione da usare per il check fra
		quelle definite nell'oggetto (sono definite come campi del
		prototipo dell'oggetto)
  - check è la funzione da usare per la verifica
  - errMsg contiene l'eventuale messaggio di errore
		generato nel controllo */

function Field(id,trId,checkId) {
	this.field = document.getElementById(id);
	this.tr = document.getElementById(trId);
	this.check = this[checkId];
	this.errMsg = "";
}

/* funzioni prototipo per il controllo custom di varie
tipologie di campi. Il nome della proprietà corrisponde
al tipo da indicare nel costruttore dell'oggetto.
La funzione ritorna true se il campo è valido. Se non
è valido ritorna false e inizializza la proprietà errMsg
dell'oggetto con la stringa che descrive l'errore */

// funzione che verifica se il campo è vuoto

Field.prototype.isEmpty = function() {
	if (this.field.value!="")
	  return true;
	else {
	  this.errMsg = "Campo obbligatorio"
	  return false;
	}
}

// funzione che verifica se il campo è un codice fiscale
// (il controllo è parziale: si verifica solo che ci siano
// 16 caratteri e non se la struttura della stringa è corretta)

Field.prototype.isCF = function() {
	if (this.field.value.length==16)
	  return true;
	else {
	  this.errMsg = "Codice Fiscale non valido"
	  return false;
	}
}

// funzione che verifica se il campo contiene un indirizzo
// email valido (in realtà si verifica solo che ci sia almeno
// un simbolo @, il controllo dovrebbe essere più preciso)
	
Field.prototype.isEmail = function(val) {
	s = new String(this.field.value);
	if(s.indexOf("@")!=-1)
	  return true;
	else {
	  this.errMsg = "Indirizzo mail non valido"
	  return false;
	}
}

// inizializza l'array con i campi da controllare
fields = new Array();

function initCheckFncts() {
  fields.push(new Field("nome","trNome","isEmpty"));
  fields.push(new Field("cognome","trCognome","isEmpty"));
  fields.push(new Field("CF","trCF","isCF"));
  fields.push(new Field("email","trEmail","isEmail"));  	
}

// funzione di gestione dell'evento onsubmit
// - ritorna true se i campi sono validi, false altrimenti
// - evidenzia i campi con errori

function checkFields() {
	check = true;
	bgColor = document.body.style.backgroundColor;
	bgError = "LightCoral";

  // controlla tutti i campi
  for(i=0;i<fields.length;i++) {
    tr = fields[i].tr;
       
    // resetta lo stato della riga nel caso fosse
    // stato rilevato un errore in precedenza
	  tr.style.backgroundColor = bgColor;
	   
	  // elimina una eventuale cella della tabella aggiunta per
	  // descrivere l'errore
		// (è identificata dalla proprietà err a true)
	  for(j=tr.childNodes.length-1;j>=0;j--)
	   	if(tr.childNodes[j].err) {
	   	  tr.removeChild(tr.childNodes[j]);
	   	  break;
	    }
	   	  
	  // effettua il controllo sulla cella
    if(!fields[i].check()) {
    	// aggiunge la cella per il messaggio di errore
      newCell = document.createElement("td");
      newCell.style.fontSize = "10";
      newCell.err = true;
      newCell.appendChild(document.createTextNode("* "+fields[i].errMsg));
      tr.appendChild(newCell)
       	 
      // cambia il colore dello sfondo della riga
 		 	tr.style.backgroundColor = bgError;
      check = false;
    }
  }	
	return check;
}