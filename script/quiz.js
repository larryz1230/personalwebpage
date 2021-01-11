
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
	console.log(numq);	
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
			document.getElementById('quiz').innerHTML = '<div class="something"><h2 style="color: black;">You got ' + score + '/ ' + numq + ' questions correct </h2> <button onClick="location.reload()" style="position: relative; bottom: 0px; left:0px;" >Restart</button> </div>'

		}
		// console.log(score);
	}	
	
}
)