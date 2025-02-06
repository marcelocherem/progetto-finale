<?php
require_once("../../risorse/config.php");

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
    <title>Area Admin</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- style -->
    <link rel="stylesheet" type="text/css" href="css/template.css">
    <!-- used fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <!-- icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="../risorse/immagini/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../risorse/immagini/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../risorse/immagini/favicon-16x16.png">

</head>

<body>

    <nav class="sidebar">
        <a href="../index.php"><img src="../../risorse/immagini/Logo.png" alt=""></a>
        <div class="line"></div>
        <ul>
            <li><a href="index.php?prodotti-admin">Vedi Prodotti</a></li>
            <li><a href="index.php?prodotti-admin">Categorie</a></li>
            <li><a href="index.php?prodotti-admin">Ordini</a></li>
            <li><a href="index.php?prodotti-admin">Clienti</a></li>
            <li><a href="index.php?prodotti-admin">Rapporti</a></li>
        </ul>
    </nav>
    <div class="siteBody">
        <nav class="topBar">
            <a class="visita" href="../index.php">Visita il sito</a>
            <div class="dropdown">
                <button class="dropbtn"><?php
                        if (isset($_SESSION['username'])) {
                            echo 'Ciao, ' . $_SESSION['username'];
                        } else {
                            echo "utente non riconosciuto";
                        }
                        ?></button>
                <div class="dropdown-content">
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </nav>
    </div>

</body>