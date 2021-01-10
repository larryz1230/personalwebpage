<?php 

$subject = $email = $message = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["email"]);
  $subject= test_input($_POST["subject"]);
  $message= test_input($_POST["message"]);
}

console_log("hi");



$headers = 'From: ' .$email . "\r\n" .
    'Reply-To: ' .$email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail('larryzhi1230@gmail.com', $subject, $message, $headers);

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