<?php require_once("../risorse/config.php");
include(FRONT_END . DS . 'header.php');
?>

<div class="loginArea">
    <div class="loginAreaInt">
        <!-- messagio di avviso -->
        <h3 class="avviso"><?php mostraAvviso(); ?></h3>

        <h2 class="loginAreaBtn">Login</h2>
        <!-- funzione di  login -->
        <?php login(); ?>
        <div class="formPart">
            <form class="loginPart" role="form" method="post" action="">
                <input class="name" type="text" placeholder="Nome Utente" name="username" required>
                <input class="password" type="password" placeholder="Password" name="password" required>
                <button type="submit" name="login">Accedi</button>
                <a href="signup.php">Non hai un account? Registrati!</a>
            </form>
        </div>
    </div>
</div>
<!-- Footer -->
<?php include(FRONT_END . DS . 'footer.php'); ?>