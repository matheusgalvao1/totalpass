<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Conta</title>
</head>


<?php if ($contaSelecionada != '') : ?>
    <div class="contaBox">
        <h1 style="color: white">
            <?php echo "<b>" . $contaSelecionada->nome  . "</b>" ?>
        </h1>
        <form action="/editarConta" method="POST">
            <p style="color:red; padding:0px; margin:0px;"><?= $erroEditar ?></p>
            <div class="form-group">
                <label for="login" class="label">Login</label>
                <input class="form-control" type="text" name="editarLogin" value="<?= $contaSelecionada->login ?>">
            </div>
            <label for="senha" class="label">Senha</label>
            <div class="input-group mb-3">
                <input class="form-control" type="text" name="editarSenha" id="senhaEdit" value="<?= $contaSelecionada->senha ?>">
                <button type="button" class="btn btn-primary" style="margin: 0px" onclick="changeEdit()">Gerar Aleatória</button>
            </div>
            <div class="col" style="padding-top: 15px">
                <button name ="enviarEdit" type="submit" class="btn btn-success" style="width: 210px; font-size: 20px"><i class="fa fa-check" style="padding-right: 20px"></i>Salvar</button>
            </div>
        </form>
        <form action="/excluirConta" method="POST" style="padding-top: 15px">
            <input type="hidden" name="excluir" value="excluir">
            <button type="submit" class="btn btn-danger" style="width: 210px; font-size: 20px"><i class="fa fa-trash" style="margin-right: 20px"></i>Excluir</button>
        </form>
    </div>
<?php endif ?>



</html>