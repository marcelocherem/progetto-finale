<?php
require_once("../risorse/config.php"); //percorso da index.php = config.php
include(FRONT_END . DS . 'header.php'); //risorse/templates/front/header.php
?>
<!-- spazio vuoto -->
<div class="space"></div> 
<!-- chiamata di best sellers -->
<div class="bigCall">
    <div class="call">
        <h1>25% di sconto</h1>
    </div>
    <div class="bestCall">
        <h1>Sale</h1>
        <div class="line"></div>
        <img src="../risorse/immagini/call.png" alt="" class="glassEnd">
    </div>
</div>
<!-- /chiamata di best sellers -->
 <!-- prodotti -->
<div class="products">
    <div class="container">
        <div class="row">
            <?php paginaSale(); ?>

        </div>
    </div>
</div>
<!-- /prodotti -->
<!-- Footer -->
<?php
include(FRONT_END . DS . 'footer.php');
?>