<?php require_once("../risorse/config.php");
include(FRONT_END . DS . 'header.php');
?>

<div class="loginArea">
    <div class="loginAreaInt">
        <!-- messagio di avviso -->
        <h3 class="avviso"><?php mostraAvviso(); ?></h3>

        <h2 class="loginAreaBtn">Registrati</h2>
        <!-- funzione di signup -->
        <?php signup(); ?>
        <div class="formPart">
            <form class="loginPart" action="signup.php" method="post">
                <input class="name" type="text" placeholder="Nome Utente" name="username" required>
                <input class="password" type="password" placeholder="Password" name="password" required>
                <button type="submit" name="signup">Registrati</button>
                <a href="login.php">Hai già un account? Accedi ora!</a>
            </form>
        </div>
    </div>
</div>
<!-- Footer -->
<?php include(FRONT_END . DS . 'footer.php'); ?>