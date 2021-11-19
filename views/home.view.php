<?php
if (!(session_status() === PHP_SESSION_ACTIVE))
    session_start();
if (empty($_SESSION['logado']) || $_SESSION['logado'] == false) {
    header('Location: /Login');
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/buttons.css">
    <link rel="stylesheet" href="css/contaBox.css">
    <link rel="stylesheet" href="css/label.css">
</head>
<?php
require('nav.view.php');
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['tituloPop'])) {
?>
    <script>
        swal({
            title: "<?= $_SESSION['tituloPop'] ?>",
            text: "<?= $_SESSION['textPop'] ?>",
            icon: "<?= $_SESSION['icon'] ?>",
        })
    </script>
<?php
    unset($_SESSION['tituloPop']);
    unset($_SESSION['textPop']);
    unset($_SESSION['icon']);
}
?>

<script type="text/javascript">
    // function gerarSenha() {
    //     var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    //     var passwordLength = 15;
    //     var password = "";
    //     for (var i = 0; i <= passwordLength; i++) {
    //         var randomNumber = Math.floor(Math.random() * chars.length);
    //         password += chars.substring(randomNumber, randomNumber + 1);
    //     }
    //     return password;
    // }

    function change() {
        senha = $.ajax({type: "POST", url: "/gerarSenha", });
        document.getElementById("senha").value = senha;
    }

    function changeEdit() {
        senha = gerarSenha();
        document.getElementById("senhaEdit").value = senha;
    }
</script>

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