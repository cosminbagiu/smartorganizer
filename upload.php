<?php

session_start();

include_once 'includes/dbh.inc.php';

$id1 = $_SESSION['userid'];



if (isset($_POST['submit'])) {

    $file = $_FILES['file'];



    $fileName = $_FILES['file']['name'];

    $fileTmpName = $_FILES['file']['tmp_name'];

    $fileSize = $_FILES['file']['size'];

    $fileError = $_FILES['file']['error'];

    $fileType = $_FILES['file']['type'];



    $fileExt = explode('.', $fileName);

    $fileActualExt = strtolower(end($fileExt));



    $allowed = array('jpg', 'jpeg', 'png');



    if (in_array($fileActualExt, $allowed)) {

        if ($fileError === 0) {

            if ($fileSize < 10000000) {

                $fileNameNew = "avatar".$id1.".".$fileActualExt;

                $fileDestination = 'uploads/'.$fileNameNew;

                move_uploaded_file($fileTmpName, $fileDestination);

                $sql = "UPDATE profileimg SET stat = 0 WHERE userid='$id1';";

                $result = mysqli_query($conn, $sql);

                header("Location: profile.php?uploadsuccess");

            } else {

                echo "Fișierul este prea mare!";

            }

        } else {

            echo "A aparut o eroare la încarcarea fișierului!";

        }

    } else {

        echo "Nu poți încarca fișiere de acest tip!";

    }



}