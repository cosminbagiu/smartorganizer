<?php



if (isset($_POST["reset-request-submit"])) {



    $selector = bin2hex(random_bytes(8));

    $token = random_bytes(32);



    $url = "http://smartorganizer.ro/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    bin2hex($token);

   

    $expires = date("U") + 1800; 



    require 'dbh.inc.php';

  

    $userEmail=$_POST["email"];  

    if (empty($userEmail)==true) {

        header("Location: ../reset-password.php?mail=empty");

        exit();

    }



    $sql="DELETE FROM pwdReset WHERE pwdResetEmail=?;";

    $stmt=mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {

        echo "A aparut o eroare";

        exit();

    }else {

        mysqli_stmt_bind_param($stmt, "s", $userEmail);

        mysqli_stmt_execute($stmt);

    }



    $sql="INSERT INTO pwdReset(pwdResetEmail,pwdResetSelector,pwdResetToken,pwdResetExpires) VALUES(?,?,?,?);";

    $stmt=mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {

        echo "A aparut o eroare";

        exit();

    }else {

        $hashedToken=password_hash($token, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);

        mysqli_stmt_execute($stmt);

    }



    mysqli_stmt_close($stmt);

    mysqli_close($conn);



    $to=$userEmail;



    $subject='SmartOrganizer-Reset password';



    $message='Am primit o cerere de resetare a parolei pentru contul dvs de pe Smart Organizer. Daca nu ai cerut acest lucru, te rugam sa ignori acest mesaj.';

    $message .='<br>Adresa pentru resetarea parolei este: ';

    $message .='<a href="' . $url . '">' . $url . '</a>';

    $message .='<br>Acest link este valabil 60 de minute.';

    

    $headers = "From: SmartOrganizer <staff@smartorganizer.ro>\r\n";

    $headers .="Reply-To: staff@smartorganizer.ro\r\n";

    $headers .="Content-type: text/html\r\n";



    mail($to, $subject, $message, $headers);



    header("Location: ../reset-password.php?reset=success");



}else{

    header("Location: ../index.php");

}

