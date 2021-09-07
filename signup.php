<?php
    require "header.php";

?>

<main class="signup">
    <div class="wrap">
        <h2 class="signtitle">Înregistrează-te</h2>
        <form action="includes/signup.inc.php" class="signform" method="post">
            <input type="text" name="name" placeholder="Nume.." required>
            <input type="text" name="mail" placeholder="Mail.." required>
            <input type="text" name="uid" placeholder="Nume de utilizator.." required>
            <input type="password" name="pwd" placeholder="Parolă.." required>
            <input type="password" name="pwd-repeat" placeholder="Repetă parola.." required>
            <input type="submit" name="signup-submit" value="Trimite">
        </form>
    
    </div>
    <?php
                        if (isset($_GET["error"])) {
                                if ($_GET["error"] == "emptyinput") {
                                echo "<p>Completează toate spațiile!</p>";
                            }
                                else if ($_GET["error"] == "invaliduid") {
                                    echo "<p>Nume de utilizator neadecvat!</p>";
                                }
                                else if ($_GET["error"] == "invalidmail") {
                                    echo "<p>Email neadecvat!</p>";
                                }
                                else if ($_GET["error"] == "passwordsdontmatch") {
                                    echo "<p>Parolele nu corespund!</p>";
                                }
                                else if ($_GET["error"] == "stmtfailed") {
                                    echo "<p>Ceva nu a mers bine!</p>";
                                }
                                else if ($_GET["error"] == "usernametaken") {
                                    echo "<p>Numele de utilizator este deja folosit!</p>";
                                }
                                else if ($_GET["error"] == "none") {
                                    echo "<p>Te-ai înregistrat cu succes!</p>";
                                }
                        } 
                        ?>


</main>
<script type="text/javascript">
        console.log($sql);
        </script>