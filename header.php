<?php

    session_start();

?>

<!DOCTYPE html>

<html>

    <head>

        <meta charset="UTF-8" />

        <meta name="viewvport" content="width=device-width, initial-scale=1.0" />

        <meta http-equiv="X-UA-Compatible" content="ie=edge" />

        <link rel="stylesheet" type="text/css" href="css/styles.css">

        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

        <title>Smart Organizer</title>
    	<link rel="icon" href="images/favicon.ico">

    </head>

    <body>

    <header>

      <nav>

        <input id="nav-toggle" type="checkbox">

      <div class="logo">SMART<strong>ORGANIZER</strong></div>

      <ul class="links">

      <li><a href="index.php">Acasă</a></li>

      <li><a href="index.php#despre">Despre</a></li>

      <li><a href="index.php#services">Servicii</a></li>

      <?php

                    if (isset($_SESSION["useruid"])) {

                        echo "<li><a href='dashboard.php'>Tablou de bord</a></li>";

                        echo "<li><a href='includes/logout.inc.php'>Deconectează-te</a></li>";

                    }

                    else {

                        echo "<li><a href='signup.php'>Înregistrează-te</a></li>";

                        echo "<li><a href='login.php'>Autentificare</a></li>";            

                    }

            ?> 

      </ul>

      <label for="nav-toggle" class="icon-burger">

        <div class="line"></div>

        <div class="line"></div>

        <div class="line"></div>

      </label>

    </nav>

    </header>