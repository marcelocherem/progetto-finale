<?php require_once("../risorse/config.php"); 
include(FRONT_END . DS . 'header.php'); ?>

<!-- Page Content -->
<div class="space"></div>
<div class="bigCall">
    <div class="bestCall">
        <h1>Echo la tua ricerca</h1>
        <div class="line"></div>
        <img src="../risorse/immagini/call.png" alt="" class="glassEnd">
    </div>
</div>

<div class="products productsRicerca">
    <div class="container">
        <div class="row">
            <?php ricerca(); ?>

        </div>
    </div>
</div>
<!-- Footer -->
<?php include(FRONT_END . DS . 'footer.php'); ?>