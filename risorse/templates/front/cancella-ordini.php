<?php require_once("../../config.php"); 

if (isset($_GET['id'])) {

    $cancellaOrdine = query("UPDATE ordini SET status_ordine = 'cancellato', cur_ordine = 'cancellato' WHERE id_ordine = {$_GET['id']} ");
    conferma($cancellaOrdine);

    creaAvviso('Hai cancellato correttamente un ordine');
    header("Location: ../../../public/areariservata.php?ordini");
} else {
    header("Location: ../../../public/areariservata.php?ordini");
}
