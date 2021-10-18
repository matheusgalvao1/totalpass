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
            <div class="contaBox" style="border: 5px solid green;">
                <h1>
                    <?php echo "<b>" . 'Nova Conta'  . "</b>" ?>
                </h1>
                <form action="index.php" method="POST">
                    <div class="form-group">
                        <label for="senha">Nome da conta</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="row" style="padding-top: 15px">
                        <div class="col">
                            <button type="button" class="btn btn-danger" style="width: 210px">Cancelar</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-success" style="width: 210px">Adicionar</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
    <br>
    
</body>

</html>