// Costruttore degli oggetti della classe TextBox

function TextBox(txt,clr,bgclr,size) {
	// definizione delle proprietà
	this.color = clr;
	this.bgcolor = bgclr;
	this.size = size;
	this.text = txt;
    
  var st = "color: "+clr+";";
	st += "background-color: "+bgclr+";";
  st += "font-size: "+size+";";
  
	this.style = st;
}

/* definizione dei metodi della classe TextBox usando
la proprietà prototype che permette di definire proprietà e
metodi comuni a tutti gli oggetti della classe */

TextBox.prototype.createBox = function() {
	return "<span style=\""+this.style+"\">"+this.text+"</span>"; 
}

/* costruttore della classe TextRichBox che è una sottoclasse
di TextBox. E' utilizzato l'object masquerading e il prototype
chaining per simulare l'eredità fra le classi che non è prevista
da javascript in modo esplicito. */

function TextRichBox(txt,clr,bgclr,size,font) {
	/* si chiama il costruttore della classe padre per aggiungere
	tutte le proprietà usando il metodo call(obj,arg1,...) dove obj
	è il riferimento usato come this nel costruttore */
	TextBox.call(this,txt,clr,bgclr,size);

	// proprietà aggiunte o modificate
	this.font = font;
	this.style += "font-family: "+font+";"
}

/* si sostituisce il prototipo della classe derivata
con quello della classe padre. */
TextRichBox.prototype = new TextBox();

/* Si possono poi aggiungere al prototipo eventuali
metodi locali alla classe derivata */
TextRichBox.prototype.getFont = function() {return this.font;}

/* funzione per stampare le proprietà enumerabili
di un oggetto in una lista HTML */

function propertiesToList(obj,listId) {
  // scorre la lista delle proprietà enumerabili
	for(p in obj) {
	
	  // crea l'elemento usando la libreria DOM
	  // si crea il nodo per il list item <li>..</li>
	  var liEl = document.createElement("li");

	  // si aggiunge la prima parte del testo a <li>
	  liEl.appendChild(document.createTextNode(p+": "));

	  // si crea un nodo <em>...</em>
	  var emEl = document.createElement("em");

	  // si aggiunge il testo al nodo <em>
	  emEl.appendChild(document.createTextNode(obj[p].toString()));

	  // si aggiunge il nodo <em> come figlio del nodo <li>
	  liEl.appendChild(emEl);

	  // si aggiunge il nodo <li> al nodo padre passato come
	  // parametro della funzione
	  listId.appendChild(liEl);
	}
}