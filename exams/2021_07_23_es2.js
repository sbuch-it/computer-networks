var selectedLI = null;

function clickHandler(event) {
  li = event.currentTarget;
  li.nclicks++;
    
  if(selectedLI==null) {
    selectedLI = li;
    li.style.color = selColor.value;
    LIcontent.value = li.innerHTML;
  } else {
    if(selectedLI.nclicks==li.nclicks) {
      tmp = selectedLI.style.backgroundColor;
      selectedLI.style.backgroundColor = li.style.backgroundColor;
      li.style.backgroundColor = tmp;
    } else if(((selectedLI.style.fontFamily==selFont.value)||(li.style.fontFamily==selFont.value))
    && (selectedLI.style.fontSize==li.style.fontSize)) {
      selectedLI.innerHTML = "#"+selectedLI.innerHTML;
      li.innerHTML = "#"+li.innerHTML;
    } 
    
    selectedLI.style.color = selectedLI.savedColor;
    selectedLI.innerHTML = LIcontent.value;
    selectedLI = null;
    LIcontent.value = "";
  }
}

function setHandlers() {
  li = document.getElementsByTagName("LI");
  for(i=0;i<li.length;i++) {
    li[i].onclick = clickHandler;
    li[i].savedColor = li[i].style.color;
    li[i].nclicks = 0;
  }
}