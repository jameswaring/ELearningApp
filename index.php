<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Learn Algorithm Tracing</title>
    <link rel="stylesheet" type="text/css" href="styles.css"</link>
</head>
<body>
<div class="wrapper">
<br>
<?php
include 'includes/menu.php';
?>
<br>
<h1>Welcome</h1>
<section>
<p class="maintext">The purpose of this website is to allow you to improve your skills
in algorithm tracing, which you will need for Paper 2 of the IGCSE exam in Computer Science.
In this course, you will learn how to interpret flow charts and pseudocode, and how to effectively
trace them and show the flow of data from beginning to end. Using this course, you can lay out
your requirements, explain what you already know and track your progress, providing yourself
with confidence in your studies.
<br><br>
Please create an account or login below. You will not be able to use the hyperlinks above without being logged in.
</p>
<br>
<div class="loginborder">
        <div class="logintext">Register</div>
        <br>
<form action="newaccount.php" method="post">
    username<br>
    <input type="text" name="newusername"><div id="ernewuser"></div>
    <br>
    password<br>
    <input type="password" name="newpassword"><div id="ernewpass"></div>
    <br>
    confirm password<br>
    <input type="password" name="newpassconf"><div id="ernewconf"></div>
    <br>
    <input type="submit" onclick="return validateNewUser()" value="submit">
</form>
</div>
<div class="loginborder">
    <div class="logintext">Login</div>
    <br>
    <br>
    <form action="login.php" method="post">
    username<br>
    <input type="text" name="username"><div id="eruser"></div>
    <br>
        <br>
    password<br>
    <input type="password" name="password"><div id="erpass"></div>
    <br>
    <input type="submit" value="submit" onclick="return validateLogin()" name="submitbtn">
</form>
</div>
<div class="clearer"></div>
</section>
<script type="text/javascript">
    function validateNewUser() {
        var username = document.getElementsByName("newusername")[0].value;
        var password = document.getElementsByName("newpassword")[0].value
        var passconf = document.getElementsByName("newpassconf")[0].value;
        var failed = false;
        if(password != passconf){
            document.getElementById("ernewconf").innerHTML = "Passwords do not match";
            failed = true;
        }
        if(!username){
            document.getElementById("ernewuser").innerHTML = "No username entered";
            failed = true;
        }
		if(password.length < 6){
            document.getElementById("ernewpass").innerHTML = "Passwords must be at least 6 characters";
            failed = true;
        }
        if(failed){
            return false;
        }
        return true;
    }

    function validateLogin() {
        var username = document.getElementsByName("password")[0].value;
        var password = document.getElementsByName("username")[0].value
        var failed = false;
        if(!username){
            document.getElementById("eruser").innerHTML = "No username entered";
            failed = true;
        }
        if(!password){
            document.getElementById("erpass").innerHTML = "No password entered";
            failed = true;
        }
        if(failed){
            return false;
        }
        return true;
    }
</script>
</div>
</body>
</html>