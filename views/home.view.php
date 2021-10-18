<?php

$selected = 'Github'; //checarSelecionado();

function opcaoDeConta($atual)
{
    return $atual;
}

function checarSelecionado()
{
    if (!empty($_POST['selected'])) {
        $selected = $_POST['selected'];
        return $selected;
    }
    return '';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/buttons.css">
    <style>
        .contaBox {
            border-radius: 20px;
            border: 5px solid royalblue;
            padding: 20px;
            width: 500px;
        }
    </style>
</head>

<div class="container"  style="padding-top: 30px">
    <div class="row" >
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Buscar Conta" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button type="button" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-outline-primary">Adicionar Conta</button>
                </div>
            </div>
            <?php foreach ($items as $conta => $login) : ?>
                <form action="index.php" method="POST">
                    <input type="hidden" name="selected" value="<?= opcaoDeConta($conta) ?>">
                    <button type="button" class="btn btn-primary" style="width: 300px; margin: 5px; font-size: 20px"><?php echo $conta; ?></button>
                </form>
            <?php endforeach ?>
        </div>

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

    </div>
</div>







</html>