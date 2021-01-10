function submitted(){
  var email = document.getElementById("fname");
  var subject = document.getElementById("subject");
  var message = document.getElementById("message");

  if (email.value.length==0 || subject.value.length==0 || message.value.length==0){
    alert("Please fill all inputs");
  } else{
  	alert("Your message has been submitted");
  	email.value="";
  	subject.value="";
  	message.value="";
  }
  
}
