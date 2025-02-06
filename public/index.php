<?php
require_once("../risorse/config.php"); //percorso da index.php = config.php
include(FRONT_END . DS . 'header.php'); //risorse/templates/front/header.php
?>
<!-- banners -->
<div class="banners">
    <div class="banner1">
        <a class="bannerA" href="shop.php">
            <h1>Stile</h1>
            <h1>Comfort &</h1>
            <h1>Convenienza!</h1>
            <div class="actBtn">
                <img class="arrow" src="../risorse/immagini/arrow.png" alt="">
                <a class="exploreBtn" href="shop.php">Esplora</a>
            </div>
        </a>
    </div>
    <div class="banner2">
        <div class="imgBanner2"></div>
        <div class="containerCollection">
            <a class="bannerA" href="sale.php">
                <div class="text">
                    <h1>Prodotti in</h1>
                    <h1>promozione</h1>
                    <h2>fino a 15% di sconto</h2>
                </div>
                <div class="actBtn">
                    <img class="arrow" src="../risorse/immagini/arrow.png" alt="">
                    <a class="collectionBtn" href="sale.php">Visualizza collezione</a>
                </div>
            </a>
        </div>
    </div>
    <div class="banner3">
        <a class="bannerA" href="new.php">
            <div class="containerCollection">
                <div class="text">
                    <h1>Collezione</h1>
                    <h1>moderna</h1>
                    <h2>Nuovi arrivi di stagione</h2>
                </div>
                <div class="actBtn">
                    <img class="arrow" src="../risorse/immagini/arrow.png" alt="">
                    <a class="collectionBtn" href="new.php">Visualizza collezione</a>
                </div>
            </div>
        </a>
        <div class="imgBanner3"></div>
    </div>
</div>
<!-- container di vantagi -->
<?php include(FRONT_END . DS . 'vantaggi.php'); ?>
<!-- chiamata di best sellers -->
<div class="bigCall">
    <div class="call">
        <h1>Accendi il tuo stile!</h1>
    </div>
    <div class="bestCall">
        <h1>I Più Venduti</h1>
        <div class="line"></div>
        <img src="../risorse/immagini/call.png" alt="" class="glassEnd">
    </div>
</div>
<!-- /chiamata di best sellers -->
<!-- prodotti nuovi -->
<div class="bestProducts">
    <div class="container">
        <div class="row">
            <?php mostraBestProdotti(); ?>
        </div>
    </div>
</div>
<!-- chiamata di prodotti generali -->
<div class="firtPurchase">
    <div class="whitePart"></div>
    <div class="callPurchase">
        <h1>Ottieni il 25% di sconto sul tuo primo acquisto</h1>
    </div>
</div>
<div class="saleCall">
    <div class="call">
        <h1>25% Sconti</h1>
    </div>
    <div class="bestSale">
        <h1>On Sale!</h1>
        <div class="line"></div>
        <img src="../risorse/immagini/call.png" alt="" class="glassEnd">
    </div>
</div>
<!-- /ciamata di prodotti generali -->
<!-- prodotti -->
<div class="products">
    <div class="container">
        <div class="row">
            <?php mostraProdotti(); ?>
        </div>
    </div>
</div>
<!-- / prodotti -->
<!-- Footer -->
<?php
include(FRONT_END . DS . 'footer.php');
?>