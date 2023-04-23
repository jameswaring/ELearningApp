<!DOCTYPE html>
<html>
<body>
<script src="scripts.js" type="text/javascript"></script>
<script type="text/javascript">
    function showans1(ans) {
        var x = document.getElementById(ans);
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    function openLesson(evt, lessonName) {
        var i, tabcontent, tablinks;

        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        document.getElementById(lessonName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
<?php
function redirect()
{
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . 'http://jose.cs.herts.ac.uk/jw17acs/public/app/learn.php' . '"';
    $string .= '</script>';

    echo $string;
}
?>
<p class="maintext">It's time to learn some new skills and perfect some old ones. Use the tabs
    below to work your way through the short course. These lessons are designed to be done in order, but we don't need
    to be too restrictive and so they are all open to you from the get go. On each section, there are questions to answer
    to show your understanding of the topic. You will need to answer all of these to unlock the final part of the course
    which is all about outlining what you learned.
    <br>
    <br>
    Enjoy, and remember, head over to the collaboration part to discuss your work.

</p>
<div class="tab">
    <button class="tablinks" onclick="openLesson(event, 'lesson1')">Lesson 1</button>
    <button class="tablinks" onclick="openLesson(event, 'lesson2')">Lesson 2</button>
    <button class="tablinks" onclick="openLesson(event, 'lesson3')">Lesson 3</button>
    <button class="tablinks" onclick="openLesson(event, 'lesson4')">Lesson 4</button>
</div>
<div id="lesson1" class="tabcontent">
    <p class="lessonsub">Lesson 1</p>
    <p class="maintext">
        This first lesson is all about introducing the topic. Without the basics, we can't really go very far.
        To make sure that you have the absolute basics, we have created a simple video introduction on the main topic. This
        should get you started with the fundamentals of algorithm tracing, and what we need to succeed.
        <br>
        <br>
        Watch the video and fill in the quick form at the bottom give an overview of what you learned.
    </p>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/OO-7KlfqEyg" frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <br>
    <br>
    <?php
        include_once 'db_connection.php';
        // check if lesson 1 is complete
        $conn = OpenCon();
        $username = ($_SESSION["username"]);
        $sql1 = 'SELECT * FROM appusers WHERE username = :username';
        $stmt1 = $conn->prepare($sql1);
        $stmt1 -> bindValue(":username", $username);
        $stmt1 -> execute();
        $rows1 = $stmt1 -> fetchAll();
        if(!empty($rows1[0]['learn1'])){
            echo '<div class = "answerreadback">';
            echo 'Your answer:';
            echo '<br>';
            echo '<br>';
            echo $rows1[0]['learn1'];
            echo '</div>';
        }
        else {
            echo '<form action="" method="POST">
            <textarea name="lfb1" id="lfb1" cols="110" rows="7"></textarea>
            <br>
            <input type="submit" name="submit1" onclick="return verifyLesson1()">
            </form>';
        }
    ?>
</div>

<div id="lesson2" class="tabcontent">
    <p class="lessonsub">Lesson 2</p>
    <p class="maintext">
        This lesson is all about flow charts. Remember, in the exam you will be expected to know how to trace both
        flow charts and pseudocode. Understanding the flow chart symbols, and how to follow the data-flow through a
        drawn flowchart diagram is fundamental to your success.
        <br>
        <Br>
        Go through the learning materials below and complete the form at track your learning journey and outline
        what you have learned. Enjoy!
        <br>
        <br>
        First let's take a look at the flow chart symbols and what they look like.
        <br>
    </p>
    <figure>
    <img src="images/fcsymbols.jpg" alt="Flow Chart Symbols">
    </figure>
    <br>
    <p class="maintext">
        Now have a look at the following flow chart example.
    </p>
    <figure>
        <img src="images/fc1.png" alt="Tracing">
    </figure>
    <p class="maintext">
        As well as the flow chart, you will also be given a table like this
    </p>
    <figure>
        <img src="images/fc2.png" alt="Table">
    </figure>
    <p class="maintext">
        And some numbers like this to input in to the flow chart<br>
        6, 10, 14, 9, 17, 4, 65, 5, 10, 4<br>
        The first time the flow chart runs you can see that the counter is set to 0 so we add this in first
    </p>
    <figure>
        <img src="images/fc3.png" alt="First Digit">
    </figure>
    <p class="maintext">
        It then asks us to input the number. For this example we will use the number 6
    </p>
    <figure>
        <img src="images/fc4.png" alt="Second Digit">
    </figure>
    <p class="maintext">
        You might have noticed that we missed out the top line when we entered out first number. This is usually how it
        is done in the mark scheme. When we have set our numbers to 0 (or whatever the first symbol in the flow chart
        tells us) we move on to the next row to enter our first number from the list.
        <br>
        <br>
        As you can see, the first time it tells us that the highest should become the number we entered and the lowest
        too. The arrows simply mean ‘becomes’.
    </p>
    <figure>
        <img src="images/fc5.png" alt="Third Digit">
    </figure>
    <p class="maintext">
        Next we will enter the number 10 in to the flowchart. This time the arrows don’t go right to the top, they go
        towards the middle so we don’t reset counter to 0 and the highest and lowest to 10 immediately. Also, 1 has
        been added to the counter from our last number.
    </p>
    <figure>
        <img src="images/fc6.png" alt="Fourth Digit">
    </figure>
    <p class="maintext">
        When we enter the number 10 it asks is whether it is larger than the previous highest. It is as the previous
        largest was 6, so we enter it in the largest column, and then go towards the bottom.
    </p>
    <figure>
        <img src="images/fc7.png" alt="Fifth Digit">
    </figure>
    <p class="maintext">
        We continue until all of the numbers have been entered.<br>
        6, 10, 14, 9, 17, 4, 65, 5, 10, 4
    </p>
    <figure>
        <img src="images/fc8.png" alt="Final Digit">
    </figure>
    <p class="maintext">
        You might find in a different example, that you have an OUTPUT column. This just means that at the end you
        write the variables that are listed in the final symbol, in the output column.
        <br>
        <br>
        Remember, the tables you complete are marked vertically by column. This means that if you make a mistake
        in one row, you risk losing all marks for the question as each column would then be wrong.
        <br>
        <br>
        Now complete the box below outlining what you have learned in this lesson.
    </p>
    <br>
    <br>
    <?php
    include_once 'db_connection.php';
    // check if lesson 2 is complete
    $conn = OpenCon();
    $username = ($_SESSION["username"]);
    $sql2 = 'SELECT * FROM appusers WHERE username = :username';
    $stmt2 = $conn->prepare($sql2);
    $stmt2 -> bindValue(":username", $username);
    $stmt2 -> execute();
    $rows2 = $stmt2 -> fetchAll();
    if(!empty($rows2[0]['learn2'])){
        echo '<div class = "answerreadback">';
        echo 'Your answer:';
        echo '<br>';
        echo '<br>';
        echo $rows2[0]['learn2'];
        echo '</div>';
    }
    else {
        echo '<form action="" method="POST">
            <textarea name="lfb2" id="lfb2" cols="110" rows="7"></textarea>
            <br>
            <input type="submit" name="submit2">
            </form>';
    }
    ?>
</div>

<div id="lesson3" class="tabcontent">
    <p class="lessonsub">Lesson 3</p>
    <p class="maintext">
        It's time now to move on to pseudocode tracing. Things get a little more complicated here because there is no
        visual element like there is with flow char tracing. With pseudocode it is all about understanding the programming
        principles behind the algorithms. A little bit of arithmetic also helps. Before you look at psudocode tracing you
        should already have the basics of programming from your previous studies. The programming principles you will need
        to understand before you get started are:
    </p>
        <ul class="proglists">
            <li>For loops</li>
            <li>While Loops</li>
            <li>Do While Loops</li>
            <li>Repeat Until Loops</li>
            <li>If Statements</li>
            <li>Inputs</li>
            <li>Outputs</li>
            <li>Switch Statements</li>
        </ul>

    <p class="maintext">
        Now let's take a look at an example of an exam question and how we would approach answering it.
    </p>
    <figure>
        <img src="images/ps1.png" alt="Pseudocode Question">
    </figure>
    <p class="maintext">
        This one uses a case switching structure as discussed in the pseudocode section of this booklet. However,
        the concept is the same. using the values 37 and 191, the questions asks you to complete the following tables.
    </p>
    <figure>
        <img src="images/ps2.png" alt="Pseudocode Tables">
    </figure>
    <p class="maintext">
        The results of the table should be as follows. Have a go yourself and see if you can arrive at the same answer.
    </p>
    <figure>
        <img src="images/ps3.png" alt="Pseudocode Tables Complete">
    </figure>
    <p class="maintext">
        OK, so now we know the answers, let's see how we arrived there. The first line says 'Input X' Remember, wherever
        you see an input, you tale the supplied number and use this. So ours is 37. While X is greater than 15 (it is)
        we make T1 X DIV 16 (the whole number division) and T2 X MOD 16 (the remainder of the division). We then output
        a different value based on what T2 is. Finally we make X the same as T1 (copy T1 over to the X column and back
        into the loop we go until X is less than 15. When it is we move on to the second case statement and output a
        value dependent on the value of X.
        <br>
        <br>
        Again, write a little bit about what you learned below.
    </p>
        <br>
    <?php
    include_once 'db_connection.php';
    // check if lesson 3 is complete
    $conn = OpenCon();
    $username = ($_SESSION["username"]);
    $sql3 = 'SELECT * FROM appusers WHERE username = :username';
    $stmt3 = $conn->prepare($sql3);
    $stmt3 -> bindValue(":username", $username);
    $stmt3 -> execute();
    $rows3 = $stmt3 -> fetchAll();
    if(!empty($rows3[0]['learn3'])){
        echo '<div class = "answerreadback">';
        echo 'Your answer:';
        echo '<br>';
        echo '<br>';
        echo $rows3[0]['learn3'];
        echo '</div>';
    }
    else {
        echo '<form action="" method="POST">
            <textarea name="lfb3" id="lfb3" cols="110" rows="7"></textarea>
            <br>
            <input type="submit" name="submit3">
            </form>';
    }
    ?>
</div>
<div id="lesson4" class="tabcontent">
    <p class="lessonsub">Lesson 4</p>
    <p class="maintext">OK, so this one isn't so much of a lesson. This is more about you practicing and perfecting your tracing
    technique. Below are three exam questions on algorithm. For each one of them complete the table and then click
    'reveal' to see whether you were correct or not. Of course, you could just click reveal without ever doing anything
    but that's of no real benefit to you!
    <br>
    <br>
    For each of the problems, complete a trace table or all variables (just like was shown in the examples on the previous
    lessons) and then press 'REVEAL' to show how close you were. After each of them, just say in the box what mistakes you
        made and what you learned from them. Or if you got it correct you can just say that.
    <br>
    <br>
    </p>
    <figure>
        <img src="images/q1.png" alt="Question 1">
    </figure>
    <div id="ans1" class="hidden">
        <figure>
            <img src="images/q1 answer.png" alt="Question 1">
        </figure>
    </div>
    <button onclick=showans1("ans1")>Reveal</button>

    <figure>
        <img src="images/q2.png" alt="Question 1">
    </figure>
    <div id="ans2" class="hidden">
        <figure>
            <img src="images/q2 answer.png" alt="Question 2">
        </figure>
    </div>
    <button onclick=showans1("ans2")>Reveal</button>

    <figure>
        <img src="images/q3.png" alt="Question 1">
    </figure>
    <div id="ans3" class="hidden">
        <figure>
            <img src="images/q3 answer 1.png" alt="Question 2">
        </figure>
        <figure>
            <img src="images/q3 answer 2.png" alt="Question 2">
        </figure>
    </div>
    <br>
    <button onclick=showans1("ans3")>Reveal</button>
    <br>
    <br>
    <?php
    include_once 'db_connection.php';
    // check if lesson 4 is complete
    $conn = OpenCon();
    $username = ($_SESSION["username"]);
    $sql4 = 'SELECT * FROM appusers WHERE username = :username';
    $stmt4 = $conn->prepare($sql4);
    $stmt4 -> bindValue(":username", $username);
    $stmt4 -> execute();
    $rows4 = $stmt4 -> fetchAll();
    if(!empty($rows4[0]['learn4'])){
        echo '<div class = "answerreadback">';
        echo 'Your answer:';
        echo '<br>';
        echo '<br>';
        echo $rows4[0]['learn4'];
        echo '</div>';
    }
    else {
        echo '<form action="" method="POST">
            <textarea name="lfb4" id="lfb4" cols="110" rows="7"></textarea>
            <br>
            <input type="submit" name="submit4">
            </form>';
    }
    ?>
</div>
<?php
include_once 'db_connection.php';
if(isset($_POST['submit4'])){
    //code for button 4
    $conn = OpenCon();
    $username = ($_SESSION["username"]);
    $input4 = ($_POST['lfb4']);
    $sqlstmt = 'UPDATE appusers SET learn4 = :input4 WHERE (username = :username)';
    $sqlins = $conn->prepare($sqlstmt);
    $sqlins->bindValue(':input4', $input4);
    $sqlins->bindValue(':username', $username);
    $sqlins->execute();
    //update completion
    $sqlcomplt = 'UPDATE appusers SET complete = complete + 14 WHERE (username = :username)';
    $compltstmt = $conn->prepare($sqlcomplt);
    $compltstmt->bindValue(':username', $username);
    $compltstmt->execute();
    redirect();
}
else if(isset($_POST['submit3'])){
    //code for button 3
    $conn = OpenCon();
    $username = ($_SESSION["username"]);
    $input3 = ($_POST['lfb3']);
    $sqlstmt = 'UPDATE appusers SET learn3 = :input3 WHERE (username = :username)';
    $sqlins = $conn->prepare($sqlstmt);
    $sqlins->bindValue(':input3', $input3);
    $sqlins->bindValue(':username', $username);
    $sqlins->execute();
    //update completion
    $sqlcomplt = 'UPDATE appusers SET complete = complete + 14 WHERE (username = :username)';
    $compltstmt = $conn->prepare($sqlcomplt);
    $compltstmt->bindValue(':username', $username);
    $compltstmt->execute();
    redirect();
}
else if(isset($_POST['submit2'])){
    //code for button 2
    $conn = OpenCon();
    $username = ($_SESSION["username"]);
    $input2 = ($_POST['lfb2']);
    $sqlstmt = 'UPDATE appusers SET learn2 = :input2 WHERE (username = :username)';
    $sqlins = $conn->prepare($sqlstmt);
    $sqlins->bindValue(':input2', $input2);
    $sqlins->bindValue(':username', $username);
    $sqlins->execute();
    //update completion
    $sqlcomplt = 'UPDATE appusers SET complete = complete + 14 WHERE (username = :username)';
    $compltstmt = $conn->prepare($sqlcomplt);
    $compltstmt->bindValue(':username', $username);
    $compltstmt->execute();
    redirect();
}
else if(isset($_POST['submit1'])){
    $conn = OpenCon();
    $username = ($_SESSION["username"]);
    $input1 = ($_POST['lfb1']);
    $sqlstmt = 'UPDATE appusers SET learn1 = :input1 WHERE (username = :username)';
    $sqlins = $conn->prepare($sqlstmt);
    $sqlins->bindValue(':input1', $input1);
    $sqlins->bindValue(':username', $username);
    $sqlins->execute();
    //update completion
    $sqlcomplt = 'UPDATE appusers SET complete = complete + 14 WHERE (username = :username)';
    $compltstmt = $conn->prepare($sqlcomplt);
    $compltstmt->bindValue(':username', $username);
    $compltstmt->execute();
    redirect();
}
?>
</div>
</body>
</html>