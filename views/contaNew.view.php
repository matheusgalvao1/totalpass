<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Conta</title>
</head>


<div class="contaBox" style="border: 5px solid green;">
    <h1>
        <?php echo "<b>" . 'Nova Conta'  . "</b>" ?>
    </h1>
    <form action="index.php" method="POST">
        <div class="form-group">
            <label>Nome da conta</label>
            <input class="form-control" type="text" name="novoNome">
        </div>
        <div class="form-group">
            <label>Login</label>
            <input class="form-control" type="text" name="novoLogin">
        </div>
        <div class="form-group">
            <label>Senha</label>
            <input class="form-control" type="text" name="novaSenha">
        </div>
        <div class="row" style="padding-top: 15px">
            <div class="col">
                <button type="button" class="btn btn-danger" style="width: 210px">Cancelar</button>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success" style="width: 210px"><i class="fa fa-plus" style="padding-right: 20px"></i>Adicionar</button>
            </div>
        </div>
    </form>
</div>

<br>



</html>