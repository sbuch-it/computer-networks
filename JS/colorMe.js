function changeColor(event) {
	el = event.target;
	elColor = el.style.backgroundColor;
	if(elColor=="red")
	   color = "yellow";
	else if(elColor=="yellow")
	   color = "blue";
	else if(elColor=="blue")
	   color = "white";
	else
	   color = "red";
	el.style.backgroundColor = color;
}

function setHandlers() {
  cells = document.getElementsByTagName("td");
  for(i=0;i<cells.length;i++)
     cells[i].onclick = changeColor;
}