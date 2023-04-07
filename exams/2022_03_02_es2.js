var maxVisits = 0;
var tdMax = null;

function overHandler(event) {
  td = event.currentTarget;
  td.visits++;
    
  td.style.backgroundColor = "lightgreen";
  TDvisits.innerHTML = td.visits;
    
  if(td.visits>maxVisits) {
    tdMax = td;
    maxVisits = td.visits;
    maxSpan.innerHTML = maxVisits
  } else {
    if((td.className=="A"||tdMax.className=="A")&&
    (td.style.color==Tcolor.value||tdMax.style.color==Tcolor.value)) {
      temp = td.innerHTML;
      td.innerHTML = tdMax.innerHTML;
      tdMax.innerHTML = temp;
    }
  }
}

function outHandler(event) {
  td = event.currentTarget;

  td.style.backgroundColor = td.savedBBG;
  TDvisits.innerHTML = "";
}

function setHandlers() {
  td = document.getElementsByTagName("TD");
  for(i=0;i<td.length;i++) {
    td[i].onmouseover = overHandler;
    td[i].onmouseout = outHandler;
    td[i].savedBBG = td[i].style.backgroundColor;
    td[i].visits=0;
  }
}