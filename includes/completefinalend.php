<p class="maintext">That's it. You're finished. Now you can see your whole learning journey

    Here is a summary of your learning journey. We recommend you print this out and use it for revision.</p>
<br>
<?php
include_once 'db_connection.php';
$conn = OpenCon();
$username = ($_SESSION["username"]);
$sql = 'SELECT * FROM appusers WHERE username = :username';
$stmt = $conn->prepare($sql);
$stmt -> bindValue(":username", $username);
$stmt -> execute();
$rows = $stmt -> fetchAll();
$knew = $rows[0]["whatknow"];
$want = $rows[0]["want"];
$got = $rows[0]["got"];
echo '<table class="gottable">
        <tr>
            <th>YOU KNEW</th>
            <th>YOU WANTED</th>
            <th>YOU GOT</th>
        </tr>
        <tr>
            <td>'; echo $knew; echo '</td>
            <td>'; echo $want; echo '</td>
            <td>'; echo $got; echo '</td>
        </tr>
    </table>';
echo '<br>';
echo '<br>';
echo '<p class="maintext">Now let us see the quizzes, before and after Here is your first try</p>';
foreach($rows as $row){
    echo '<div class = "answerreadback">';
    echo 'You knew:';
    echo '<br>';
    echo $row['whatknow'];
    echo '<br>';
    echo '<br>';
    echo 'For the question: How are the trace tables in an exam graded?';
    echo '<br>';
    echo 'You answered: ';
    echo $row['gradedq'];
    echo '<br>';
    echo 'The correct answer is: ';
    echo 'By column';
    echo '<br>';
    echo '<br>';
    echo 'For the question: What does the following symbol represent in a flow chart?';
    echo '<br>';
    echo 'You answered: ';
    echo $row['diamondsymbol'];
    echo '<br>';
    echo 'The correct answer is: ';
    echo 'Decision';
    echo '<br>';
    echo '<br>';
    echo 'For the question: What does a parallelogram denote in a flowchart?';
    echo '<br>';
    echo 'You answered: ';
    echo $row['parsymbol'];
    echo '<br>';
    echo 'The correct answer is: ';
    echo 'Input or Output';
    echo '<br>';
    echo '<br>';
    echo 'For the question: What must be placed in the top row of the trace table?';
    echo '<br>';
    echo 'You answered: ';
    echo $row['toprow'];
    echo '<br>';
    echo 'The correct answer is: ';
    echo 'Variable Initialisations';
    echo '<br>';
    echo '<br>';
    echo 'For the question: A decision symbol is needed when creating what in a flowchart?';
    echo '<br>';
    echo 'You answered: ';
    echo $row['loopq'];
    echo '<br>';
    echo 'The correct answer is: ';
    echo 'A Loop';
    echo '<br>';
    echo '<br>';
    echo 'For the question: What is the danger of a loop without an exit condition';
    echo '<br>';
    echo 'You answered: ';
    echo $row['infloop'];
    echo '<br>';
    echo 'The correct answer is: ';
    echo 'An Infinite Loop';
    echo '<br>';
    echo '</div>';
}
echo '<br>';
echo '<p class="maintext">And here is your second</p>';
echo '<br>';
foreach($rows as $row){
    echo '<div class = "answerreadback">';
    echo 'You knew:';
    echo '<br>';
    echo $row['whatknowend'];
    echo '<br>';
    echo '<br>';
    echo 'For the question: How are the trace tables in an exam graded?';
    echo '<br>';
    echo 'You answered: ';
    echo $row['gradedqend'];
    echo '<br>';
    echo 'The correct answer is: ';
    echo 'By column';
    echo '<br>';
    echo '<br>';
    echo 'For the question: What does the following symbol represent in a flow chart?';
    echo '<br>';
    echo 'You answered: ';
    echo $row['diamondsymbolend'];
    echo '<br>';
    echo 'The correct answer is: ';
    echo 'Decision';
    echo '<br>';
    echo '<br>';
    echo 'For the question: What does a parallelogram denote in a flowchart?';
    echo '<br>';
    echo 'You answered: ';
    echo $row['parsymbolend'];
    echo '<br>';
    echo 'The correct answer is: ';
    echo 'Input or Output';
    echo '<br>';
    echo '<br>';
    echo 'For the question: What must be placed in the top row of the trace table?';
    echo '<br>';
    echo 'You answered: ';
    echo $row['toprowend'];
    echo '<br>';
    echo 'The correct answer is: ';
    echo 'Variable Initialisations';
    echo '<br>';
    echo '<br>';
    echo 'For the question: A decision symbol is needed when creating what in a flowchart?';
    echo '<br>';
    echo 'You answered: ';
    echo $row['loopqend'];
    echo '<br>';
    echo 'The correct answer is: ';
    echo 'A Loop';
    echo '<br>';
    echo '<br>';
    echo 'For the question: What is the danger of a loop without an exit condition';
    echo '<br>';
    echo 'You answered: ';
    echo $row['infloopend'];
    echo '<br>';
    echo 'The correct answer is: ';
    echo 'An Infinite Loop';
    echo '<br>';
    echo '</div>';
}
?>