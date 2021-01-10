function move(name){
	document.getElementById("square").style.animationDuration = "3s";
  const element = document.getElementById('square');
  console.log("hi ");
  document.getElementById("square").style.animationName = name;
  document.getElementById("square").style.WebkitAnimationPlayState = "running";
  if (name=="example"){
  	gotoabout();
  } else if(name=="interests"){
  	gotointerests();
  }  else{
    gotocontact();
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

function gotocontact(){
  sampleVar = setTimeout(() => { 
    window.location.href = "interests.html"}, 3000);
  
}

// setInterval(function(){ 
// 	var d = new Date();
// 	document.getElementById("demo").innerHTML = d.toDateString();

// }, 	1000);



var d = new Date();
document.getElementById("demo").innerHTML = d.toDateString();
