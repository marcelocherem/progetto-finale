<?php
require_once("../risorse/config.php"); //percorso da index.php = config.php
include(FRONT_END . DS . 'header.php'); //risorse/templates/front/header.php
?>
<div class="space"></div>
<div class="bigCall">
    <div class="bestCall">
        <h1>Novità</h1>
        <div class="line"></div>
        <img src="../risorse/immagini/call.png" alt="" class="glassEnd">
    </div>
</div>

<div class="products">
    <div class="container">
        <div class="row">
            <?php paginaCategoria(); ?>

        </div>
    </div>
</div>


<!-- Footer -->
<?php
include(FRONT_END . DS . 'footer.php');
?>