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

$selected = 'Facebook'; //checarSelecionado();

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
        .padding1 {
            margin: auto;
            padding: 10px;
            text-align: center;
            width: 20%;
        }

        .padding2 {
            border-radius: 10px;
            border: 3px solid royalblue;
            margin: auto;
            padding: 10px;
            text-align: center;
            width: 20%;
        }

        .padding3 {
            border-radius: 10px;
            border: 3px solid royalblue;
            margin: auto;
            padding: 10px;
            width: 20%;
            display: block;
        }

        .conta {
            clear: both;
            float: left;
        }
    </style>
</head>

<h1>
    <div class="padding1">
        <button type="button" class="btn btn-outline-primary">Adicionar Conta</button>
        <h4>
            ou
        </h4>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Buscar Conta" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button type="button" class="btn btn-primary">Buscar</button>
        </div>
    </div>
</h1>

<h3>
    <?php if ($selected != '') : ?>
        <div class="padding3">
            <p><?php echo "<b>" . $selected  . "</b>" ?></p>
            <ul>
                <li><?php echo "<b>" . 'Login:  ' . "</b>" . $items[$selected]['login']; ?></li>
                <li><?php echo "<b>" . 'Senha:  ' . "</b>" . $items[$selected]['senha']; ?></li>
            </ul>
        </div>
    <?php endif ?>
</h3>

<h2>
    <div class="padding2">
        <h3>
            Contas:
        </h3>
        <?php foreach ($items as $conta => $login) : ?>
            <form action="index.php" method="POST">
                <input type="hidden" name="selected" value="<?= opcaoDeConta($conta) ?>">
                <button type="button" class="btn btn-primary" method><?php echo $conta; ?></button>
            </form>
        <?php endforeach ?>
    </div>
</h2>


</html>