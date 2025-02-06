<?php
require_once("../risorse/config.php"); //percorso da index.php = config.php
include(FRONT_END . DS . 'header.php'); //risorse/templates/front/header.php
?>
<div class="space"></div>
<div class="bigCall">
    <div class="call">
        <h1>scopri Cool Glasses</h1>
    </div>
    <div class="bestCall">
        <h1>Shop</h1>
        <div class="line"></div>
        <img src="../risorse/immagini/call.png" alt="" class="glassEnd">
    </div>
</div>

<div class="products">
    <div class="container">
        <div class="row">
            <?php mostraProdotti(); ?>

        </div>
    </div>
</div>

<!-- Footer -->
<?php
include(FRONT_END . DS . 'footer.php');
?>