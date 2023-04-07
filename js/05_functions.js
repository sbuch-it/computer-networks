var myStyle = "color: blue; font-size: 12px";

// le funzioni possono accedere alle variabili globali
function printVariable(v,el) {
  el.innerHTML = "<span style=\""+myStyle+"\">"+v+"</span>";
}

// si può accedere agli argomenti
// (anche in numero non predefinito) con la proprietà arguments
function sumVariables() {
	for(i=0,s=0;i<arguments.length;i++)
	   s += arguments[i];
	return s;
}

// la funzione ha due parametri e prevede di stamparli
// in due elementi con id v1Id e v2Id
function twoArguments(v1,v2) {
	v1Id.innerHTML = v1;
	v2Id.innerHTML = v2; 
}

// funzione che stampa in sfondo lavender la stringa Java
// in rosso nell'elemento specificato
function printJava(el) {
	st = "\"color: red; background-color: lavender\"";
	el.innerHTML = "<span style="+st+">Java</span>";
}