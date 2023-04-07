var selectedP = null;

function clickHandler(event) {
  p = event.currentTarget;
  p.clicks++;
  if(selectedP==null) {
    selectedP = p;
    p.style.border = "2px ridge "+BGcolor.value;
    Pcontent.value = p.innerHTML;
  } else { 
    if(selectedP.clicks>p.clicks) {
      clickCount.innerHTML= selectedP.clicks+" - "+p.clicks;
      selectedP.clicks = 0;
      p.clicks = 0;
    } else if((selectedP.clicks>3||p.clicks>3)&&
    (p.innerHTML.includes("@")&&selectedP.innerHTML.includes("@"))) {
      tmp = selectedP.style.color;
      selectedP.style.color = p.style.color;
      p.style.color = tmp;
    } 
    selectedP.style.border = selectedP.savedB;
    selectedP.innerHTML = Pcontent.value;
    selectedP = null;
    Pcontent.value = "";
  }
}

function setHandlers() {
  p = document.getElementsByTagName("P");
  for(i=0;i<p.length;i++) {
    p[i].onclick = clickHandler;
    p[i].savedB = p[i].style.border;
    p[i].clicks=0;
  }
}