<?php

//FUNZIONI DI UTILITA GENERALE

//stabilisci un percorso per i tuoi uploads
$cartellaImg = "immagini";

//crea una funzione per le operazioni CRUD sul database
function query($sql)
{
    global $connessione; // global permette di rendere globale una variabile
    return mysqli_query($connessione, $sql);
}

//crea una funzioni per la gestione degli errori di connessione
function conferma($risultato)
{
    global $connessione;
    if (!$risultato) {
        die('Richiesta fallita' . mysqli_error($connessione));
    }
}

//crea una funzioni per ciclare l'array e ricavare dati dal database
function fetch_array($risultato)
{ // fetch_array permette di estrare i dati da una riga e ciclarli
    return mysqli_fetch_array($risultato);
}

//crea una funzione per la gestione dei messaggi
function creaAvviso($msg)
{
    if (!empty($msg)) { // empty: vuoto
        $_SESSION['messaggio'] = $msg;
    } else {
        $msg = " ";
    }
}

//crea una funzione per mostrare un messaggio all'interno di una pagina 
function mostraAvviso()
{
    if (isset($_SESSION['messaggio'])) {
        echo $_SESSION['messaggio'];
        unset($_SESSION['messaggio']); //reset del messaggio
    }
}

//crea una funzione per ricavare e mostrare il risultato dell'ultima sessione avviata
function idUltimo()
{
    global $connessione;
    return mysqli_insert_id($connessione);
}

//crea una funzione per gestire il percorso della cartella immagini
function mostraImg($imgProdotto)
{
    global $cartellaImg;
    return $cartellaImg . DS . $imgProdotto;
}

//FUNZIONI DI FRONT_END

function mostraCategorie()
{

    $ricercaCategorie = query('SELECT * FROM categorie');
    conferma($ricercaCategorie);

    while ($row = fetch_array($ricercaCategorie)) {
        //heredoc
        $categorie = <<<STRINGA
        <a href='categorie.php?id={$row['id_cat']}' class='list-group-item'>{$row['nome_cat']}</a>
        
        STRINGA;
        echo $categorie;
    }
}
//random di prodotti "best sellers"
function mostraBestProdotti()
{
    $ricercaPdt = query('SELECT * FROM prodotti ORDER BY RAND() LIMIT 4');
    conferma($ricercaPdt);

    while ($row = fetch_array($ricercaPdt)) {
        //heredoc: per inserire HTML in php
        $prodotti = <<<STRINGA
       <div class="col-6 col-sm-6 col-md-4 col-lg-3">
            <a href="prodotto.php?id={$row['id_pdt']}" class="product">
                <div class="photo">
                    <img src="../risorse/immagini/{$row['immagine']}" alt="" class="photoint">
                </div>
                <h2 class="price">€{$row['prezzo']}</h2>
                <h1 class="name">{$row['nome_pdt']}</h1>
            </a>
        </div>
        

  STRINGA;
        echo $prodotti;
    }
}

function mostraProdotti()
{
    $ricercaPdt = query('SELECT * FROM prodotti');
    conferma($ricercaPdt);

    while ($row = fetch_array($ricercaPdt)) {
        //heredoc: per inserire HTML in php
        $prodotti = <<<STRINGA
      <div class="col-6 col-sm-6 col-md-4 col-lg-3">
            <a href="prodotto.php?id={$row['id_pdt']}" class="product">
                <div class="photo">
                    <img src="../risorse/immagini/{$row['immagine']}" alt="" class="photoint">
                </div>
                <h2 class="price">€{$row['prezzo']}</h2>
                <h1 class="name">{$row['nome_pdt']}</h1>
            </a>
        </div>
        

  STRINGA;
        echo $prodotti;
    }
}

