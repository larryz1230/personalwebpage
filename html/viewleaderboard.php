<!DOCTYPE html>
<html>
<head>
  <title>Quiz!</title>
  <link rel="stylesheet" type="text/css" href="../style/style.css">
  <link rel="stylesheet" type="text/css" href="../style/contact.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>



<body>

  <div class = "menu">
      <ul>
      <!--  <li class = "logo"><img src = "icon.webp"></li> -->
        
        <li><a href = "about.html"> About Me </a> </li>

<!--        <div class="dropdown"> -->
        <li ><a href="interests.html"> My Interests </a> </li>
        <li> <a href="contact.html"> Contact </a> </li>
        <li><a href="quiz.php"> Quiz </a> </li>
        <li id="active"> Leaderboards  </li>
        <li> <a href="createquestion.php"> Make Question </a> </li>
        <li id="back"><a href="home.html">Back To Home</a></li>
<!--        <div id = "droppy"class="dropdown-content">
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

    <h2 id="question" style="color: black;">Leaderboard</h2>
    <br>
    <br>
    <table id="ttable">
      <!-- <th>Username</th>
      <th>Score</th> -->
      <!-- <tr>
        <td>larr</td>
        <td>2</td>
      </tr>
      <tr>
        <td>larr</td>
        <td>2</td>
      </tr> -->
    </table>
    


<!--  <button id="restart" style="display: none">Restart</button> -->
    
  </div>

<!--   <div class="update_leader" style="position: absolute; bottom: 0px; height: 100px;">

    <button onclick="showdata()">qdwqdwq</button>
  </div>
 -->

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



    $sql = "SELECT * FROM scores ORDER BY score DESC";

    require_once 'connect.php';

    console_log("connected");

    $res = mysqli_query($conn, $sql);

    // console_log($res);

    $result = array();
    $result['getscore'] = array();




    while($row = mysqli_fetch_array($res)){
        array_push($result['getscore'],array('id' => $row[0], 'score' => $row[1], 'username' => $row[2]));
        console_log($result);
    }

    // console_log($result);

    if (mysqli_query($conn, $sql)) {

        $result["success"] = "1";
        $result ["message"] = "success";

        console_log(json_encode($result));
        mysqli_close($conn);


    } else {

        $result["success"] = "0";
        $result ["message"] = "error";

        echo json_encode($result);
        mysqli_close($conn);
    }

?>

<script>
  var leaderboardtable =  
    <?php echo json_encode($result); ?>;
    console.log(leaderboardtable);
</script>

  

  <script src="../script/leaderboard.js"></script>
</body>
</html>


