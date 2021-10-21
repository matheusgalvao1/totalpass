<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Conta</title>
</head>


<?php if ($selected != '') : ?>
    <div class="contaBox">
        <h1>
            <?php echo "<b>" . $selected  . "</b>" ?>
        </h1>
        <form action="index.php?acao=contaEdit" method="POST">
            <div class="form-group">
                <label for="login">Login</label>
                <input class="form-control" type="text" name="editarLogin" value="<?= $items[$selected]['login'] ?>">
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input class="form-control" type="text" name="editarSenha" value="<?= $items[$selected]['senha'] ?>">
            </div>
            <div class="row" style="padding-top: 15px">
                <div class="col">
                    <form action="index.php?acao=contaEdit" method="POST">
                        <input type="hidden" name="excluir" value="excluir">
                        <button type="submit" class="btn btn-danger" style="width: 210px"><i class="fa fa-trash" style="margin-right: 20px"></i>Excluir</button>
                    </form>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-success" style="width: 210px"><i class="fa fa-check" style="padding-right: 20px"></i>Salvar</button>
                </div>
            </div>
        </form>
    </div>
<?php endif ?>



</html>