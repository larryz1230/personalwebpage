function showdata(){
	console.log(leaderboardtable.getscore);
}

$(document).ready(function () {
  
  console.log(leaderboardtable.getscore.length);
  var strinng = "<th>Username</th><th>Score</th>";
  for (var i =0; i<leaderboardtable.getscore.length; i++){
  	strinng += "<tr><td>" + leaderboardtable.getscore[i].username +"</td>";
  	strinng += "<td>" + leaderboardtable.getscore[i].score +"</td></tr>";
  }

  document.getElementById('ttable').innerHTML = strinng;


});