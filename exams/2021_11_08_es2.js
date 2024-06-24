var counter = 0;
var selectedP = null;

function clickHandler(event) {
  p = event.currentTarget;
  p.clicks++;
  if(selectedP==null) {
    selectedP = p;
    p.style.backgroundColor = BGcolor.value;
    Pcontent.innerHTML = p.innerHTML;
  } else { 
    if((selectedP.className==p.className)&&(selectedP.clicks!=p.clicks)) {
      clickCount.innerHTML= selectedP.clicks+" - "+p.clicks;
      selectedP.clicks = 0;
      p.clicks = 0;
    } else if((selectedP.className!=p.className)&&(p.clicks>5||selectedP.clicks>5)) {
      tmp = selectedP.style.color;
      selectedP.style.color = p.style.color;
      p.style.color = tmp;
    } 
    selectedP.style.backgroundColor = selectedP.savedBBG;
    selectedP = null;
    Pcontent.innerHTML = "";
  }
}

function setHandlers() {
  p = document.getElementsByTagName("P");
  for(i=0;i<p.length;i++) {
    p[i].onclick = clickHandler;
    p[i].savedBBG = p[i].style.backgroundColor;
    p[i].clicks=0;
  }
}