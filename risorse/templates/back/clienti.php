<div class="row">
    <h3 class="mt-5">Tutti gli ordini</h3>
    <h4 class="bg-success">

        <?php mostraAvviso(); ?>
    </h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>nome user</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Data di Nascita</th>
                <th>Via</th>
                <th>Numero Civico</th>
                <th>CAP</th>
                <th>Città</th>
                <th>Regione</th>

            </tr>
        </thead>
        <tbody>
            <?php clienti(); ?>
        </tbody>
    </table>
</div>