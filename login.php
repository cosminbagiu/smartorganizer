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

                        echo "<li><a href='signup.php'>Înregistreză-te</a></li>";

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

    <main class="login">

        <section class="loginform">

            <div class="form-container">

                <h1 class="logintitle">autentificare</h1>

                <form action="includes/login.inc.php" method="post">

                    <div class="control">

                        <label for="name">Nume</label>

                        <input type="text" name="uid" id="name">

                        </div>

                    <div class="control">

                        <label for="password">Parolă</label>

                        <input type="password" name="pwd" id="psw">

                        </div>

                    <div class="control">

                        <input type="submit" name="login-submit" value="Login">

                    </div>

                </form>

                <center><div class="link">

                <a href="reset-password.php">Ai uitat parola? Reseteaz-o!</a>

                </div>

                <?php

                    if (isset($_GET["newpwd"])) {

                        if ($_GET["newpwd"]== "passwordupdated") {

                            echo "<p style='color:white;'>Parola a fost resetată</p>";

                        }

                    }

                ?>

                <?php

                    if (isset($_GET["error"])) {

                        if ($_GET["error"] == "emptyinput") {

                            echo "<p style='color:white;'>Completează toate spațiile!</p>";

                        }

                        else if ($_GET["error"] == "wronglogin") {

                            echo "<p style='color:white;'>Date de logare incorecte!</p>";

                        }

              

                    } 

                ?></center> 

            </div>

        </section>

    </main>

</div>

</body>

</html>