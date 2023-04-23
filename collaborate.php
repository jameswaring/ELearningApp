<?php
session_start();
if (!isset($_SESSION["username"]))
{
    header("Location: index.php");
}
?>
<!DOCTYPE html>
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
<h1>Collaborate</h1>
<br>
<p class="subtext">General ChitChat</p>
<p class="maintext">This page is here for you to collaborate with other users on the course.
You can use the little chat window below to ask questions, chat about learning topics
or just check in on your fellow students. You can also check on who else is logged in on the
window on the left.</p>
<div id="chatholder">
<div id="loggedin">
    <?php
    function getloggedin()
    {
        echo 'Logged In:';
        echo '<br>';
        include_once 'includes/db_connection.php';
        $conn = OpenCon();
        $loggedusr = $_SESSION['username'];
        $sqlinslive = 'INSERT INTO liveusers(username) VALUES(:currentuser)';
        $stmtlive = $conn->prepare($sqlinslive);
        $stmtlive->bindValue(':currentuser', $loggedusr);
        $stmtlive->execute();
        $sqlstmnt = 'SELECT username FROM liveusers WHERE timejoined > DATE_SUB(NOW(),INTERVAL 5 MINUTE)';
        $stmtUsr = $conn->prepare($sqlstmnt);
        $stmtUsr -> execute();
        $rows = $stmtUsr->fetchAll();
        $loggedusers = array();
        $n = count($rows);
        if ($n < 1) {
            echo 'No users are logged in';
        }
        else {
            foreach ($rows as $row) {
                if (!in_array($row['username'], $loggedusers)) {
                    echo $row['username'] . "<br/>\n";
                    array_push($loggedusers, $row['username']);
                }
            }
        }
    }
    getloggedin();
    ?>
</div>
<div id="chatbox">
    <?php
    if(isset($_POST['chatentry'])) {
        $conn2 = OpenCon();
        // now populate chat table
        $chatuser = $_SESSION['username'];
        $chatentry = htmlspecialchars($_POST['chatentry']);
        $sqlchat = 'INSERT INTO chat (username, comment) VALUES (:chatuser, :chatentry)';
        $stmtchat = $conn2 -> prepare($sqlchat);
        $stmtchat -> bindValue(':chatuser', $chatuser);
        $stmtchat -> bindValue(':chatentry', $chatentry);
        $stmtchat -> execute();
    }
    $conn3 = OpenCon();
    $chatgetsql = 'SELECT * FROM chat';
    $stmtchatget = $conn3 -> prepare($chatgetsql);
    $stmtchatget -> execute();
    $rows3 = $stmtchatget -> fetchAll();
    $n3 = count($rows3);
    foreach($rows3 as $row){
        echo $row['username']."<br/>\n";
        echo $row['comment']."<br/>\n";
        echo '<br>';
        echo '<script>var element = document.getElementById("chatbox");
        element.scrollTop = element.scrollHeight;</script>';
    }
    getloggedin();
    ?>
</div>
<div id="entrybox">
<form action="" method="POST">
    <input type="text" name="chatentry" size="119" placeholder="Type Here">
</form>
</div>
</div>
<br>
<p class="subtext">Focused Group Work</p>
<p class="maintext">This section is all about solving a problem as a group.
The problems will be updated every week, and each week you will have the chance
to work on the problem with the rest of your class and post your solution below.
Everyone can see everyone's solutions, but not until you've submitted your own.
Don't be shy!</p>
<p class="maintext">What would be the output if the number 7 was input in to the following
    algorithm. Write your answer in the box and click ENTER to show how your answer compared to others'</p>
<img src="images/collabq.JPG" alt="collaboration question" border="2">
    <br>
    <br>
    <?php
        include_once 'includes/db_connection.php';
        $conn = OpenCon();
        $username = ($_SESSION["username"]);
        $sql = 'SELECT * FROM appusers WHERE username = :username';
        $sqlsel = $conn->prepare($sql);
        $sqlsel->bindValue(':username', $username);
        $sqlsel->execute();
        $rows5 = $sqlsel -> fetchall();
        if(!isset($rows5[0]['collabans'])){
            echo '<form action="" method="POST">
                <input type="text" name="answer" placeholder="Type Answer Here">
                <input type="submit" name="submit">
            </form>';
            }
    ?>
<?php
include_once 'includes/db_connection.php';
if(isset($_POST['submit'])) {
    if (isset($_POST['answer'])) {
        $conn = OpenCon();
        $username = ($_SESSION["username"]);
        $collabans = htmlspecialchars($_POST['answer']);
        $sqlstmt = 'UPDATE appusers SET collabans = :collabans WHERE (username = :username)';
        $sqlins = $conn->prepare($sqlstmt);
        $sqlins->bindValue(':collabans', $collabans);
        $sqlins->bindValue(':username', $username);
        $sqlins->execute();
        redirect();
    }
}
function redirect()
{
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . 'http://jose.cs.herts.ac.uk/jw17acs/public/app/collaborate.php' . '"';
    $string .= '</script>';

    echo $string;
}
?>
<?php
    include_once 'includes/db_connection.php';
    include_once 'includes/db_connection.php';
    $conn = OpenCon();
    $username = ($_SESSION["username"]);
    $sql = 'SELECT * FROM appusers WHERE username = :username';
    $sqlsel = $conn->prepare($sql);
    $sqlsel->bindValue(':username', $username);
    $sqlsel->execute();
    $rows5 = $sqlsel -> fetchall();
    if(isset($rows5[0]['collabans'])){
        // output all previous answers
        echo '<p class="smallersubtext">Here Are the Answers from Others</p>';
        $sqlallans = 'SELECT * FROM appusers';
        $allans = $conn->prepare($sqlallans);
        $allans -> execute();
        $rows = $allans -> fetchAll();
        echo '<table class="collabtable">
              <tr>
              <th>User</th>
              <th>Answer</th>
              </tr>';
        foreach($rows as $row){
            if (isset($row['collabans'])){
                echo '<tr>
                        <td>'.$row['username'].'</td>
                        <td>'.$row['collabans'].'</td>
                      </tr>';
            }
        }
        echo '</table>';
    }
?>
</div>
</body>
</html>