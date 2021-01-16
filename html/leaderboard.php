<?php
// define variables and set to empty values
$score = $user = "";
$exists = FALSE;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $score = test_input($_POST["hiscore"]);
	  $user = test_input($_POST["username"]);  

  require_once 'connect.php';

  console_log("$score");

   $sql = "SELECT * FROM scores WHERE username='$user'";
  $response = mysqli_query($conn, $sql);
  // console_log($response);

   if ( mysqli_num_rows($response) > 0 ) {
      $exists = TRUE;
      $sql = "UPDATE scores SET score = '$score' WHERE username='$user'";
      console_log($user);
      console_log($score);


      if ($conn->query($sql) === TRUE) {
  console_log( "Record updated successfully");
} else {
  echo console_log("Error updating record: " . $conn->error);
}
      header('Location: quiz.php');
    }


    if (!$exists){
  $sql = "INSERT INTO scores(username, score) VALUES ('$user', '$score')";

  if (mysqli_query($conn, $sql)) {

    $result["success"] = "1";
    $result ["message"] = "success";

    // echo json_encode($result);
    header('Location: quiz.php');
    mysqli_close($conn);

  } else {

    $result["success"] = "0";
    $result ["message"] = "error";

    // echo json_encode($result);

    mysqli_close($conn);
  }
}

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<?php
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}