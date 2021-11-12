<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Contas</title>
</head>


<form action="/buscarConta" method="POST">
    <div class="input-group mb-3" style="width: 400px;">
        <input type="text" class="form-control" placeholder="Buscar Conta" id="buscar" name="busca" value=<?php echo $busca ?>>
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    </div>
</form>

<form action="/recarregarContas" method="GET">
    <input type="hidden">
    <button type="submit" class="btn btn-outline-light" style="margin-bottom: 20px"><i class="fa fa-refresh" style="padding-right: 10px"></i>Recarregar todas as contas</button>
</form>

<?php if ($contas): ?>
        <?php foreach ($contas as $conta) : ?>
            <form action="/selecionarConta/<?=$conta->idconta?>" method="POST">
                <input type="hidden" name="selected" value=<?php echo $conta->idconta ?>>
                <button type="submit" class="btn btn-primary" style="width: 400px; margin-bottom: 5px; font-size: 20px"><?php echo $conta->nome; ?></button>
            </form>
        <?php endforeach ?>
<?php endif ?>

</html>