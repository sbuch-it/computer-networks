var selectedLI = null;

function clickHandler(event) {
  li = event.currentTarget;
  li.clicks++;
    
  if(selectedLI==null) {
    selectedLI = li;
    li.style.backgroundColor = "gold";
    LIcontent.innerHTML = li.innerHTML;
  } else { 
    if(selectedLI.clicks>li.clicks)
      LIcontent.style.color = "green";
    else if(selectedLI.clicks==li.clicks)
      LIcontent.style.color = "yellow";
    else
      LIcontent.style.color = "red";
        
    if((selectedLI.style.color==Tcolor.value||li.style.color==Tcolor.value)&&
    selectedLI.innerHTML.startsWith("+")&&li.innerHTML.startsWith("+")) {
      tmp = li.style.color;
      li.style.color = selectedLI.style.color;
      selectedLI.style.color = tmp;
      li.innerHTML += "#";
      selectedLI.innerHTML += "#";
    }
    selectedLI.style.backgroundColor = selectedLI.savedBBG;
    selectedLI = null;
  }
}

function setHandlers() {
  li = document.getElementsByTagName("LI");
  for(i=0;i<li.length;i++) {
    li[i].onclick = clickHandler;
    li[i].savedBBG = li[i].style.backgroundColor;
    li[i].clicks=0;
  }
}