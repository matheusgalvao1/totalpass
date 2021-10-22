<?php
    if(!isset($_SESSION) || $_SESSION['logado'] == false){
        header('Location: /');
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
    <link rel="stylesheet" href="css/contaBox.css">
    <link rel="stylesheet" href="css/label.css">
</head>

<body class="container bg-dark">
    <div class="container" style="padding-top: 30px; padding-bottom: 30px;">
        <div class="row">
            <div class="col" style="margin-right: 250px; ">
                <?php
                require('contas.view.php');
                ?>
            </div>
            <div class="col">
                <?php
                require('contaNew.view.php');
                require('contaEdit.view.php');
                ?>
            </div>
        </div>
    </div>
</body>

</html>