<?php
session_start();
include 'includes/db_connection.php';
$conn = OpenCon();
if(!isset($_POST['username']) or  !isset($_POST['password'])){
    echo 'No username or password entered';
}
else{
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $sqlstmnt = 'SELECT * FROM appusers WHERE username = :username AND password = :password';
    $stmtUsr = $conn -> prepare($sqlstmnt);
    $stmtUsr -> bindValue(':username', $username);
    $stmtUsr -> bindValue(':password', $password);
    $result = $stmtUsr -> execute();
    $rows = $stmtUsr -> fetchAll();
    $n = count($rows);
    if($n<1) {
        echo 'No user account exists. Please check your credentials';
    }
    else if($n>1) {
        echo 'Server error. Please contact administrator with code 112';
    }
    else{
        // add user to logged in users database
        $sqllogged = 'INSERT INTO liveusers (username) VALUE (:username)';
        $stmtlogged = $conn -> prepare($sqllogged);
        $stmtlogged -> bindValue(':username', $username);
        $stmtlogged -> execute();
        foreach($rows as $row){
            $loggedUser = $row['username'];
            $loggedPass = $row['password'];
            $_SESSION['username'] = $loggedUser;
            $_SESSION['password'] = $loggedPass;
            header("Location: home.php");
            exit;
        }
    }
}
?>