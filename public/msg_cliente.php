<?php 
require_once("../risorse/config.php"); 
require_once('carrello.php'); 
include(FRONT_END . DS . 'header.php'); ?>

<div class="container">

    <h2 class="display-4 mt-5">Grazie per l'acquisto</h2>

    <?php transazioni(); ?>

</div>


<!-- Footer -->
<?php  include(FRONT_END . DS . 'footer.php'); ?>