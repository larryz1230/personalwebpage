// function toInterests(s){
// 	var elmnt = document.getElementById(s);
// 	console.log(s);
// 	elmnt.scrollIntoView();
// }

function getDate(){
	var date1 = new Date("12/30/2003"); 
	var date2 = new Date();
	  
	var distance = date2 - date1;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var years = Math.floor(distance / (1000 * 60 * 60 * 24 *365));
  days = days%365.25;
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000) + minutes*60 + hours*3600 + days*3600*24;

  // Display the result in the element with id="demo"
  document.getElementById("contentp").innerHTML = "Hi! My name is Larry Zhi and this website is my personal webpage. I am currently " + years + " years and " + seconds +" seconds old. I go to American High School (well now I attend school online). This website was built with basic html, css, and a bit of js. Navigate to the my interests page to learn more about my interests."
}

setInterval(getDate, 1000);
getDate();

