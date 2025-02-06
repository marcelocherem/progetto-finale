<?php require_once("../../config.php"); 

if (isset($_GET['id'])) {

    $cancellaOrdine = query("DELETE FROM ordini WHERE id_ordine = $_GET[id] ");
    conferma($cancellaOrdine);

    creaAvviso('Hai cancellato correttamente un ordine');
    header("Location: ../../../public/admin/index.php?ordini");
} else {
    header("Location: ../../../public/admin/index.php?ordini");
}
