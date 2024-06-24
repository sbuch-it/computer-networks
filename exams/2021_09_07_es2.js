var selectedTD = null;

function clickHandler(event) {
  td = event.currentTarget;
  td.clicks++;
    
  if(selectedTD==null) {
    selectedTD = td;
    td.style.backgroundColor = colorBG.value;
  } else {
    if((selectedTD.style.fontFamily==td.style.fontFamily)&&
    (selectedTD.style.fontSize==fontSZ.value||td.style.fontSize==fontSZ.value)) {
      tmp = td.style.color;
      td.style.color = selectedTD.style.color;
      selectedTD.style.color = tmp;
    } else if(selectedTD.innerHTML.includes("+")&&td.innerHTML.includes("+")) {
      if(selectedTD.innerHTML.length<6)
        selectedTD.innerHTML = "-"+selectedTD.innerHTML;
      if(td.innerHTML.length<6)
        td.innerHTML = "-"+td.innerHTML;
    } else if(selectedTD.clicks>=10 || td.clicks>=10) {
      TDcount.innerHTML = selectedTD.clicks-td.clicks;            
    }
    selectedTD.style.backgroundColor = selectedTD.savedBG;
    selectedTD = null;
  }
}

function setHandlers() {
  td = document.getElementsByTagName("TD");
  for(i=0;i<td.length;i++) {
    td[i].onclick = clickHandler;
    td[i].savedBG = td[i].style.backgroundColor;
    td[i].clicks=0;
  }
}