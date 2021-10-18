<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contas</title>
</head>

<body>
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Buscar Conta" aria-label="user" aria-describedby="button-addon2">
                        <button type="button" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </div>
            <?php foreach ($items as $conta => $login) : ?>
                <form action="index.php" method="POST">
                    <input type="hidden" name="selected" value="<?= opcaoDeConta($conta) ?>">
                    <button type="button" class="btn btn-primary" style="width: 300px; margin: 5px; font-size: 20px"><?php echo $conta; ?></button>
                </form>
            <?php endforeach ?>
        </div>
</body>

</html>