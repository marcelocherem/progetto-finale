<?php
require_once("../risorse/config.php");
include(FRONT_END . DS . 'header.php');

// sessione differenziata per ruolo
if ($_SESSION['ruolo'] !== 'utente') {
    //redirect
    // header('Location: areariservata.php');
    header('Location: admin/index.php?prodotti-admin');
}
?>


<!-- As a heading -->
<div class="spaceRiservata"></div>
<nav class="menuAreaRiservata">
    <div class="dropdown">
        <button class="dropbtn"><?php if (isset($_SESSION['username'])) {
                                    echo 'Ciao, ' . $_SESSION['username'] . '. Benvenuto/a nella tua AREA RISERVATA';
                                } else {
                                    echo "utente non riconosciuto";
                                } ?></button>
        <div class="dropdown-content logout">
            <a href="logout.php">Logout</a>
        </div>
    </div>
</nav>
<div class="bodyAreaRiservata">
    <a href="areariservata.php?ordini" class="box mieiordini">
        <img src="../risorse/immagini/clipboard.png" alt="" class="icon">
        <h3>Miei Ordini</h3>

    </a>
    <a href="areariservata.php?profilo" class="box profilo">
        <img src="../risorse/immagini/userriserva.png" alt="" class="icon">
        <h3>Profilo</h3>
    </a>
</div>
<div class="bodyBtnRiservata">
    <?php
    //definizione delle directories per homepage (URI) e sottopagine
    if ($_SERVER['REQUEST_URI'] == "/PROGETTO_FINALE/public/" || $_SERVER['REQUEST_URI'] == "/PROGETTO_FINALE/public/areariservata.php") {
        include(FRONT_END . DS . "content_admin.php");
    }

    if (isset($_GET['ordini'])) {
        include(FRONT_END . DS . "ordini.php");
    }

    if (isset($_GET['pagamenti'])) {
        include(FRONT_END . DS . "pagamenti.php");
    }

    if (isset($_GET['profilo'])) {
        include(FRONT_END . DS . "profilo.php");
    }

    ?>
</div>



</div>
<?php include(FRONT_END . DS . "footer.php"); ?>