<?php
require_once('functions.php');
index();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
    <div class="row">
        <div class="col-sm-3">
            <h2>Favoritos</h2>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input id="busca" type="text" class="form-control" placeholder="Pesquisar">
            </div>
        </div>
        <div class="col-sm-3 text-right h2">
            <a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Novo Favorito</a>
            <a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
        </div>
    </div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
    <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo $_SESSION['message']; ?>
    </div>
    <?php clear_messages(); ?>
<?php endif; ?>

<hr>

<table class="table table-hover" id="lista">
    <thead>
        <tr>
            <!--<th>ID</th>-->
            <th class="col-md-3">Nome</th>
            <th class="col-md-4">Link</th>
            <th class="col-md-2">Atualização</th>
            <th class="col-md-3"></th>
        </tr>
    </thead>
    <tbody>
        <?php if ($favoritos) : ?>
            <?php foreach ($favoritos as $favorito) : ?>
                <tr>
                    <!--<td><?php echo $favorito['id']; ?></td>-->
                    <td class="col-md-3"><?php echo $favorito['nome']; ?></td>
                    <td class="col-md-5"><?php echo $favorito['link']; ?></td>
                    <td class="col-md-2"><?php echo $favorito['modified']; ?></td>
                    <td class="col-md-2 actions text-right">
                            <!--<a href="view.php?id=<?php echo $favorito['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>-->
                        <a href="<?php echo $favorito['link']; ?>" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-sign-in fa-2x"></i></a>
                        <a href="edit.php?id=<?php echo $favorito['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil fa-2x"></i></a>
                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-favorito="<?php echo $favorito['id']; ?>">
                            <i class="fa fa-times fa-2x"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6">Nenhum registro encontrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php include('modal.php'); ?>

<?php include(FOOTER_TEMPLATE); ?>