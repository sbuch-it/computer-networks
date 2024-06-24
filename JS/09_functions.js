/* apre una finestra popup se il browser/utente lo consente.
Il riferimento alla finestra è memorizzato in popupwin */
var popupwin;

function openPopup() {
  popupwin = window.open("09_popup.html","popup","width=200, height=80");
}

/* chiude la finestra di popup chiedendo conferma
con un system dialog */
function closePopup() {
  if(!popupwin) return; 
  if(confirm("Chiudo il popUp?")) popupwin.close();
}

/* cambia la stringa visualizzata nella finestra popup
a rotazione fra quelle disponibili */
var ads = new Array("Eat popUP!!","Drink PoPUP!!","Read POPup!!");
var ad = 0;

function changeAds() {
  if(!popupwin.document) return;
  popupwin.document.getElementById("adId").innerHTML = ads[ad++];
  // adId.innerHTML = ads[ad++];
  if(ad > ads.length-1) ad = 0;
}

/* inserisce una stringa nella finestra di popup
da un dialog di prompt mostrato all'utente */
function setAd() {
  if(!popupwin) return;
  myAd = prompt("Inserisci il tuo slogan");
  if(myAd)
    popupwin.document.getElementById("adId").innerHTML = myAd;
}

// muove la finestra di popup
function movePopUp(dx,dy) {
  if(popupwin) popupwin.moveBy(dx,dy);
}

/* inizializza un interval che ruota le scritte
nella finestra di popup */
var TIntId;

function startAdRotation() {
	if(popupwin) TIntId = setInterval(changeAds,1500);
}

// rimuove l'interval per la rotazione delle scritte
function stopAdRotation() {
	if(TIntId) clearInterval(TIntId);
}