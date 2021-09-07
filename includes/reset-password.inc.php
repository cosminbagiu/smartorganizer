<?php



if (isset($_POST["reset-password-submit"])) {



    $selector = $_POST["selector"];

    $validator = $_POST["validator"];

    $password = $_POST["pwd"];

    $passwordRepeat = $_POST["pwd-repeat"];



    if (empty($password) || empty($passwordRepeat)) {

        header("Location: ../login.php?newpwd=empty");

        exit();

    }else if ($password != $passwordRepeat) {

        header("Location: ../login.php?newpwd=pwdnotsame");

        exit();

    }



    $currentDate = date("U");



    require 'dbh.inc.php';

    

    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {

        echo "A aparut o eroare";

        exit();

    }else {

        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);

        mysqli_stmt_execute($stmt);



        $result = mysqli_stmt_get_result($stmt);

        if (!$row = mysqli_fetch_assoc($result)) {

            echo "Trebuie sa resetezi din nou parola.";

            exit();

        } else {

            

            $tokenBin = hex2bin($validator);

            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);



            if ($tokenCheck === false) {

                echo "Trebuie sa resetezi din nou parola.";

                exit();

            } elseif ($tokenCheck === true) {

                $tokenEmail = $row['pwdResetEmail'];

                $sql = "SELECT * FROM users WHERE usersMail=?;";

                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {

                    echo "A aparut o eroare";

                    exit();

                } else {

                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);

                    mysqli_stmt_execute($stmt);

                    $result =mysqli_stmt_get_result($stmt);

                    if (!$row = mysqli_fetch_assoc($result)) {

                        echo "A aparut o eroare!";

                        exit();

                    } else {

                        $sql = "UPDATE users SET usersPwd=? WHERE usersMail=?;";

                        $stmt = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($stmt, $sql)) {

                            echo "A aparut o eroare";

                            exit();

                        } else {

                            $newPwdHash = password_hash($password, PASSWORD_DEFAULT);

                            mysqli_stmt_bind_param($stmt, "ss",$newPwdHash, $tokenEmail);

                            mysqli_stmt_execute($stmt);



                            $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";

                            $stmt = mysqli_stmt_init($conn);

                            if (!mysqli_stmt_prepare($stmt, $sql)) {

                                echo "A aparut o eroare";

                                exit();

                            }else {

                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);

                                mysqli_stmt_execute($stmt);

                                header("Location: ../login.php?newpwd=passwordupdated");

                            }

                            }

                        }

                }

            } 

        }

    }



}else {

    header("Location: ../index.php");

}



