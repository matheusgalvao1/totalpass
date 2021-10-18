<?php

$selected = 'Github'; //checarSelecionado();

$new = false;

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

function setNew(bool $value)
{
    $new = $value;
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

<div class="container" style="padding-top: 30px">
    <div class="row">
        <?php
        require('controllers/contas.controller.php');
        if ($new)
            require('controllers/contaNew.controller.php');
        else if ($selected != '')
            require('controllers/contaEdit.controller.php');
        ?>
    </div>
</div>

</html>