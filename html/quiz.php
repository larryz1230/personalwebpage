<!DOCTYPE html>
<html>
<head>
	<title>Quiz!</title>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<link rel="stylesheet" type="text/css" href="../style/contact.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>



<body>

	<form style="display: none; position: absolute; top: 50%; left: 50%; z-index: 999; width: 30%; height: 30%; background-color: black; align-content: center;" id="formfrom">
			<p> Before you continue, please enter your name/username to track your score.
			<input type="text" name="nam" id="nam" placeholder="name">
			<button value="Submit" onclick="savenam()" style="height: 50px; width: 200px;">Continue</button>
		</form>

	<div class = "menu">
			<ul>
			<!-- 	<li class = "logo"><img src = "icon.webp"></li> -->
				
				<li><a href = "about.html"> About Me </a> </li>

<!-- 				<div class="dropdown"> -->
				<li ><a href="interests.html"> My Interests </a> </li>
				<li> <a href="contact.html"> Contact </a> </li>
				<li id="active"> Quiz </a> </li>

				<li> <a href="viewleaderboard.php"> Leaderboards </a> </li>
				<li> <a href="createquestion.php"> Make Question </a> </li>
				<li id="back"><a href="home.html">Back To Home</a></li>
<!-- 				<div id = "droppy"class="dropdown-content">
				    <a onclick="#">Soccer</a>
				    <a onclick="#">Video Games</a>
				    <a onclick="#">Coding</a>
				  </div>
				</div> -->
			</ul>
		</div>	

	<!-- </div> -->


	<div class="container" id="quiz">
		<div class="quizheader">

		<h2 id="question" style="color: black;">Question Text</h2>
		<br>


		<ul id="test">	
			<li>
				<input type="radio" name="choice" class="answer" id="a">
				<label for "a" id="a_text">Question</label>
			</li>
			<li>
				<input type="radio" name="choice" class="answer" id="b">
				<label for "b" id="b_text">Question</label>
			</li>
			<li>
				<input type="radio" name="choice" class="answer" id="c">
				<label for "c" id="c_text">Question</label>
			</li>
			<li>
				<input type="radio" name="choice" class="answer" id="d">
				<label for "d" id="d_text">Question</label>
			</li> 
		</ul>
	</div>

	<button id="submit">Submit</button>


<!-- 	<button id="restart" style="display: none">Restart</button> -->
		
	</div>




	<div class="update_leader" style="position: absolute; bottom: 0px;">

		<form action="leaderboard.php" method="POST" onsubmit="return certain()" id="butt">
			<input type="text" name="username" id="username" placeholder="name" readonly="true">
			<input type="text" id ="hiscore" name="hiscore" placeholder="score" readonly="true">
			<input type="submit"  value="Submit" style="display: none" >
		</form>

		
	</div>


</div>









<?php
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}



    $sql = "SELECT * FROM questions ";

       require_once 'connect.php';

    $res = mysqli_query($conn, $sql);

    $result = array();
    $result['getqs'] = array();


    while($row = mysqli_fetch_array($res)){
        array_push($result['getqs'],array('question' => $row[0], 'a' => $row[1], 'b' => $row[2], 'c' => $row[3], 'd' => $row[4], 'ca' => $row[5]));
    }

    // console_log($result);

    if (mysqli_query($conn, $sql)) {

        // $result["success"] = "1";
        // $result ["message"] = "success";

        // console_log(json_encode($result));
        mysqli_close($conn);


    } else {

        $result["success"] = "0";
        $result ["message"] = "error";

        echo json_encode($result);
        mysqli_close($conn);
    }

?>

<script>
	var passedArray =  
    <?php echo json_encode($result); ?>;
    // console.log(passedArray);
</script>

	

	<script src="../script/quiz.js"></script>
</body>
</html>


