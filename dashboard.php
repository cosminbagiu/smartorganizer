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

        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="dash-assets/css/styles.css">
        <link rel="stylesheet" href="css/boxes.css">
	<link rel="icon" href="images/favicon.ico">
        <title>Tablou de bord</title>
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
                        <a href="dashboard.php" class="nav__link active">
                        <i class='bx bx-grid-alt nav__icon' ></i>
                            <span class="nav__name">Tablou de bord</span>
                        </a>

                        <a href="profile.php" class="nav__link">
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
        <br>
        <?php
        $sql = "SELECT * FROM users WHERE usersId=".$_SESSION['userid'].";";

        $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
        echo "<center><h1>Tabloul de bord al lui ".$row['usersUid']."</h1></center>";
            }
            mysqli_free_result($result);
        ?>
        <div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="dbox dbox--color-1">
				<div class="dbox__icon">
					<i class="bx bx-calendar-event"></i>
				</div>
				<div class="dbox__body">
                <span class="dbox__count">
                <?php
                foreach($conn->query("SELECT COUNT(*) FROM reminders WHERE flag = '1' AND userid=".$_SESSION['userid'].";") as $row) {
                    echo " ".$row['COUNT(*)']." ";
                }?>
                </span>
                <span class="dbox__title">Remindere adăugate</span>
				</div>			    	
			</div>
		</div>
		<div class="col-md-4">
			<div class="dbox dbox--color-2">
				<div class="dbox__icon">
					<i class="bx bx-notepad"></i>
				</div>
				<div class="dbox__body">
					<span class="dbox__count">
                    <?php
                    foreach($conn->query("SELECT COUNT(*) FROM notes WHERE usrid=".$_SESSION['userid']."") as $row) {
                        echo " ".$row['COUNT(*)']." ";
                    }?>
                    </span>
					<span class="dbox__title">Notițe postate</span>
				</div>			
			</div>
		</div>
		<div class="col-md-4">
			<div class="dbox dbox--color-3">
				<div class="dbox__icon">
					<i class="bx bx-cloud-upload"></i>
				</div>
				<div class="dbox__body">
					<span class="dbox__count">
                    <?php
                    foreach($conn->query("SELECT COUNT(*) FROM stuff WHERE usrid=".$_SESSION['userid']."") as $row) {
                        echo " ".$row['COUNT(*)']." ";
                    }?>
                    </span>
					<span class="dbox__title">Fișiere salvate</span>
				</div>			
			</div>
		</div>
	</div>
</div>
        <center><p class="h6">Aici este locul unde veți putea vizualiza detalii cu privire la activitatea dvs. de pe platformă.<br>
        Totodată, în cadrul acestei pagini veți putea află actualizările pe care platforma le va suferi.</p></center>
        
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