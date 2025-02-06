<?php
if (isset($_SESSION['id_utente'])) {
    //selezione dei dati dalla tabella
    $query = query("SELECT * FROM utenti WHERE id_utente = {$_SESSION['id_utente']} ");
    while ($row = fetch_array($query)) {

        $username = $row['username'];
        $firstname = $row['firstname'];
        $lastname = $row['surname'];
        $datanasc = $row['datanasc'];
        $via = $row['via'];
        $numciv = $row['numciv'];
        $cap = $row['cap'];
        $citta = $row['citta'];
        $regione = $row['regione'];
        $password = $row['password'];
    }
    //aggiornamento dei dati
    aggiornaCliente();
    mostraAvviso();
}

?>
<div class="container">
    <div>
        <h3 class="page-header">Personalizza e gestisci i tuoi prodotti con facilità</h3>
    </div>
<!-- form -->
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row profiloCenter">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="nome">Nome Utente:</label>

                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>"disabled>
                </div>
                <div class="form-group">
                    <label for="nome">Nome:</label>

                    <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>">
                </div>
                <div class="form-group">
                    <label for="nome">Cognome:</label>

                    <input type="text" name="surname" class="form-control" value="<?php echo $lastname; ?>">
                </div>

                <div class="form-group">
                    <label for="nome">Data di nascita:</label>

                    <input type="date" name="datanasc" class="form-control" value="<?php echo $datanasc; ?>">
                </div>
                <div class="form-group">
                    <label for="nome">Via:</label>

                    <input type="text" name="via" class="form-control" value="<?php echo $via; ?>">
                </div>
                <div class="form-group">
                    <label for="nome">Numero civico:</label>

                    <input type="text" name="numciv" class="form-control" value="<?php echo $numciv; ?>">
                </div>
                <div class="form-group">
                    <label for="nome">CAP:</label>

                    <input type="text" name="cap" class="form-control" value="<?php echo $cap; ?>">
                </div>
                <div class="form-group">
                    <label for="nome">Città:</label>

                    <input type="text" name="citta" class="form-control" value="<?php echo $citta; ?>">
                </div>
                <div class="form-group">
                    <label for="nome">Regione:</label>

                    <input type="text" name="regione" class="form-control" value="<?php echo $regione; ?>">
                </div>
                <div class="form-group">
                    <label for="nome">Password:</label>

                    <input type="password" name="password" class="form-control" value="password">
                </div>
                <!-- pulsante aggiorna -->
                <div class="form-group">
                    <input type="submit" name="aggiorna" class="btn btn-success btn-lg aggiorna" value="Aggiorna">
                </div>
            </div><!--fim col-8-->
        </div>
        <div class="space"></div>
    </form>
