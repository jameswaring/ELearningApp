<?php
session_start();
if (!isset($_SESSION["username"]))
{
    header("Location: index.php");
}
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
echo "<br>";
echo "<h1>Welcome ".$_SESSION['username']."</h1>";
?>
<p class="maintext">Below are the statistics showing how much you have completed of the course so far.
Click the menu items above to keep going and remember to collaborate with other students to get
the most out of this course.
<br>
<br>
Good luck.
<br>
<br>
</p>
<?php
include_once 'includes/db_connection.php';
$conn = OpenCon();
$username = ($_SESSION["username"]);
$sqlstmt = 'SELECT * FROM appusers WHERE username = :username';
$sqlsel = $conn->prepare($sqlstmt);
$sqlsel -> bindValue(':username', $username);
$sqlsel -> execute();
$rows = $sqlsel -> fetchAll();
$rest = substr($rows[0]['joindate'], 0, -9);
echo '<p class="memberstats">';
echo 'Date Joined: ';
echo $rest;
echo '<br>';
echo '<br>';
echo 'Percentage Complete.....';
echo $rows[0]['complete'].'%';
echo '</p>';
?>
</div>
</body>
</html>