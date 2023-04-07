function overHandler(event) {
  td = event.currentTarget;
  td.visits++;
  
  td.style.backgroundColor = colorBG.value;
  TDcolor.innerHTML = td.style.color;
  TDcolor.style.color = td.style.color;
  
  if(td.visits%3==0||td.visits%7==0) {
    TDmultiple.innerHTML += "x";
  } else if(td.style.fontSize==fontSZ.value&&td.style.color=="red") {
    tmp = div1.style.backgroundColor;
    div1.style.backgroundColor = div2.style.backgroundColor;
    div2.style.backgroundColor = tmp;
  } else if((td.innerHTML.startsWith("+")||td.innerHTML.startsWith("-"))&&td.innerHTML.length<5) {
    td.innerHTML += "=";
  }
  
}

function outHandler(event) {
  td = event.currentTarget;
  td.style.backgroundColor = td.savedBG;
  TDcolor.innerHTML = "";
}

function setHandlers() {
  td = document.getElementsByTagName("TD");
  for(i=0;i<td.length;i++) {
    td[i].onmouseover = overHandler;
    td[i].onmouseout = outHandler;
    td[i].savedBG = td[i].style.backgroundColor;
    td[i].visits=0;
  }
}