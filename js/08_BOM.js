/* crea l'array per il path e
lo inzializza con l'oggetto BOM window */
var path = new Array();
path.push({name:"window", obj: window});

// stampa il path come lista di ancore nell'elemento pathId
function printPath() {
	// ottiene il nodo dell'elemento pathId
	pathEl = document.getElementById("pathId");
	
	// cancella il contenuto
	/*
	while(pathEl.hasChildNodes())
  	pathEl.removeChild(pathEl.lastChild);
	*/
  pathEl.innerHTML = "";
  // aggiunge gli elementi del path come ancore
	for(i=0;i<path.length;i++) {
    /*
		a = document.createElement("a");
		a.setAttribute("href","javascript:setPath("+i+")");
		a.appendChild(document.createTextNode(path[i].name));
		if(i>0)
		  pathEl.appendChild(document.createTextNode(" > "));
		pathEl.appendChild(a);
		*/
    a = "<a href=\"javascript:setPath("+i+")\">"+path[i].name+"</a>";
    if(i>0)
      pathEl.innerHTML+=" > ";
    pathEl.innerHTML += a;
	}
}

// prende i primi "i" livelli del path corrente
function setPath(i) {
	path = path.slice(0,i+1);
	printPath();
	expand(path[path.length-1].obj);
}

/* aggiunge la proprietà prop dell'ultimo elemento
del path corrente al path */
function addToPath(prop) {
   // nodo padre
   parentN = path[path.length-1].obj;
   // inserisce il nuovo livello nel path
   path.push({name: prop, obj: parentN[prop]});
   printPath();
   expand(parentN[prop]);
}

/* stampa la lista delle proprietà dell'oggetto obj
come elementi della lista propsId  */
function expand(obj) {
  props = document.getElementById("propsId");
  // cancella la lista di item attuale
  while(props.hasChildNodes())
    props.removeChild(props.lastChild);
         
  // inserisce gli elementi <li> per le proprietà
  for(p in obj) {
		li = document.createElement("li");
		// se è un oggetto si inserisce il link per l'espansione
		if(typeof obj[p]=="object") {
	  	a = document.createElement("a");
	   	a.setAttribute("href","javascript:addToPath(\""+p+"\")");
	   	a.appendChild(document.createTextNode(p));
		} else {
	   	a = document.createElement("span");
	   	a.setAttribute("style","color: green");
	   	a.appendChild(document.createTextNode(p));
		}
		li.appendChild(a);
		li.appendChild(document.createTextNode(": "));
		// valore della proprietà
		em = document.createElement("em");
		em.appendChild(document.createTextNode(obj[p]));
		li.appendChild(em);
		props.appendChild(li);
  } 
}