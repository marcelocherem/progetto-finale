<?php
require_once("../risorse/config.php");
require_once('carrello.php'); //contiene le funzioni per la gestione del carrello
include(FRONT_END . DS . 'header.php');

?>
<div class="space"></div>
<!-- Page Content -->
<div class="checkoutPg">
<div class="container">
    <!-- /.row -->
    <h1 class="text-center my-5">Il tuo ordine</h1>
    <h5 class="bg-warning text-center text-white">

        <!-- mostra avviso -->
        <?php mostraAvviso();  ?>
    </h5>
    <div class="row">
        <div class="col-sm-12 col-md-10 col-lg-10 m-auto">

            <!-- paypal -->
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

                <!-- campi di paypal -->
                <input type="hidden" name="cmd" value="_cart">
                <input type="hidden" name="business" value="sb-nowhv5987420@business.example.com">
                <input type="hidden" name="charset" value="utf-8">
                <input type="hidden" name="currency_code" value="EUR">
                <!-- /campi di paypal -->

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Prodotto</th>
                            <th>Prezzo</th>
                            <th>Quantità</th>
                            <th>Importo</th>
                            <th>MODIFICA</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        //la funzione carrello la troviamo nella pagina carrello.php
                        carrello(); 
                        ?>

                    </tbody>
                </table>

                <!-- PULSANTE PAYPAL -->
                <input type="hidden" name="upload">
                <input type="image" src="https://www.paypalobjects.com/it_IT/IT/i/btn/btn_buynowCC_LG.gif"  name="submit" alt="paga subito">
                <img alt=""  src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
                <!-- /PULSANTE PAYPAL -->
            </form>

        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">

            <h2>Riepilogo ordine</h2>

            <table class="table table-bordered" cellspacing="0">

                <tr class="cart-subtotal">
                    <th>Articoli:</th>
                    <td>
                        <span class="amount">

                            <!-- quantità articoli -->
                            <?php 
                            echo isset($_SESSION['quantita_art']) ?  $_SESSION['quantita_art']  : $_SESSION['quantita_art'] = '0'; 
                            ?>
                            
                        </span>
                    </td>
                </tr>
                <tr class="shipping">
                    <th>Spedizione</th>
                    <td>Gratuita</td>
                </tr>

                <tr class="order-total">
                    <th>Totale ordine</th>
                    <td><strong>
                            <span class="amount">€

                                <!-- importo tot. articoli -->
                                <?php 
                                echo isset($_SESSION['totale']) ?  $_SESSION['totale']  : $_SESSION['totale'] = '0'; 
                                ?>
                            </span>
                        </strong>
                    </td>
                </tr>

                </tbody>

            </table>
        </div>
    </div>
</div>
</div>

<?php include(FRONT_END . DS . 'footer.php'); ?>