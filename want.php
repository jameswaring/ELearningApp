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
echo "<h1>What I Want</h1>";
?>
<?php
include 'includes/db_connection.php';
$conn = OpenCon();
$loggedusr = $_SESSION['username'];
$want = "";
$whatknow = "";
$sqlstmt = 'SELECT whatknow, want FROM appusers WHERE (username = :username)';
$sqlsel = $conn -> prepare($sqlstmt);
$sqlsel -> bindValue(':username', $loggedusr);
$sqlsel -> execute();
$rows = $sqlsel -> fetchAll();
$whatknow = $rows[0]['whatknow'];
$want = $rows[0]['want'];
if(!empty($want)){
    include 'includes/complete.php';
    echo '<div class = "answerreadback">';
    echo 'Your answer:';
    echo '<br>';
    echo '<br>';
    echo $want;
    echo '</div>';
}
else if(!empty($whatknow)){
    include 'includes/wantbox.php';
}
else{
    include 'includes/compprev.php';
}
?>
</div>
</body>
</html>