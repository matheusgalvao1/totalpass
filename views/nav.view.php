<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TotalPass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/buttons.css">
</head>

<body style='background-color: #333'>
    <ul class="nav justify-content-center">
        <li class="nav-item" style="margin: 15px;">
            <a class="nav-link" href="/novoToken" style="color: white; font-size: 20px"><i class="fa fa-refresh" style="margin-right: 5px; color: white"></i>Token: <?= $token ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/Home">
                <img src="./assets/logoWhite.svg" style="height: 50px; margin-right: 5px">
            </a>
        </li>
        <li class="nav-item" style="margin: 15px;">
            <a class="nav-link" href="/MeusDados" style="color: white; font-size: 20px"><i class="fa fa-user" style="margin-right: 5px; color: white"></i>Meus Dados</a>
        </li>
        <li class="nav-item" style="margin: 15px">
            <a class="nav-link" href="logout.php" style="color: white; font-size: 20px;"><i class="fa fa-sign-out" style="margin-right: 5px; color: white"></i>Sair</a>
        </li>
    </ul>
</body>

</html>