<?php aggiungi_cat_admin(); ?>

<div class="row">
    <div class="col-md-12">
        <h1 class="display-5"> Gestisci le categorie</h1>
        <h4 class="bg-success"><?php mostraAvviso(); ?></h4>
    </div>
</div>


<div class="row">
    <div class="col">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Cancella</th>

                </tr>
            </thead>
            <tbody>
                <?php categorie_admin(); ?>
            </tbody>
        </table>
        <div class="col-md-4">
            <form action="" method="post">

                <div class="form-group">
                    <label for="categoria">Crea una nuova categoria</label>
                    <input name="cat_nome" type="text" class="form-control">
                </div>
                <input name="aggiungi_cat" type="submit" class="btn btn-primary" value="Aggiungi">
        </div>
        </form>
    </div>
</div>
</div>