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
echo "<h1>Time to Learn</h1>";
?>
<?php
include 'includes/db_connection.php';
$conn = OpenCon();
$loggedusr = $_SESSION['username'];
$want = "";
$sqlstmt = 'SELECT want FROM appusers WHERE (username = :username)';
$sqlsel = $conn -> prepare($sqlstmt);
$sqlsel -> bindValue(':username', $loggedusr);
$sqlsel -> execute();
$rows = $sqlsel -> fetchAll();
foreach ($rows as $row){
    $want = $row['want'];
}
if(strlen($want)>1){
    include 'includes/lessons.php';
}
else{
    include 'includes/compprev.php';
}
?>

</body>
</html>