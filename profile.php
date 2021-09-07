
<?php

session_start();

include_once 'includes/dbh.inc.php';
if (isset($_SESSION["useruid"])) {

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="images/favicon.ico">
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="dash-assets/css/styles.css">

        <title>Profilul meu</title>
    </head>
    <body id="body-pd">
    <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>

            <div class="header__img">
            </div>
        </header>

        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="index.php" class="nav__logo">
                        <i class='bx bx-world nav__logo-icon'></i>
                        <span class="nav__logo-name">Smart Organizer</span>
                    </a>

                    <div class="nav__list">
                        <a href="dashboard.php" class="nav__link">
                        <i class='bx bx-grid-alt nav__icon' ></i>
                            <span class="nav__name">Tablou de bord</span>
                        </a>

                        <a href="profile.php" class="nav__link active">
                            <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Profilul meu</span>
                        </a>
                        
                        <a href="reminders.php" class="nav__link">
                            <i class='bx bx-calendar-event nav__icon' ></i>
                            <span class="nav__name">Remindere</span>
                        </a>

                        <a href="note.php" class="nav__link">
                            <i class='bx bx-notepad nav__icon' ></i>
                            <span class="nav__name">Notițe</span>
                        </a>

                        <a href="pstuff.php" class="nav__link">
                            <i class='bx bx-cloud-upload nav__icon' ></i>
                            <span class="nav__name">Portofel virtual</span>
                        </a>

                    </div>
                </div>

                <a href="includes/logout.inc.php" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Deconectează-te</span>
                </a>
            </nav>
        </div>
        </div>

        
          <!-- /Breadcrumb -->
          <?php

$sql = "SELECT * FROM users WHERE usersId=".$_SESSION['userid'].";";

$result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {

        $id = $row['usersId'];

        $sqlImg = "SELECT * FROM profileimg WHERE userid='$id'";

        $resultImg = mysqli_query($conn, $sqlImg);

        while ($rowImg = mysqli_fetch_assoc($resultImg)) {
            echo "<center><h1>Bine ai venit pe profilul tău de utilizator!</h1></center><br>";
            echo "<div class='container'>";
                    echo "<div class='main-body'>";
            echo "<div class='row gutters-sm'>";
            echo "<div class='col-md-4 mb-3'>";
            echo "<div class='card'>";
            echo "<div class='card-body'>";
            echo "<div class='d-flex flex-column align-items-center text-center'>";
            echo "<div class='mt-3'>";
                     echo "<h4><label>Profilul lui ".$row['usersUid']."</label></h4>"; 
                     echo "</div>";
                     if ($rowImg['stat'] == 0) {

                        echo "<img src='uploads/avatar".$id.".jpg?'".mt_rand()." class='rounded-circle' width='140'>";

                        }else{

                        echo "<img src='images/avatardefault.jpg' class='rounded-circle' width='140'>";

                    } 
                    echo "</div>";

                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='col-md-8'>";
                    echo "<div class='card mb-3'>";
                    echo "<div class='card-body'>";
                    echo "<div class='row'>";
                    echo "<div class='col-sm-3'>";
                    echo "<h6 class='mb-0'>ID utilizator</h6>";
                      echo "</div>";
                      echo "<div class='col-sm-9 text-secondary'>";
                    echo "<label>".$row['usersId']."</label>";
                    echo "</div>";
                    echo "</div>";
                    echo "<hr>";
                    echo "<div class='row'>";
                    echo "<div class='col-sm-3'>";
                    echo "<h6 class='mb-0'>Nume de utilizator</h6>";
                      echo "</div>";
                      echo "<div class='col-sm-9 text-secondary'>";
                    echo "<label>".$row['usersUid']."</label>";
                    echo "</div>";
                    echo "</div>";
                    echo "<hr>";
                    echo "<div class='row'>";
                    echo "<div class='col-sm-3'>";
                    echo "<h6 class='mb-0'>Nume</h6>";
                      echo "</div>";
                      echo "<div class='col-sm-9 text-secondary'>";
                    echo "<label>".$row['usersName']."</label>";
                    echo "</div>";
                    echo "</div>";
                    echo "<hr>";
                    echo "<div class='row'>";
                    echo "<div class='col-sm-3'>";
                    echo "<h6 class='mb-0'>Mail</h6>";
                      echo "</div>";
                      echo "<div class='col-sm-9 text-secondary'>";
                    echo "<label>".$row['usersMail']."</label>";
                    echo "</div>";
                    echo "</div>";
                    echo "<hr>";
                    echo "<div class='row'>";
                    echo "<div class='col-sm-3'>";
                    echo "<h6 class='mb-0'>Schimbă poza de profil</h6>";
                      echo "</div>";
                      echo "<div class='col-sm-9 text-secondary'>";
                      if(!isset($_SESSION['usersId'])){

                        echo"<center><form action='upload.php' method='POST' enctype='multipart/form-data'>
                            
                            <input type='file' name='file' class='form-control-file' id='exampleFormControlFile1' width=>
    
                            <button type='submit' name='submit' class='btn btn-success'>Schimbă</button>
                            </center>
                        </form>"; 
    
                        }                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='row gutters-sm'>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
}

}
?>
<!--===== MAIN JS =====-->
<script src="dash-assets/js/main.js"></script>
    </body>
    <?php
        }

        else {
            header("Location: ../login.php");
        }

        ?> 
</html>
