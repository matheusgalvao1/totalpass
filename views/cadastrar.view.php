<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro TotalPass</title>
    <link rel="stylesheet" href="/css/cadastro.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <div class="fundo">
        <div class="container cad-container" style="padding-top: 5%">
            <div class="d-flex justify-content-center">
                <div class="col-md-6 cad-form-2" style="border-radius: 20px;">
                    <h3>Cadastrar Usuário</h3>
                    <form action = "/enviarCadastro" method="POST">
                        <div class="form-group">
                            <p class = "erro"><?= $erros['erroNome'] ?></p>
                            <input type="text" class="form-control" placeholder="Nome *" value="<?= $nome?>" name="inputNome"/>
                        </div>
                        <div class="form-group">
                            <p class = "erro"><?= $erros['erroSobrenome'] ?></p>
                            <input type="text" class="form-control" placeholder="Sobrenome *" value="<?= $sobrenome?>" name="inputSobrenome"/>
                        </div>
                        <div class="form-group">
                            <p class = "erro"><?= $erros['erroEmail'] ?></p>
                            <input type="email" class="form-control" placeholder="Email *" value="<?= $email?>" name="inputEmail"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Senha *" value="<?= $senha?>" name="inputSenha"/>
                        </div>
                        <div class="form-group">
                            <p class = "erro"><?= $erros['erroSenha'] ?></p>
                            <input type="password" class="form-control" placeholder="Repita a senha *" value="<?= $senha2?>" name="inputSenha2"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Cadastrar" name="enviarCadastro"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>