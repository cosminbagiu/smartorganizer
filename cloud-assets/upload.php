<?php

include_once '../includes/dbh.inc.php';
session_start();

if(isset($_POST['btn-upload']))

{    

     

 $file = rand(1000,100000)."-".$_FILES['file']['name'];

    $file_loc = $_FILES['file']['tmp_name'];

 $file_size = $_FILES['file']['size'];

 $file_type = $_FILES['file']['type'];

 $folder="uploads/";

 

 // new file size in KB

 $new_size = $file_size/1024;  

 // new file size in KB

 

 // make file name in lower case

 $new_file_name = strtolower($file);

 // make file name in lower case

 

 $final_file=str_replace(' ','-',$new_file_name);

 

 if(move_uploaded_file($file_loc,$folder.$final_file))

 {

  $sql="INSERT INTO stuff(file,type,size,usrid) VALUES('$final_file','$file_type','$new_size','$_SESSION[userid]')";

  mysqli_query($conn, $sql);

  ?>

  
  <?php
      header("Location: ../pstuff.php?success");
 }

 else

 {

  ?>

  <?php
            header("Location: ../pstuff.php?fail");
 }

}

?>