<?php
    require "header.php";

?>

    <main  class="signup">
        <div class="wrap">
            
            <?php
                $selector = $_GET["selector"];
                $validator = $_GET["validator"];


                if (empty($selector) || empty($validator)) {
                    echo 'Cererea ta nu a putut fi validată!';
                }else {
                        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                            ?>

                            <form action="includes/reset-password.inc.php" method="post"  class="signform">
                                <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                                <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                                <div class="form-group"><input type="password" class="form-control" name="pwd" placeholder="Introduceți noua parolă"></div>
                                <div class="form-group"><input type="password" class="form-control" name="pwd-repeat" placeholder="Repetați noua parolă"></div>
                                <input type="submit" name="reset-password-submit" value="Resetați parola">
                            </form>

                            <?php
                        }
                    }
            ?>

        </div>
    </main>

<?php
    require "footer.php";
?>