function paginaCategoria()
{
    $pdtCategoria = query("SELECT * FROM prodotti WHERE cat_pdt = 2");
    conferma($pdtCategoria);

    while ($row = fetch_array($pdtCategoria)) {

        $pdtSingolaCat = <<<STRINGA

      <div class="col-6 col-sm-6 col-md-4 col-lg-3">
            <a href="prodotto.php?id={$row['id_pdt']}" class="product">
                <div class="photo">
                    <img src="../risorse/immagini/{$row['immagine']}" alt="" class="photoint">
                </div>
                <h2 class="price">€{$row['prezzo']}</h2>
                <h1 class="name">{$row['nome_pdt']}</h1>
            </a>
        </div>
    STRINGA;
        echo $pdtSingolaCat;
    }
};
//separati solo i prodotti nuovi
function paginaSale()
{
    $pdtCategoria = query("SELECT * FROM prodotti WHERE cat_pdt = 6");
    conferma($pdtCategoria);

    while ($row = fetch_array($pdtCategoria)) {
        $price = $row['prezzo'];
        $price2 = $price / 0.75;

        $price2 = number_format($price2, 2, '.', '');
        $price = number_format($price, 2, '.', '');

        $pdtSingolaCat = <<<STRINGA
        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
            <a href="prodotto.php?id={$row['id_pdt']}" class="product">
                <div class="photo">
                    <img src="../risorse/immagini/{$row['immagine']}" alt="" class="photoint">
                </div>
                <h2 class="price">€$price</h2>
                <h2 class="price2">€$price2</h2>
                <h1 class="name">{$row['nome_pdt']}</h1>
            </a>
        </div>
        STRINGA;
        echo $pdtSingolaCat;
    }
}

function ricerca()
{
    if (isset($_POST['invia_ricerca'])) {

        $ricercaUtente = $_POST['ricerca'];
        //echo $ricercaUtente;

        $ricerca = query("SELECT * FROM prodotti WHERE nome_pdt  LIKE  '%$ricercaUtente%' ");
        conferma($ricerca);
    }
    $risultatoRicerca = mysqli_num_rows($ricerca);
    if ($risultatoRicerca == 0) {
        echo "Siamo spiacenti, ma non è stato possibile trovare alcun prodotto con questa ricerca. Per favore, prova con un'altra parola.";
    } else {
        //echo "E' stato trovato un prodotto";
        while ($row = fetch_array($ricerca)) {

            $mostraRicerca = <<<STRINGA
<div class="col-6 col-sm-6 col-md-4 col-lg-3">
            <a href="prodotto.php?id={$row['id_pdt']}" class="product">
                <div class="photo">
                    <img src="../risorse/immagini/{$row['immagine']}" alt="" class="photoint">
                </div>
                <h2 class="price">€{$row['prezzo']}</h2>
                <h1 class="name">{$row['nome_pdt']}</h1>
            </a>
        </div>
STRINGA;
            echo $mostraRicerca;
        }
    }
}

