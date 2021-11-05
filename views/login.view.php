<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TotalPass</title>
    <link rel="stylesheet" href="/css/login.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div class="fundo">
        <div class="container login-container" style="padding-top: 5%">
            <div class="d-flex justify-content-center">
                <div class="col-md-6 login-form-2" style="border-radius: 20px;">
                    <h3><img src="./assets/logoWhite.svg" style="height: 70px;"></h3>
                    <h3>Login</h3>
                    <form action="/enviarLogin" method="POST">
                        <?php if ($erro != '') : ?>
                            <div style="color: red;">
                                <strong><?= $erro ?></strong>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email *" value="<?= $email ?>" name="inputEmail" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Senha *" value="<?= $senha ?>" name="inputSenha" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" name="enviarDados" />
                        </div>
                        <div class="form-group">
                            <a href="index.php?acao=cadastrar" class="ForgetPwd" value="Login">
                                <bolder style="font-size: 20px">Cadastrar</bolder>
                            </a>
                            <!-- <input type="submit" class="btnSubmit" value="Cadastrar" name="cadastrarUsuario"/> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>