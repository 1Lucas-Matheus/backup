<?php
session_start();

if (isset($_POST['enviar'])) {
    if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) 
            && !empty(trim($_POST['nome'])) && !empty(trim($_POST['email'])) && !empty(trim($_POST['senha']))) {

        require '../../database/banco.php';

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $quantCom = 0;
        $idPatamar = 1;

        $verificarEmail = $conn->prepare('SELECT * FROM contas WHERE email = :email');
        $verificarEmail->bindValue(':email', $email);
        $verificarEmail->execute();

        if ($verificarEmail->rowCount() == 1) {
            header("Location: ../login/criarConta.php?erro=1");
            exit();
        } else {
            $sql = 'INSERT INTO contas (nome, email, senha, quantCom, idPatamar) VALUES (:nome, :email, :senha, :quantCom, :idPatamar)';
            $inserir = $conn->prepare($sql);
            $inserir->bindValue(':nome', $nome);
            $inserir->bindValue(':email', $email);
            $inserir->bindValue(':senha', $senha);
            $inserir->bindValue(':quantCom', $quantCom);
            $inserir->bindValue(':idPatamar', $idPatamar);
            $inserir->execute();
            
            $_SESSION['usuario'] = [
                'nome' => $nome,
                'email' => $email,
                'senha' => $senha,
                'idPatamar' => $idPatamar
            ];

            header("Location: ../index/index.php");
            exit();
        }
    } else {
        header("Location: ../login/criarConta.php?erro=2");
        exit();
    }
}
?>
