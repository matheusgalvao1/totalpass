<?php
$items = [
    'Facebook' => ['login' => 'abcde', 'senha' => 'senha123'],
    'Google' => ['login' => 'abcde', 'senha' => 'senha123'],
    'Microsoft' => ['login' => 'abcde', 'senha' => 'senha123'],
    'Github' => ['login' => 'abcde', 'senha' => 'senha123'],
    'Moodle' => ['login' => 'abcde', 'senha' => 'senha123'],
    'UTFPR' => ['login' => 'abcde', 'senha' => 'senha123'],
    'Instagram' => ['login' => 'fghij', 'senha' => 'pass345']
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        .body {
            padding-left: 25%;
            padding-right: 25%;
        }
    </style>
</head>

<h1>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Buscar Conta" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button type="button" class="btn btn-primary">Buscar</button>
    </div>
</h1>

<body class="body">

    
    <?php foreach ($items as $conta => $login) : ?>
        <button type="button" class="btn btn-primary"><?php echo $conta; ?></button>
    <?php endforeach ?>

</body>

</html>