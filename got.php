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
echo "<h1>What Did I Learn?</h1>";
?>
<?php
include_once 'includes/db_connection.php';
$conn = OpenCon();
$username = ($_SESSION["username"]);
$sqlstmt = 'SELECT * FROM appusers WHERE username = :username';
$sqlsel = $conn->prepare($sqlstmt);
$sqlsel -> bindValue(':username', $username);
$sqlsel -> execute();
$rows = $sqlsel -> fetchAll();
foreach($rows as $row){
    if(isset($row['loopqend'])){
        include 'includes/completefinalend.php';
    }
    else if(isset($row['got'])){
        include 'includes/completefinal.php';
    }
    else if((isset($row['learn1'])) AND (isset($row['learn2'])) AND (isset($row['learn3'])) AND (isset($row['learn4']))){
        include 'includes/gotbox.php';
    }
    else{
        include 'includes/compprev.php';
    }
}
?>
</p>
</div>
</body>
</html>