<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Contas</title>
</head>

<body>
    <div class="col">
        <div class="input-group mb-3" style="width: 400px;">
            <input type="text" class="form-control" placeholder="Buscar Conta" aria-label="user" aria-describedby="button-addon2">
            <button class="btn btn-primary"><i class="fa fa-search"></i></button>
        </div>
        <button type="button" class="btn btn-link" style="margin-bottom: 20px; padding: 0px;">Ver todas as contas</button>
        <?php foreach ($items as $conta => $login) : ?>
            <form action="index.php" method="POST">
                <input type="hidden" name="selected" value=$conta>
                <button type="button" class="btn btn-primary" style="width: 400px; margin-bottom: 5px; font-size: 20px"><?php echo $conta; ?></button>
            </form>
        <?php endforeach ?>
    </div>
</body>

</html>