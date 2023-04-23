<p class="maintext">That's it. You're finished. Your final step is to see how you did.

Here is a summary of your learning journey. We recommend you print this out and use it for revision.</p>
<br>
<?php
    include_once 'db_connection.php';
    // check if lesson 4 is complete
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
?>
<p class="maintext">Now let's look back at those questions that you answered at the start. Answer them again here
    and we can see what changed in your understanding.</p>
<div class="qholder">
    <form action="" method="POST">
        <p class="formq">How comfortable are you with flow chart tracing at the moment?</p>
        <select name="comfort">
            <option value="one">1</option>
            <option value="two">2</option>
            <option value="three">3</option>
            <option value="four">4</option>
            <option value="five">5</option>
            <option value="six">6</option>
            <option value="seven">7</option>
            <option value="eight">8</option>
            <option value="nine">9</option>
            <option value="ten">10</option>
        </select>
        <br>
        <p class="formq">How are the trace tables in an exam graded?</p>
        <input type="text" name="graded" id="graded" placeholder="Type here">
        <div id="errorgraded"></div>
        <br>
        <p class="formq">What does the following symbol represent? in a flow chart?</p>
        <div class="quizimgwrapper">
            <img src="images/diamond.png">
        </div>
        <select name="symbol">
            <option value="process">Process</option>
            <option value="decision">Decision</option>
            <option value="addition">Input/Output</option>
            <option value="endpoint">Endpoint</option>
        </select>
        <br>
        <p class="formq">What does a parallelogram denote in a flowchart?</p>
        <select name="parsymbol">
            <option value="process">Process</option>
            <option value="decision">Decision</option>
            <option value="addition">Input/Output</option>
            <option value="endpoint">Endpoint</option>
        </select>
        <br>
        <p class="formq">What must be placed in the top row of the trace table?</p>
        <input type="text" name="toprow" id="toprow" placeholder="Type here">
        <div id="errortoprow"></div>
        <br>
        <p class="formq">A decision symbol is needed when creating what in a flowchart?</p>
        <select name="loop">
            <option value="process">Reversal</option>
            <option value="Checkpoint">Checkpoint</option>
            <option value="Start">Start</option>
            <option value="Loop">Loop</option>
        </select>
        <p class="formq">What is the danger of a loop without an exit condition</p>
        <select name="infloop">
            <option value="Reversal">Reversal</option>
            <option value="Infinite Looping">Infinite Looping</option>
            <option value="Incorrect Assignment">Incorrect Assignment</option>
            <option value="Bugs">Bugs</option>
        </select>
        <br>
        <p class="formq">Use the following box to outline anything else you know about
            flow charts. You should write at least a few sentences. Think about the rules of tracing,
            How we complete a trace table, the purpose of a flow chart, the different symbols etc.</p>
        <textarea name="knowoverview" id="knowoverview" cols="100" rows="5" placeholder="Type here"></textarea>
        <div id="errorknowoverview"></div>
        <br>
        <br>
        <input type="submit" name="submit" onclick="return verifyQuiz()">
    </form>
</div>
<?php
include_once 'db_connection.php';
function redirect()
{
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . 'http://jose.cs.herts.ac.uk/jw17acs/public/app/got.php' . '"';
    $string .= '</script>';
    echo $string;
}
if(isset($_POST['submit'])) {
    $conn = OpenCon();
    $username = ($_SESSION['username']);
    $comfort = ($_POST['comfort']);
    $symbol = ($_POST['symbol']);
    $parsymbol = ($_POST['parsymbol']);
    $loop = ($_POST['loop']);
    $infloop = ($_POST['infloop']);
    $gradedquestion = htmlspecialchars($_POST['graded']);
    $toprow = htmlspecialchars($_POST['toprow']);
    $whatiknow = htmlspecialchars($_POST['knowoverview']);
    $sqlstmt = 'UPDATE appusers SET infloopend = :infloop, parsymbolend = :parsymbol, loopqend = :loop, comfortend = :comfort, toprowend = :toprow, gradedqend = :gradedquestion, diamondsymbolend = :symbol, whatknowend = :whatiknow WHERE (username = :username)';
    $sqlins = $conn->prepare($sqlstmt);
    $sqlins->bindValue(':comfort', $comfort);
    $sqlins->bindValue(':username', $username);
    $sqlins->bindValue(':symbol', $symbol);
    $sqlins->bindValue(':gradedquestion', $gradedquestion);
    $sqlins->bindValue(':whatiknow', $whatiknow);
    $sqlins->bindValue(':parsymbol', $parsymbol);
    $sqlins->bindValue(':toprow', $toprow);
    $sqlins->bindValue(':loop', $loop);
    $sqlins->bindValue(':infloop', $infloop);
    $sqlins->execute();
    print_r($sqlins->errorInfo());
    if (!$sqlins) {
        echo "\nPDO::errorInfo():\n";
        echo($sqlstmt->errorInfo());
    }
    //update completion
    $sqlcomplt = 'UPDATE appusers SET complete = 100 WHERE (username = :username)';
    $compltstmt = $conn->prepare($sqlcomplt);
    $compltstmt->bindValue(':username', $username);
    $compltstmt->execute();
    redirect();
}
?>
<script src="includes/scripts.js" type="text/javascript"></script>
