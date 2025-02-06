<?php
require_once("../../risorse/config.php");
include(BACK_END . DS . "header.php");

//richiamo della sessione per utente diverso da Admin
if ($_SESSION['ruolo'] !== 'admin') {
    header('Location: ../../public/areariservata.php');
}
?>



<!-- INIZIO INDEX -->

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Pannello di amministrazione
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- RIEPILOGO -->
        <?php
        //definizione delle directories per homepage (URI) e sottopagine
        if ($_SERVER['REQUEST_URI'] == "/PROGETTO_FINALE/public/admin/" || $_SERVER['REQUEST_URI'] == "/PROGETTO_FINALE/public/admin/index.php") {
            include(BACK_END . DS . "content_admin.php");
        }

        if (isset($_GET['ordini'])) {
            include(BACK_END . DS . "ordini.php");
        }

        if (isset($_GET['prodotti-admin'])) {
            include(BACK_END . DS . "prodotti-admin.php");
        }

        if (isset($_GET['aggiungi-pdt'])) {
            include(BACK_END . DS . "aggiungi-pdt.php");
        }

        if (isset($_GET['aggiorna-pdt'])) {
            include(BACK_END . DS . "aggiorna-pdt.php");
        }

        if (isset($_GET['categorie-admin'])) {
            include(BACK_END . DS . "categorie-admin.php");
        }
        if (isset($_GET['clienti'])) {
            include(BACK_END . DS . "clienti.php");
        }

        if (isset($_GET['rapporti'])) {
            include(BACK_END . DS . "rapporti.php");
        }

        ?>
    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
</div>
</div>
<!-- /space header -->

<?php include(BACK_END . DS . "footer.php"); ?>