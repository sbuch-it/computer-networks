// array usato per i dati
var a = new Array();

/* stampa l'array come elementi di una lista HTML */
function printAsList(arr,ol) {
	ol.innerHTML = "";
	for(i=0; i<arr.length; i++)
	  ol.innerHTML += "<li>"+arr[i]+"</li>";
}

/* esegue il push prelevando il valore dal campo vId e
stampando l'array modificato nella lista aId */
function doPush(vId,aId) {
	a.push(vId.value);
	printAsList(a,aId);
}

/* esegue il pop scrivendo il valore nel campo vId e
stampando l'array modificato nella lista aId */
function doPop(vId,aId) {
	vId.value = a.pop();
	printAsList(a,aId);
}

/* esegue l'unshift prelevando il valore dal campo vId e
stampando l'array modificato nella lista aId */
function doUnshift(vId,aId) {
	a.unshift(vId.value);
	printAsList(a,aId);
}

/* esegue lo shift scrivendo il valore nel campo vId e
stampando l'array modificato nella lista aId */
function doShift(vId,aId) {
	vId.value = a.shift();
	printAsList(a,aId);
}

/* inserisce il valore nell'array prelevando il valore
dal campo vId e la posizione dal campo pId, stampando
poi l'array modificato nella lista aId */
function setAt(vId,pId,aId) {
	var p = parseInt(pId.value);
	if((p<0) || (p>=30))
	  return;
	a[p] = vId.value;
	printAsList(a,aId);
}

/* scrive il valore dell'array alla posizione specificata
dal campo pId nel campo riferito da vId */
function getAt(vId,pId) {
	var p = parseInt(pId.value);
	if((p<0) || (p>=a.length))
	  vId.value = "";
	else
	  vId.value = a[p];
}

/* ordina l'array e lo stampa nella lista aId */
function sort(aId) {
	a.sort();
	printAsList(a,aId);
}