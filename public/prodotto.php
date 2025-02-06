<?php
require_once("../risorse/config.php"); //percorso da index.php = config.php
include(FRONT_END . DS . 'header.php'); //risorse/templates/front/header.php
?>

<?php
//query per selezionare i prodotti dalla relativa tabella
$singlePdt = query("SELECT * FROM prodotti WHERE id_pdt = {$_GET['id']}");
conferma($singlePdt);

//estrazione dalle righe della tabella
while ($row = fetch_array($singlePdt)) :

?>
    <div class="prodottoPg">
        <div class="space"></div>
        <div class="prodottoFirst">
            <div class="imgProduct">
                <img class="card-img-top img-fluid zoom" src="../risorse/immagini/<?php echo $row['immagine']; ?>" alt="">
            </div>
            <div class="container">
                <h1 class="name"><?php echo $row['nome_pdt']; ?></h1>
                <h2 class="quantity">There are still <?php echo $row['quantita_pdt']; ?> of this product in stock.</h2>
                <h1 class="pdDetails">Product Details</details>
                </h1>
                <h2 class="details"><?php echo $row['descr_breve']; ?></h2>
                <p class="detailsFull"><?php echo $row['info_dettagliate']; ?></p>
                <div class="actionBuy">
                    <h2 class="price">€<?php echo $row['prezzo']; ?></h2>
                    <a href="carrello.php?add=<?php echo $row['id_pdt']; ?>"class="addToCart">Add to cart</a>
                </div>
            </div>
        </div>
        <!-- <div class="line"></div> -->

    </div>
<?php endwhile;
 include(FRONT_END . DS . 'vantaggi.php');?>
<div class="bigCall">
    <div class="call">
        <h1>scopri Cool Glasses</h1>
    </div>
    <div class="bestCall">
        <h1>Other products</h1>
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