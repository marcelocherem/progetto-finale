<?php require_once("../../config.php"); 

if (isset($_GET['id'])) {

    $cancellaPdt = query("DELETE FROM prodotti WHERE id_pdt = $_GET[id] ");
    conferma($cancellaPdt);

    creaAvviso('Hai cancellato correttamente un prodotto');
    header("Location: ../../../public/admin/index.php?prodotti-admin");
} else {
    header("Location: ../../../public/admin/index.php?prodotti-admin");
}