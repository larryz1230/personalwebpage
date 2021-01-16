
const questionText = document.getElementById('question');
const a_text = document.getElementById('a_text');
const b_text = document.getElementById('b_text');
const c_text = document.getElementById('c_text');
const d_text = document.getElementById('d_text');
const button = document.getElementById('submit');


let currentquestion = 0;
let score = 0;
let numq = passedArray.getqs.length;



loadQuiz();

function getSelected () {
	const answers = document.querySelectorAll(".answer");
	var id = '';
	
	answers.forEach((ans) => {
		if (ans.checked){
			id = ans.id;
			ans.checked = false;
			return id;
		}
	});

	return id;
}

function loadQuiz() {
	const currentQuiz = passedArray.getqs[currentquestion];
	// console.log(numq);	
	questionText.innerText = currentQuiz.question;
	a_text.innerText = currentQuiz.a;
	b_text.innerText = currentQuiz.b;
	c_text.innerText = currentQuiz.c;
	d_text.innerText = currentQuiz.d;
}

button.addEventListener('click', () => {

	

	const answer = getSelected();


	if (answer){
		console.log(answer);
		console.log(passedArray.getqs[currentquestion].ca);
		if (answer === passedArray.getqs[currentquestion].ca){
			score++;
		}
		currentquestion++;
		if (currentquestion<numq){
			loadQuiz();
		} else {
			var x = getCookie("score");
			console.log(x);
			if (score>x){
				createCookie("score", score, "10");
				x = getCookie("score");

				console.log("Your score:" +  x);

				var sc = document.getElementById("hiscore");
	  			sc.value = getCookie("score");
				document.getElementById("butt").submit();
			}

			


			document.getElementById('quiz').innerHTML = '<div class="something"><h2 style="color: black;">You got ' + score + '/ ' + numq + ' questions correct </h2> <button onClick="location.reload()" style="position: relative; bottom: 0px; left:0px;" >Restart</button> <a href="createquestion.php" style="position: absolute; bottom: 10px; right: 50px; color:black;">Click to create a question</a>  </div>'

		}
		// console.log(score);
	}	
	
}
)

function create(){
	window.location.href = "quiz.php";
	console.log("clicked");
}



$(document).ready(function () {
  var g = getCookie("score");
  if (g==""){
  	createCookie("score", 0, 10);
  }

  var sc = document.getElementById("hiscore");
  sc.value = getCookie("score");

  var qp = getCookie("nam");
  // console.log(qp);
  if (qp==""){
  	document.getElementById("formfrom").style.display="block";
  } else{
  	document.getElementById("username").value = getCookie("nam");
  }

});

function createCookie(name, value, days) {
  var expires;
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toGMTString();
  }
  else {
    expires = "";
  }
  document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}



function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var cat = decodedCookie.split(';');
  for(var i = 0; i <cat.length; i++) {
    var c = cat[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function certain(){
  var lemail = document.getElementById("username").value.length>0;
  var sc = document.getElementById("hiscore");
  sc.value = getCookie("score");
  console.log(sc.value);
  if (!lemail){
    alert("fill out all fields");
    return false;
  }
}



function savenam(){
	var namm = document.getElementById("nam").value;
	createCookie("nam", namm, 10);
	window.reload();
}