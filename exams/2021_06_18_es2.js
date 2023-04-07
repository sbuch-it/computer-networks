var counter = 0;
var selectedLI = null;

function clickHandler(event) {
  li = event.currentTarget;
  
  if(selectedLI==null) {
    selectedLI = li;
    li.style.backgroundColor = colorBG.value;
  } else {
    if(selectedLI.className==li.className) {
      tmp = selectedLI.innerHTML;
      selectedLI.innerHTML = li.innerHTML;
      li.innerHTML = tmp;
    } else if((selectedLI.style.color==colorT.value||li.style.color==colorT.value)
    &&selectedLI.innerHTML.includes("+")&&li.innerHTML.includes("+")) {
      counter++;
      LIcount.innerHTML = counter;
    } else if(selectedLI.innerHTML.length<20&&li.innerHTML.length<20) {
      li.innerHTML += "*";
      selectedLI.innerHTML += "*";
    }
    selectedLI.style.backgroundColor = selectedLI.savedBG;
    selectedLI = null;
  }
}

function setHandlers() {
  li = document.getElementsByTagName("LI");
  for(i=0;i<li.length;i++) {
    li[i].onclick = clickHandler;
    li[i].savedBG = li[i].style.backgroundColor;
  }
}