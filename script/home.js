function move(name){
	document.getElementById("square").style.animationDuration = "3s";
  const element = document.getElementById('square');
  console.log("hi ");
  document.getElementById("square").style.animationName = name;
  document.getElementById("square").style.WebkitAnimationPlayState = "running";
  if (name=="example"){
  	gotoabout();
  } else{
  	gotointerests();
  }  
}

function moverandom(){
	const element = document.getElementById('square');
const newone = element.cloneNode(true);
element.parentNode.replaceChild(newone, element);


  document.getElementById("square").style.animationName = "random";
document.getElementById("square").style.animationDuration = "10s";
  document.getElementById("square").style.WebkitAnimationPlayState = "running";
  
}

function gotoabout(){
	sampleVar = setTimeout(() => { 
    window.location.href = "about.html"}, 3000);
	
}

function gotointerests(){
	sampleVar = setTimeout(() => { 
    window.location.href = "interests.html"}, 3000);
	
}