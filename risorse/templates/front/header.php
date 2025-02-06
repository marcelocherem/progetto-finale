<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
    <title>COOL glasses</title>
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
    <nav class="menu" id="menu">
        <div class="menuInt">
            <!-- prima parte del menu/hamburguer -->
            <nav class="menuFirst navbar navbar-expand-xl navbar-light">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-start" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item me-4">
                                <a class="nav-link option" href="index.php">HOME</a>
                            </li>
                            <li class="nav-item me-4">
                                <a class="nav-link option" href="shop.php">SHOP</a>
                            </li>
                            <li class="nav-item me-4">
                                <a class="nav-link option" href="new.php">NOVITÀ</a>
                            </li>
                            <li class="nav-item me-4">
                                <a class="nav-link option" href="sale.php">SALE</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- logo centrale -->
            <div class="logo">
                <div class="circle">
                    <a href="index.php">
                    <img src="../risorse/immagini/Logo.png" alt="" class="logoIcon">
                    </a>
                </div>
            </div>
            <!-- ultimmo menu -->
            <div class="menuSecond">
                <!-- area di ricerca -->
                 <div class="secondSearchBar">
                    
                 </div>
                <div class="search">
                    <img src="../risorse/immagini/search.png" alt="">
                </div>
                <!-- button di login dove se sei già collegatto cambia href per pagina riservata -->
                <div class="login">
                    <?php if (isset($_SESSION['username'])) {
                        $link = 'areariservata.php';
                        $link_text = 'Area Riservata';
                    } else {
                        $link = 'login.php';
                        $link_text = 'Login';
                    }
                    ?>
                    <a href="<?php echo $link; ?>" class="cart loginCart">
                        <img src="../risorse/immagini/user.png" alt="">
                    </a>
                </div>
                <!-- button carrello con contatore di articoli, perõ da migliorare funzionalità -->
                <div class="sale">
                    <a class="cart" href="checkout.php">
                        <img src="../risorse/immagini/basket.png" alt="">
                        <span class="cartCount" id="cartCount"><?php
                                                                echo isset($_SESSION['quantita_art']) ?  $_SESSION['quantita_art']  : $_SESSION['quantita_art'] = '0';
                                                                ?></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="containerSearchBar">
        <div class="searchBar">
            <div class="close"></div>
            <div class="searchBarInt">
                <form method="post" action="ricerca.php">
                    <div class="searchFormInt">
                        <input type="text" class="ricerca" placeholder="ricerca" name="ricerca">
                        <div class="buttonCircle">
                            <button class="btnRicerca" type="submit" name="invia_ricerca"><img src="../risorse/immagini/search.png" alt=""></button>
                </div>
                    </div>
                </form>
            </div>
        </div>
    </div>