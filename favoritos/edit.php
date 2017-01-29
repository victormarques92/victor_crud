<?php
require_once('functions.php');
edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Favorito</h2>

<form action="edit.php?id=<?php echo $favorito['id']; ?>" method="post">
    <hr />
    <div class="row">
        <div class="form-group col-md-7">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="favorito['nome']" value="<?php echo $favorito['nome']; ?>">
        </div>

        <div class="form-group col-md-3">
            <label for="campo2">Link</label>
            <input type="text" class="form-control" name="favorito['link']" value="<?php echo $favorito['link']; ?>">
        </div>
    </div>
    
    
    <div id="actions" class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php" class="btn btn-default">Cancelar</a>
        </div>
    </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>