<?php
session_start();

if (
    isset($_GET['novoNomeJogo']) && isset($_GET['nomeJogo']) && isset($_GET['descricao']) && isset($_GET['opcao']) &&
    !empty(trim($_GET['novoNomeJogo'])) && !empty(trim($_GET['nomeJogo'])) && !empty(trim($_GET['descricao'])) && !empty(trim($_GET['opcao']))
) {

    require '../../database/banco.php';

    $novoNomeJogo = $_GET['novoNomeJogo'];
    $nomeJogo = $_GET['nomeJogo'];
    $descricao = $_GET['descricao'];
    $categoria = $_GET['opcao'];

    $verificar = $conn->prepare('SELECT * FROM jogos WHERE nomeJogo = :nomeJogo');
    $verificar->bindValue(':nomeJogo', $nomeJogo);
    $verificar->execute();

    if ($verificar->rowCount() == 1) {
        $update = "UPDATE jogos SET nomeJogo = :novoNomeJogo, descricao = :descricao, jogoCategoria = :jogoCategoria WHERE jogos.nomeJogo = :nomeJogo";
        $atualizar = $conn->prepare($update);
        $atualizar->bindValue(':novoNomeJogo', $novoNomeJogo);
        $atualizar->bindValue(':descricao', $descricao);
        $atualizar->bindValue(':jogoCategoria', $categoria);
        $atualizar->bindValue(':nomeJogo', $nomeJogo);
        $atualizar->execute();

        echo 'tudo certo';
        header("Location: ../index/index.php?sucesso=4");
        exit();
    } else {
        echo 'não encontrado';
        header('Location: ../index/index.php?erro=6');
        exit();
    }
} else {
    echo 'não recebi';
    header("Location: ../index.php?erro=5");
    exit();
}
