<?php



$servername = "localhost";

$dBUsername = "user";

$dBPassword = "password";

$dBName = "smartorg_database";



$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);



if(!$conn){

    die("Connection failed: " . mysqli_connect_error());

}