<?php
session_start();
include 'includes/db_connection.php';
$conn = OpenCon();
if(!isset($_POST['newusername']) or  !isset($_POST['newpassword'])){
    echo 'No username or password entered';
}
else{
    $username = htmlspecialchars($_POST['newusername']);
    $password = htmlspecialchars($_POST['newpassword']);
    $passconf = htmlspecialchars($_POST['newpassconf']);
    if($passconf != $password) {
        echo 'Passwords did not match. Please try again';
    }
    else{
        $sqlstmnt = 'SELECT * FROM appusers WHERE username = :username';
        $stmtUsr = $conn -> prepare($sqlstmnt);
        $stmtUsr -> bindValue(':username', $username);
        $result = $stmtUsr -> execute();
        $rows = $stmtUsr -> fetchAll();
        $n = count($rows);
        if($n>0) {
            echo 'User already exists. Please try another username. Click back to try again';
        }

        else{
            $sqlstmnt2 = 'INSERT INTO appusers(username, password) VALUES(:username, :password)';
            $stmtUsr2 = $conn -> prepare($sqlstmnt2);
            $stmtUsr2 -> bindValue(':username', $username);
            $stmtUsr2 -> bindValue(':password', $password);
            $stmtUsr2 -> execute();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header("location: home.php");
        }
    }
}
?>