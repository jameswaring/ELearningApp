<!DOCTYPE html>
<html>
<body>
<p class="maintext">This is the place where we can lay out everything we want from the course. It may not seem
that important, but it's a vital part of any learning journey to outline what you hope to achieve. Without
a goal in mind, we just wander through the resources. But with an objective, we know what we're aiming for
and we'll know if we got there in the end. Putting this down on in writing solidifies it in our mind and makes it
real! Trust us.
    <br>
    <br>
Complete the box below. Just write minimum of 50 words outlining what you want from this learning journey.</p>
<form action="" method="POST">
<textarea id="comments" name="comments" placeholder="Please type your comments here"
          cols=97 rows=5></textarea>
    <br>
    <input type="submit" name="submit" onclick="return verifyWant()" value="submit">
    <br>
    <p id="remaining"></p>
    <p id="comment"></p>
</form>
<?php
include_once 'db_connection.php';
if(isset($_POST['submit'])) {
    $conn = OpenCon();
    $username = ($_SESSION["username"]);
    $want = htmlspecialchars($_POST['comments']);
    $sqlstmt = 'UPDATE appusers SET want = :want WHERE (username = :username)';
    $sqlins = $conn->prepare($sqlstmt);
    $sqlins->bindValue(':want', $want);
    $sqlins->bindValue(':username', $username);
    $sqlins->execute();
    //update completion
    $sqlcomplt = 'UPDATE appusers SET complete = complete + 14 WHERE (username = :username)';
    $compltstmt = $conn->prepare($sqlcomplt);
    $compltstmt->bindValue(':username', $username);
    $compltstmt->execute();
    header("Location: http://jose.cs.herts.ac.uk/jw17acs/public/app/want.php");
}
?>
<script onload="start()" src="includes/scripts.js" type="text/javascript"></script>
</body>
</html>