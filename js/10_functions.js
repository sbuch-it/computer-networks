/* gestore degli eventi (stampa informazioni
aggiuntive solo per keypress e click) */

function listevent(event) {
	// riferimento all'elemento in cui inserire il log dell'evento
	ul = document.getElementById("eventList");
	
	// crea l'elemento LI per la lista
	li = document.createElement("li");
	
	// informazione sul tipo dell'evento (event.type)
	li.appendChild(document.createTextNode("Type: "));
	em = document.createElement("em");
	txt = document.createTextNode(event.type);
	em.appendChild(txt);
	li.appendChild(em);
	
	/* informazioni sull'elemento in cui
	è stato generato l'evento (event.target) */
	li.appendChild(document.createTextNode(" Target id: "));
	em = document.createElement("em");
	txt = document.createTextNode("<"+event.target.nodeName+" id=\""+event.target.id+"\">");
	em.appendChild(txt);
	li.appendChild(em);
	
	/* informazioni sull'elemento che ha invocato
	il gestore l'evento (event.currentTarget) */
	li.appendChild(document.createTextNode(" Handled by: "));
	em = document.createElement("em");
	txt = document.createTextNode("<"+event.currentTarget.nodeName+" id=\""+event.currentTarget.id+"\">");
	em.appendChild(txt);
	li.appendChild(em);
	
	/* informazioni aggiuntive per gli eventi click
	(coordinate x,y) e keypress (carattere) */
  em = document.createElement("em");
	if(event.type=="click") {
    txt = document.createTextNode("["+event.clientX+","+event.clientY+"]");
    em.appendChild(txt);
    txt = document.createTextNode(" at ");
  } else if(event.type=="keypress") {
    txt = document.createTextNode(String.fromCharCode(event.charCode) +" ["+event.charCode+"]");
    em.appendChild(txt);
    txt = document.createTextNode(" key ");
  }
  li.appendChild(txt);
  li.appendChild(em);

	// ulteriori informazioni bubbles
	txt = document.createTextNode(" bubbles: ");
  em = document.createElement("em");
  em.appendChild(document.createTextNode(event.bubbles.toString()));
	li.appendChild(txt);
	li.appendChild(em);
	
	// timestamp
	txt = document.createTextNode(" Time: ");
  em = document.createElement("em");
  em.appendChild(document.createTextNode(event.timeStamp));
	li.appendChild(txt);
	li.appendChild(em);
	ul.appendChild(li);
}

/* funzione per associare l'event handler agli elementi
viene eseguito al termine del caricamento della pagina
(è associato all'evento load di BODY) */
function setEventHandlers() {
  document.getElementById("bd").onclick = listevent;
  document.getElementById("d1").onclick = listevent;
  document.getElementById("e1").onclick = listevent;
  document.getElementById("d1").onmouseover = listevent;
  document.getElementById("d1").onmouseout = listevent;
  document.getElementById("eventList").onclick = listevent;
  document.getElementById("t1").onkeypress = listevent;
  document.getElementById("bd").onkeypress = listevent;
}

// funzione per cancellare la lista degli eventi
function clearList() {
	ul = document.getElementById("eventList");
	while(ul.hasChildNodes())
		ul.removeChild(ul.lastChild);
}