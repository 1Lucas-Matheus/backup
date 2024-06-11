<?php
session_start();

if (isset($_GET['nomeJogo'])) {
    require '../../database/banco.php';

    $nomeJogo = $_GET['nomeJogo'];

    $verificarExistencia = $conn->prepare('SELECT * FROM jogos WHERE nomeJogo = :nomeJogo');
    $verificarExistencia->bindValue(':nomeJogo', $nomeJogo);
    $verificarExistencia->execute();

    if ($verificarExistencia->rowCount() > 0) {
        $verificaComents = $conn->prepare('SELECT * FROM tabcomentarios WHERE jogoComentado = :jogoComentado');
        $verificaComents->bindValue(':jogoComentado', $nomeJogo);
        $verificaComents->execute();

        if ($verificaComents->rowCount() > 0) {
            $deleteComments = $conn->prepare('DELETE FROM tabcomentarios WHERE jogoComentado = :jogoComentado');
            $deleteComments->bindValue(':jogoComentado', $nomeJogo);
            $deleteComments->execute();
        }

        // Deleta o jogo
        $deleteJogo = $conn->prepare('DELETE FROM jogos WHERE nomeJogo = :nomeJogo');
        $deleteJogo->bindValue(':nomeJogo', $nomeJogo);
        $deleteJogo->execute();

        header('Location: ../index/index.php?sucesso=2');
    } else {
        header('Location: ../index/index.php?erro=6');
    }
} else {
    header('Location: ../index/index.php?erro=7');
}