function login()
{
    if (isset($_POST['login'])) { //verifica se esiste il pulsante "login"

        //preleva 1 dati inseriti dall'utente nei ampi "username" e "password"
        $username = $_POST['username'];
        $password = $_POST['password'];

        //query
        $login = query("SELECT * FROM utenti WHERE username = '{$username}' AND password = '{$password}' ");
        conferma($login);

        //estrazione dati dal db
        while ($row = fetch_array($login)) {
            $idUtente = $row['id_utente'];
            $nomeUtente = $row['username'];
            $passUtente = $row['password'];
            //ruolo
            $ruoloUtente = $row['ruolo'];
        }
        //si apre la sessione per l'utente verificato
        if ($username === $nomeUtente && $password === $passUtente) {

            //apertura delle sessioni
            $_SESSION['id_utente'] = $idUtente;
            $_SESSION['username'] = $nomeUtente;
            $_SESSION['password'] = $passUtente;
            //sessione per il ruolo
            $_SESSION['ruolo'] = $ruoloUtente;

            //reindirizzamento diverso per utente
            header("Location: admin/index.php?prodotti-admin"); //redirect per admin
        } else {
            header("Location: areariservata.php"); //redirect per user
        }

        if (mysqli_num_rows($login) == 0) {
            creaAvviso('I dati di login sono errati');
            header('Location: login.php');
        }
    }
}
//signup
function login_user($nomeUtente, $passUtente)
{
    $login = query("SELECT * FROM utenti WHERE username = '{$nomeUtente}' AND password = '{$passUtente}' ");
    conferma($login);
    if (mysqli_num_rows($login) > 0) {
        $row = fetch_array($login);
        $_SESSION['id_utente'] = $row['id_utente'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['ruolo'] = $row['ruolo'];
        header("Location: areariservata.php");
    } else {
        mostraAvviso('I dati di login sono errati');
        header('Location: login.php');
    }
}
function signup()
{
    if (isset($_POST['signup'])) {
        $nomeUtente = $_POST['username'];
        $passUtente = $_POST['password'];

        // Verifica utente esiste
        $check_user = query("SELECT * FROM utenti WHERE username = '$nomeUtente'");
        conferma($check_user);

        if (mysqli_num_rows($check_user) > 0) {
            // utente esiste
            creaAvviso('Nome utente già esistente. Prova un altro.');
            header('Location: signup.php');
        } else {
            // Inserire i dati nel database
            $signup = query("INSERT INTO utenti (username, password, ruolo) VALUES ('$nomeUtente', '$passUtente', 'utente')");
            conferma($signup);

            if ($signup) {
                login_user($nomeUtente, $passUtente);
            } else {
                creaAvviso('I dati di signup sono errati');
                header('Location: signup.php');
            }
        }
    }
}


function qtdCarrello()
{
    $totArticoli = 0;
    foreach ($_SESSION as $name => $value) {
        if ($value > 0 && substr($name, 0, 9) == 'prodotto_') {
            $totArticoli += $value;
        }
    }
    return $totArticoli;
}
$item_count = qtdCarrello();


//FUNZIONI DI BACK_END

//crea una funzione per mostrare tutti i prodotti in una tabella (prodotti-admin.php)
function prodottiAdmin()
{
    $mostraPdt = query("SELECT * FROM prodotti");
    conferma($mostraPdt);

    while ($row = fetch_array($mostraPdt)) {
        $cercaCategoria = titoloCat($row['cat_pdt']); //la funzione viene di seguito
        $pdt_in_admin = <<< STRINGA
        <tr>
            <td>{$row['id_pdt']}</td>
            <td>{$row['nome_pdt']}</td>
            <td><img src="../../risorse/immagini/{$row['immagine']}" alt="" style="width:25%"></td>
            <td>{$cercaCategoria}</td>
            <td>€{$row['prezzo']}</td>
            <td>{$row['quantita_pdt']}</td>
            <td><a class="btn btn-primary" href="index.php?aggiorna-pdt&id={$row['id_pdt']}" role="button">Modifica</a>
            <td><a class="btn btn-danger" href="../../risorse/templates/back/cancella-pdt.php?id={$row['id_pdt']}" role="button">Cancella</a> </td>
        </tr>

        STRINGA;
        echo $pdt_in_admin;
    }
}

//titolo categorie
function titoloCat($catPdt)
{
    $titoloCat = query("SELECT * FROM categorie WHERE id_cat = '{$catPdt}' ");
    conferma($titoloCat);

    while ($row = fetch_array($titoloCat)) {
        return $row['nome_cat'];
    }
}

//funzione per modificare prodotti esistenti richiamandoli in un form (aggiorna-pdt-php)
function aggiornaProdotto()
{
    if (isset($_POST['aggiorna'])) {

        $nomePdt = $_POST['nome_pdt'];
        $catPdt = trim($_POST['cat_pdt']);
        $dettagli = $_POST['dettagli'];
        $infoBreve = $_POST['descr_breve'];
        $prezzo = $_POST['prezzo'];
        $quantitaPdt = $_POST['quantita_pdt'];
        $immaginePdt = $_FILES['immagine']['name'];
        $immagineTemp = $_FILES['immagine']['tmp_name'];

        if (empty($immaginePdt)) {

            $cercaImg = query("SELECT immagine FROM prodotti WHERE id_pdt = {$_GET['id']} ");
            conferma($cercaImg);

            while ($img = fetch_array($cercaImg)) {
                $immaginePdt = $img['immagine'];
            }
        }
        move_uploaded_file($immagineTemp, IMG_UPLOADS . DS . $immaginePdt); //caricamento effettivo dell'immagine

        $update = query("UPDATE prodotti SET nome_pdt = '{$nomePdt}' , cat_pdt =  '{$catPdt}' , info_dettagliate =  '{$dettagli}' , descr_breve =  '{$infoBreve}' , prezzo =  '{$prezzo}' , quantita_pdt =  '{$quantitaPdt}' , immagine =  '{$immaginePdt}' WHERE  id_pdt = {$_GET['id']}");

        conferma($update);
        creaAvviso('hai modificato correttamente un prodotto');
        header('Location: index.php?prodotti-admin');
    }
}

//crea una funzione per mostrare e selezionare la categoria del prodotto dal form (aggiungi-pdt.php)
function mostra_cat_prodotto()
{
    $query = query("SELECT * FROM categorie");
    conferma($query);

    while ($row = fetch_array($query)) {

        $cat_prodotto = <<<STRINGA
    <option value="{$row['id_cat']}">{$row['nome_cat']}</option>
  STRINGA;
        echo $cat_prodotto;
    }
}

function aggiungiPdt()
{
    if (isset($_POST['aggiungi'])) {

        $nomePdt = $_POST['nome_pdt'];
        $catPdt = $_POST['cat_pdt'];
        $dettagli = $_POST['dettagli'];
        $infoBreve = $_POST['descr_breve'];
        $prezzo = $_POST['prezzo'];
        $quantitaPdt = $_POST['quantita_pdt']; //immagine
        $immaginePdt = $_FILES['immagine']['name']; //nome del file dell'immagine
        $immagineTemp = $_FILES['immagine']['tmp_name']; //immagine temporanea

        //caricamento effettivo dell'immagine
        move_uploaded_file($immagineTemp, IMG_UPLOADS . DS . $immaginePdt);

        //query
        $nuovoPdt = query("INSERT INTO prodotti (nome_pdt , cat_pdt , info_dettagliate , descr_breve , prezzo , quantita_pdt , immagine) VALUES ('{$nomePdt}' , '{$catPdt}' , '{$dettagli}' , '{$infoBreve}' , '{$prezzo}' , '{$quantitaPdt}' , '{$immaginePdt}')");

        conferma($nuovoPdt);
        creaAvviso('hai aggiunto correttamente un prodotto');
        header('Location:index.php?prodotti-admin');
    }
}
//funzione per mostrare le categorie nel lato amministrativo (categorie-admin.php)
function categorie_admin()
{
    $catMostra = query("SELECT * FROM categorie");
    conferma($catMostra);

    while ($row = fetch_array($catMostra)) {
        $catId = $row['id_cat'];
        $catTitolo = $row['nome_cat'];
        $cat_admin = <<<STRINGA
        <tr>
            <td>{$catId}</td>
            <td>{$catTitolo} </td><br>
            <td><a class="btn btn-danger" href="../../risorse/templates/back/cancella-cat.php?id={$row['id_cat']}" role="button">Cancella</a> </td>
        </tr>
        STRINGA;
        echo $cat_admin;
    }
}
//crea una funzione per aggiungere nuove categorie (categorie-adimn.php)
function aggiungi_cat_admin()
{
    if (isset($_POST['aggiungi_cat'])) {
        $nomeCat = $_POST['cat_nome'];
        //verificare
        $didascaliaCat = $_POST['didascalia_cat'];
        if (empty($nomeCat) || $nomeCat == "") {
            echo 'Questo campo non può essere vuoto';
        } else {

            $nuovaCat = query("INSERT INTO categorie (nome_cat, didascalia) VALUES('{$nomeCat}', '{$didascaliaCat}')");
            conferma($nuovaCat);
            creaAvviso('hai aggiunto una categoria');
        }
    }
}
//crea una funzione per mostrare e cancellare gli ordini nel lato amministrativo (ordini.php)
function ordini()
{
    $ordiniMostra = query("SELECT * FROM ordini");
    conferma($ordiniMostra);

    while ($row = fetch_array($ordiniMostra)) {
        $ordineId = $row['id_ordine'];
        $importoOrdine = $row['importo_ordine'];
        $numeroOrdine = $row['num_ordine'];
        $statusOrdine = $row['status_ordine'];
        $ordine_admin = <<<STRINGA
       <tr>
            <td>{$ordineId}</td>
            <td>€{$importoOrdine}</td>
            <td>{$numeroOrdine}</td>
            <td>{$statusOrdine}</td>
            <td><a class="btn btn-danger" href="../../risorse/templates/back/cancella-ordini.php?id={$row['id_ordine']}" role="button">Cancella</a> </td>
        </tr>
STRINGA;
        echo $ordine_admin;
    }
}
//crea una funzione per mostrare e cancellare i rapporti nel lato amministrativo (rapporti.php)
function rapporti()
{
    $rapportiMostra = query("SELECT * FROM rapporti");
    conferma($rapportiMostra);

    while ($row = fetch_array($rapportiMostra)) {

        $rapportoId = $row['id_rapporto'];
        $idProdotto = $row['id_pdt'];
        $idOrdine = $row['id_ordine'];
        $nomeProdotto = $row['nome_pdt'];
        $prezzoOrdine = $row['prezzo'];
        $quantita = $row['quantita_pdt'];
        $statusOrdine = $row['status_ordine'];

        $rapporti_admin = <<<STRINGA
        <tr>
            <td>{$rapportoId}</td>
            <td>{$idProdotto} </td>
            <td>{$idOrdine}</td>
            <td>{$nomeProdotto}</td>
            <td>{$prezzoOrdine}</td>
            <td>{$quantita}</td>
            <td>{$statusOrdine}</td>
            <td><a class="btn btn-danger" href="../../risorse/templates/back/cancella-rapporti.php?id={$row['id_rapporto']}" role="button">Cancella</a> </td>
        </tr>
        STRINGA;
        echo $rapporti_admin;
    }
}
function clienti()
{
    $clientiMostra = query("SELECT * FROM utenti WHERE ruolo = 'utente'");
    conferma($clientiMostra);

    while ($row = fetch_array($clientiMostra)) {
        $utenteId = $row['id_utente'];
        $username = $row['username'];
        $firstname = $row['firstname'];
        $surname = $row['surname'];
        $datanasc = $row['datanasc'];
        $via = $row['via'];
        $numciv = $row['numciv'];
        $cap = $row['cap'];
        $citta = $row['citta'];
        $regione = $row['regione'];

        $clienti_admin = <<<STRINGA
       <tr>
            <td>{$utenteId}</td>
            <td>{$username}</td>
            <td>{$firstname}</td>
            <td>{$surname}</td>
            <td>{$datanasc}</td>
            <td>{$via}</td>
            <td>{$numciv}</td>
            <td>{$cap}</td>
            <td>{$citta}</td>
            <td>{$regione}</td>
            </tr>
STRINGA;
        echo $clienti_admin;
    }
}

//area utente
function miei_ordini()
{
    $id_logged = $_SESSION['id_utente'];
    $ordiniMostra = query("SELECT * FROM ordini WHERE id_utente = $id_logged");
    conferma($ordiniMostra);

    while ($row = fetch_array($ordiniMostra)) {
        $ordineId = $row['id_ordine'];
        $importoOrdine = $row['importo_ordine'];
        $statusOrdine = $row['status_ordine'];
        $numeroOrdine = $row['num_ordine'];
        $curOrdine = $row['cur_ordine'];

        $cancellaButton = "";
        if ($curOrdine == "procedura") {
            $cancellaButton = '<a class="btn btn-danger" href="../risorse/templates/front/cancella-ordini.php?id=' . $ordineId . '" role="button">Cancella</a>';
        }

        $ordine_admin = <<<STRINGA
       <tr>
            <td>{$ordineId}</td>
            <td>€{$importoOrdine}</td>
            <td>{$numeroOrdine}</td>
            <td>{$statusOrdine}</td>
            <td>{$cancellaButton}</td>
        </tr>
STRINGA;
        echo $ordine_admin;
    }
}

function aggiornaCliente()
{
    
    if (isset($_POST['aggiorna'])) {

        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $datanasc = $_POST['datanasc'];
        $via = $_POST['via'];
        $numciv = $_POST['numciv'];
        $cap = $_POST['cap'];
        $citta = $_POST['citta'];
        $regione = $_POST['regione'];
        $password = $_POST['password'];

        $update = query("UPDATE utenti SET username = '{$username}', firstname = '{$firstname}', surname = '{$surname}', datanasc = '{$datanasc}', via = '{$via}', numciv = '{$numciv}', cap = '{$cap}', citta = '{$citta}', regione = '{$regione}', password = '{$password}' WHERE id_utente = {$_SESSION['id_utente']}");

        conferma($update);
        creaAvviso('hai modificato correttamente un prodotto');
        header('Location: areariservata.php?profilo');
    }
}