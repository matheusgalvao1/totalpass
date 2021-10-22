
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Contas</title>
</head>


<form action="index.php?acao=contas" method="GET">
    <div class="input-group mb-3" style="width: 400px;">
        <input type="text" class="form-control" placeholder="Buscar Conta" id="buscar" name="busca">
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    </div>
</form>

<form action="index.php?acao=contas" method="GET">
    <input type="hidden" name="busca" value="semBusca">
    <button type="submit" class="btn btn-outline-light" style="margin-bottom: 20px"><i class="fa fa-refresh" style="padding-right: 10px"></i>Recarregar todas as contas</button>
</form>

<?php if ($items != ''): ?>
    <?php if ($busca != 'semBusca') :  // caso uma busca tenha sido feita 
    ?>
        <?php if (isset($items[$busca])) : // caso a busca encontre 
        ?>
            <form action="index.php?acao=contas" method="POST">
                <input type="hidden" name="selected" value=<?php echo $busca?>>
                <button type="submit" class="btn btn-primary" style="width: 400px; margin-bottom: 5px; font-size: 20px"><?php echo $busca; ?></button>
            </form>
        <?php else : // caso a busca nao encontre  
        ?>
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
            </svg>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    Conta não encontrada
                </div>
            </div>
        <?php endif ?>
    <?php else : // caso nao haja busca 
    ?>
        <?php foreach ($items as $conta => $login) : ?>
            <form action="index.php?acao=contas" method="POST">
                <input type="hidden" name="selected" value=<?php echo $conta ?>>
                <button type="submit" class="btn btn-primary" style="width: 400px; margin-bottom: 5px; font-size: 20px"><?php echo $conta; ?></button>
            </form>
        <?php endforeach ?>
    <?php endif ?>
<?php endif ?>

</html>