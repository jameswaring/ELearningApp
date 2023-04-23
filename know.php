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
?>
<h1>What You Know</h1>
<?php
include 'includes/db_connection.php';
$conn = OpenCon();
$username = ($_SESSION["username"]);
$sqlstmt = 'SELECT * FROM appusers WHERE username = :username';
$sqlsel = $conn->prepare($sqlstmt);
$sqlsel -> bindValue(':username', $username);
$sqlsel -> execute();
$rows = $sqlsel -> fetchAll();
foreach($rows as $row){
    if(strlen($row['whatknow'])>1){
        include 'includes/complete.php';
        echo '<div class = "answerreadback">';
        echo 'You know:';
        echo '<br>';
        echo $row['whatknow'];
        echo '<br>';
        echo '<br>';
        echo 'For the question: How are the trace tables in an exam graded?';
        echo '<br>';
        echo 'You answered: ';
        echo $row['gradedq'];
        echo '<br>';
        echo '<br>';
        echo 'For the question: What does the following symbol represent in a flow chart?';
        echo '<br>';
        echo 'You answered: ';
        echo $row['diamondsymbol'];
        echo '<br>';
        echo '<br>';
        echo 'For the question: What does a parallelogram denote in a flowchart?';
        echo '<br>';
        echo 'You answered: ';
        echo $row['parsymbol'];
        echo '<br>';
        echo '<br>';
        echo 'For the question: What must be placed in the top row of the trace table?';
        echo '<br>';
        echo 'You answered: ';
        echo $row['toprow'];
        echo '<br>';
        echo '<br>';
        echo 'For the question: A decision symbol is needed when creating what in a flowchart?';
        echo '<br>';
        echo 'You answered: ';
        echo $row['loopq'];
        echo '<br>';
        echo '<br>';
        echo 'For the question: What is the danger of a loop without an exit condition';
        echo '<br>';
        echo 'You answered: ';
        echo $row['infloop'];
        echo '<br>';
        echo '<br>';
        echo '</div>';
}
    else{
        include 'includes/knowquiz.php';
    }
}
?>
<script onload="start()" src="includes/scripts.js" type="text/javascript"></script>
</div>
</body>
</html>