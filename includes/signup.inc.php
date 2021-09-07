<?php
 if(isset($_POST["signup-submit"])){

    

    $name = $_POST['name'];
    $email = $_POST['mail'];
    $username = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwd-repeat'];
    
    require 'dbh.inc.php';
    require 'functions.inc.php';

    if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
        header("Location: ../signup.php?error=emptyinput");
        exit();    
    }
    if (invalidUid($username) !== false) {
        header("Location: ../signup.php?error=invaliduid");
        exit();    
    }
    if (invalidMail($email) !== false) {
        header("Location: ../signup.php?error=invalidmail");
        exit();    
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("Location: ../signup.php?error=passwordsdontmatch");
        exit();    
    }
    if (uidExists($conn, $username, $email) !== false) {
        header("Location: ../signup.php?error=usernametaken");
        exit();    
    }

    createUser($conn, $name, $email, $username, $pwd);
    

}
 else {
    header("Location: ../signup.php");
    exit();
 }