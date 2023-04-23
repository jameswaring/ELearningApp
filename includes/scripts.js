function start(){
    var a = document.getElementById("comments");
    a.addEventListener('keyup', countChars, false);
    document.getElementById("remaining").innerHTML = "You have 500 characters minimum";
}

function countChars(){
    var x = document.getElementById("comments").value;
    var j = x.length;
    document.getElementById("remaining").innerHTML = "You have written " + j + " characters";
}

function verifyWant(){
  var x = document.getElementById("comments").value;
  var j = x.length;
  if (j < 500){
     document.getElementById("comment").innerHTML = "Please use more than 500 characters";
     return false;
  }
  else{
     return true;
  }
}
function verifyLesson1(){
    var x = document.getElementById("lfb1").value;
    document.getElementById("lfb1").disabled = true;
    document.getElementById("learn1input").innerHTML = x;
    return true;
}

function verifyQuiz(){
    var x = document.getElementById("graded").value;
    var j = x.length;
    var y = document.getElementById("toprow").value;
    var k = y.length;
    var z = document.getElementById("knowoverview").value;
    var l = z.length;
    var failflag = 0;
    if (j < 1){
        document.getElementById("errorgraded").innerHTML = "You missed this out";
        failflag = 1;
    }
    if (k < 1){
        document.getElementById("errortoprow").innerHTML = "You missed this out";
        failflag = 1;
    }
    if (l < 1){
        document.getElementById("errorknowoverview").innerHTML = "You missed this out";
        failflag = 1;
    }
    if (failflag == 1){
        return false
    }
    return true;
}