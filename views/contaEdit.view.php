<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Conta</title>
</head>

<body>
    <div class="col">
        <?php if ($selected != '') : ?>
            <div class="contaBox">
                <h1>
                    <?php echo "<b>" . $selected  . "</b>" ?>
                </h1>
                <form action="index.php" method="POST">
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input class="form-control" type="text" value="<?= $items[$selected]['login'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input class="form-control" type="text" value="<?= $items[$selected]['senha'] ?>">
                    </div>
                    <div class="row" style="padding-top: 15px">
                        <div class="col">
                            <button type="button" class="btn btn-danger" style="width: 210px">Excluir</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-success" style="width: 210px">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        <?php endif ?>
    </div>
</body>

</html>