<?php
    if(!isset($_SESSION) || $_SESSION['logado'] == false){
        header('Location: /');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Conta</title>
</head>

<div class="contaBox" style="border: 5px solid green;">
    <h1 style="color: white">
        <?php echo "<b>" . 'Nova Conta'  . "</b>" ?>
    </h1>
    <?php if ($erroAdd != '') : ?>
        <div style="color: red;">
            <strong><?= $erroAdd ?></strong>
        </div>
    <?php endif; ?>

    <form action="/adicionarConta" method="POST">
        <div class="form-group">
            <label class="label">Nome da conta</label>
            <input class="form-control" type="text" name="novoNome" value="<?= $novoNome?>">
        </div>
        <div class="form-group">
            <label class="label">Login</label>
            <input class="form-control" type="text" name="novoLogin" value="<?= $novoLogin?>">
        </div>
        <label class="label">Senha</label>
        <div class="input-group mb-3">
            <input class="form-control" type="text" name="novaSenha" id="senha" value="<?= $novaSenha?>">
            <button type="button" class="btn btn-primary" style="margin: 0px" onclick="change()">Gerar Aleatória</button>
        </div>
        <button name="enviarNova" type="submit" class="btn btn-success btn-lg" style="font-size:25px; font-weight: bold;"><i class="fa fa-plus" style="padding-right: 20px"></i>Adicionar</button>
    </form>

</div>

<br>



</html>