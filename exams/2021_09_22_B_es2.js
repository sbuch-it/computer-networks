function overHandler(event) {
  td = event.currentTarget;
  td.visits++;
  
  td.style.border = "2px ridge "+colorB.value;
  TDcolor.innerHTML = td.style.backgroundColor;
  TDcolor.style.color = td.style.backgroundColor;
  
  if(td.visits%2==0||td.visits%5==0) {
    tmp = div1.innerHTML;
    div1.innerHTML = div2.innerHTML;
    div2.innerHTML = tmp;
  } else if(td.style.fontSize==fontSZ.value&&td.style.color=="green") {
    TDmultiple.innerHTML = td.visits;
  } else if((td.innerHTML.endsWith("*")||td.innerHTML.ensWith("+"))&&td.innerHTML.length<5) {
    td.innerHTML = "-"+td.innerHTML;
  }
}

function outHandler(event) {
  td = event.currentTarget;
  td.style.border = td.savedBorder;
  TDcolor.innerHTML = "";
}

function setHandlers() {
  td = document.getElementsByTagName("TD");
  for(i=0;i<td.length;i++) {
    td[i].onmouseover = overHandler;
    td[i].onmouseout = outHandler;
    td[i].savedBorder = td[i].style.border;
    td[i].visits=0;
  }
}