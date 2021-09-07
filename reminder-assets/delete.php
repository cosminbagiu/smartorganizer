<?php 
require_once('../includes/dbh.inc.php'); // import page

mysqli_query($conn, "delete from reminders where id = '$_GET[id]'");
header('Location:../reminders.php');
?>
