<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../CSS/login.css">
</head>

<body>

    <div class="d-flex justify-content-center align-items-center col-12 col-md-4 p-4 rounded-4" id="centralizar">
        <form action="../validacao/validarCriarConta.php" method="post" class="col-12 m-3" id="loginForm">
            <div class="d-flex justify-content-center align-items-center col-12 mb-4">
                <img src="../../Images/logoMarca.png" id="logo">
            </div>
            <?php
            if (isset($_GET['erro'])) {
                $erro = $_GET['erro'];

                switch ($erro) {
                    case 1:
                        $mensagemErro = "Email já existente! Tente novamente com outro email";
                        break;
                    case 2:
                        $mensagemErro = "Por favor, preencha todos os campos.";
                        break;
                    default:
                        $mensagemErro = "Erro desconhecido.";
                        break;
                }

                echo '<div class="alert alert-danger" role="alert">' . $mensagemErro . '</div>';
            }
            ?>
            <div class="form-floating mb-3 col-12">
                <input type="text" class="form-control" id="inputNome" placeholder="nome" name="nome" required>
                <label for="inputNome">Nome de usuario <span class="text-secondary">(Obrigatorio)</span></label>
            </div>
            <div class="form-floating mb-3 col-12">
                <input type="email" class="form-control" id="inputEmail" placeholder="nome@gmail.com" name="email" required>
                <label for="inputEmail">Email <span class="text-secondary">(Obrigatorio)</span></label>
            </div>
            <div class="form-floating mb-3 col-12">
                <input type="password" class="form-control" id="inputSenha" placeholder="senha" name="senha" required>
                <label for="inputSenha">Senha <span class="text-secondary">(Obrigatorio)</span></label>
            </div>
            <div class="col-auto mb-3">
                <input type="submit" class="btn btn-outline-success fs-5 mb-3 col-12 p-2" name="enviar" value="Entrar" onclick="return validarForm()">
            </div>
            <div class="d-flex justify-content-center align-items-center mb-0">
                <label for="">Já tem uma conta? <a href="login.php" id="link">Entrar</a></label>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function validarForm() {
            var nome = document.getElementById('inputNome').value;
            var email = document.getElementById('inputEmail').value;
            var senha = document.getElementById('inputSenha').value;

            if (nome.trim() === '') {
                alert('Por favor, insira seu nome de usuario.');
                return false;
            }

            if (email.trim() === '') {
                alert('Por favor, insira seu email.');
                return false;
            }

            if (senha.trim() === '') {
                alert('Por favor, insira sua senha.');
                return false;
            }

            return true;
        }
    </script>
</body>

</html>
