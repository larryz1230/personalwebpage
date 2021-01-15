
<?php
// define variables and set to empty values
$q = $a = $b = $c = $d = $ca = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $q = test_input($_POST["q"]);
	  $a = test_input($_POST["a"]);
	  $b= test_input($_POST["b"]);
	  $c = test_input($_POST["c"]);
	  $d = test_input($_POST["d"]);
	  $qa= test_input($_POST["ca"]);
  

  require_once 'connect.php';

  console_log("coNNEcted");

  $sql = "INSERT INTO questions(question, answera, answerb, answerc, answerd, correctanswer) VALUES ('$q', '$a', '$b', '$c', '$d', '$qa')";

  if (mysqli_query($conn, $sql)) {

    $result["success"] = "1";
    $result ["message"] = "success";

    // echo json_encode($result);
    // header('Location: http://localhost/loginreg/login.php');
    mysqli_close($conn);

  } else {

    $result["success"] = "0";
    $result ["message"] = "error";

    // echo json_encode($result);

    mysqli_close($conn);
  }


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Quiz!</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="../style/contact.css">
	
</head>



<body>


	<div class="container" style="" id="quiz">
		<div class="quizheader">


	



		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
		  Question: <input type="text" name="q">
		  <br><br>
		  Answer A: <input type="text" name="a">
		  <br><br>
		  Answer B: <input type="text" name="b">
		  <br><br>
		  Answer C: <input type="text" name="c">
		  <br><br>
		  Answer D: <input type="text" name="d">
		  <br><br>
		  Correct Answer: (enter either 'a', 'b', 'c', or 'd') <input type="text" name="ca">
		  <br><br> 
		  <input type="submit" id="submit"></input>
		</form>

		<button> <a href="quiz.php">Cancel</a></button>
	</div>

	



	
</body>
</html>


<?php
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}