<?php
    $erro = '';
    session_start();
    if (!empty($_POST['enviarDados'])){
        $email = $_POST['inputEmail'];
        $senha = $_POST['inputSenha'];

        if (!filter_input(INPUT_POST, 'inputEmail', FILTER_VALIDATE_EMAIL)){
            $erro = "O Email inserido não é válido!";
        }else{
            if ($email == "admin@email.com" && $senha == "admin"){
                $_SESSION['logado'] = true;
                $_SESSION['email'] = "Mairo";

                header("Location: ./controllers/home.controller.php");
            } else{
                $erro = "Email ou senha inválida";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TotalPass</title>
    <link rel="stylesheet" href="./css/login.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <div class="fundo">
        <div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-2">
                    <h3>Acesso ao TotalPass</h3>
                    <form action = "index.php" method="POST">
                        <?php if($erro != ''): ?>
                            <div style = "color: red;">
                                <strong><?= $erro ?></strong>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Seu email *" value="" name="inputEmail"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Sua senha *" value="" name="inputSenha" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" name="enviarDados"/>
                        </div>
                        <div class="form-group">
                            <a href="#" class="ForgetPwd" value="Login">Ainda sem conta? <strong>Cadastrar</strong></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>