<?php require_once("../risorse/config.php"); 

//blocco di codice per aggiungere prodotti al carrello
if (isset($_GET['add'])) {

    $controllaQuantita = query("SELECT * FROM prodotti WHERE id_pdt= {$_GET['add']}");
    conferma($controllaQuantita);

    while ($row = fetch_array($controllaQuantita)) {

        //controlla la quantità del prodotto (se disponibile)
        if ($row['quantita_pdt'] != $_SESSION['prodotto_' . $_GET['add']]) {

            //apro una sessione per il prodotto che si va ad aggiungere al carrello
            $_SESSION['prodotto_' . $_GET['add']] += 1;
            header('Location: checkout.php');
        } else {
            creaAvviso("Spiacenti, avevamo solo " .  $row['quantita_pdt'] . " " .  $row['nome_pdt'] . " ancora disponibili");
            header('Location: checkout.php');
        }
    }
}

//funzione per rimuovere prodotti dal carrello
if (isset($_GET['remove'])) {

    //invoco la sessione del prodotto a cui applico il decremento
    $_SESSION['prodotto_' . $_GET['remove']] -= 1;

    //unset resetta i valori dalla sessione
    unset($_SESSION['totale']); //tot. importo (prezzo) carrello
    unset($_SESSION['quantita_art']); //tot. nr. articoli nel carrello
    header('Location:checkout.php');
}

//funzione per eliminare prodotti dal carrello
if (isset($_GET['delete'])) {

    $_SESSION['prodotto_' . $_GET['delete']] = 0;
    unset($_SESSION['totale']); //tot. importo (prezzo) carrello
    unset($_SESSION['quantita_art']); //tot. nr. articoli nel carrello
    header('Location:checkout.php');
}


function carrello(){
    //il carrello inizia da 0
    $totaleOrdine = 0; //importo iniziale dell'ordine 
    $totArticoli = 0; //quantità tot. iniziale degli articoli nel carrello

    //Variabili fornite da PayPal
    $item_name = 1;
    $item_number = 1;
    $amount = 1;
    $quantity = 1;
    $importo = 0;

    /*uso un foreach per isolare parti dell'elemento che voglio utilizzare
    per estrapolare il value dal name, ossia per prendere il numero di prodotto
    escludendo la parola prodotto*/
    foreach ($_SESSION as $name => $value) {
        if ($value > 0) {
            //substring estrae un valore compreso nell'intervallo
            if (substr($name, 0, 9) == 'prodotto_') {//prodotto_32

                //misuro la lunghezza della stringa
                $lungStringa = strlen($name);

                //estrazione della sottostringa
                $id = substr($name, 9, $lungStringa);

                $prodotti = query("SELECT * FROM prodotti WHERE id_pdt = {$id}");
                conferma($prodotti);

                while ($row = fetch_array($prodotti)) {
                    $importo = $row['prezzo'] * $value; //prezzo unit. * quantità pdt
                    $totArticoli += $value;

                    $prodottoCarrello = <<<STRINGA
 <tr>
 <td>{$row['nome_pdt']}</td>
 <td>{$row['prezzo']}</td>
 <td>$value</td>
 <td>$importo</td>

 <td><a class="btn btn-success" href="carrello.php?add={$row['id_pdt']}" role="button">Aggiungi</a></td>
 <td><a class="btn btn-warning" href="carrello.php?remove={$row['id_pdt']}" role="button">Rimuovi</a></td>
 <td><a class="btn btn-danger" href="carrello.php?delete={$row['id_pdt']}" role="button">Cancella</a> </td>
</tr> 

<input type="hidden" name="item_name_{$item_name}" value="{$row['nome_pdt']}">
<input type="hidden" name="item_number_{$item_number}" value="{$row['id_pdt']}">
<input type="hidden" name="amount_{$amount}" value="{$row['prezzo']}">
<input type="hidden" name="quantity_{$quantity}" value="{$value}">

STRINGA;
                    echo $prodottoCarrello;
                    //incremento delle variabili di Paypal
                    $item_name++;
                    $item_number++;
                    $amount++;
                    $quantity++;
                }
                //apro una sessione per il totale ordini
                $_SESSION['totale'] = $totaleOrdine += $importo;

                //apro una sessione per il totale quantità  articoli
                $_SESSION['quantita_art'] = $totArticoli;
            }
        }
    }
}

//gestione pagamenti con paypal
function transazioni(){
    if (isset($_GET['tx'])) {

        //variabili paypal
        $prezzo = $_GET['amt'];//importo
        $valuta = $_GET['cc'];//valuta
        $transazione = $_GET['tx'];//transazione
        $stato = $_GET['st'];//stato transazione
        
        $totaleOrdine = 0;
        $totArticoli = 0;

        foreach ($_SESSION as $name => $value) {
            if ($value > 0) {
                if (substr($name, 0, 9) == 'prodotto_') {

                    $lungStringa = strlen($name - 9);
                    $id = substr($name, 9, $lungStringa);

                    //inserimento dati nella tabella ORDINI
                    $invioOrdine = query("INSERT INTO ordini (importo_ordine , num_ordine , status_ordine , cur_ordine) VALUES ('{$prezzo}' ,  '{$transazione}' , '{$stato}' , '{$valuta}' ) ");
                    $lastId = idUltimo();
                    conferma($invioOrdine);

                    $prodotti = query("SELECT * FROM prodotti WHERE id_pdt = {$id}");
                    conferma($prodotti);

                    while ($row = fetch_array($prodotti)) {
                        $prezzo_pdt = $row['prezzo'];
                        $nome_pdt = $row['nome_pdt'];
                        $importo = $row['prezzo'] * $value;
                        $totArticoli += $value;

                        ////inserimento dati nella tabella RAPPORTI
                        $invioRapporto = query("INSERT INTO rapporti (id_pdt , id_ordine , nome_pdt , prezzo, quantita_pdt) VALUES ('{$id}' ,  '{$lastId}' , '{$nome_pdt}' , '{$prezzo_pdt}' ,  '{$value}') ");
                        conferma($invioRapporto);
                    }
                    $totaleOrdine += $importo;
                    echo $totArticoli;
                }
            }
        }
        session_destroy();
    } else {
        header('Location:index.php');
    }
}