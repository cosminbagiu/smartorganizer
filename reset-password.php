<?php

    require "header.php";



?>



    <main class="signup">

        <div class="wrap">

        <h2 class="signtitle">Resetează parola</h2>

            <form action="includes/reset-request.inc.php" method="post" class="signform">

                    <input type="text" name="email" placeholder="Email">

                <input type="submit" name="reset-request-submit" value="Reseteaza parola">

            </form>

            <?php

                if (isset($_GET["reset"])) {

                    if ($_GET["reset"]=="success") {

                        echo "<p style='color:white; text-align: center;'>Verifica email-ul!</p>";

                    }

                }



            ?>



        </div>

    </main>

