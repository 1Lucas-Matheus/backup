<?php
session_start();

if (
    isset($_GET['nomeJogo']) && isset($_GET['descricao']) && isset($_GET['opcao']) &&
    !empty(trim($_GET['nomeJogo'])) && !empty(trim($_GET['descricao'])) && !empty(trim($_GET['opcao']))
) {

    require '../../../database/banco.php';

    $nomeJogo = $_GET['nomeJogo'];
    $descricao = $_GET['descricao'];
    $categoria = $_GET['opcao'];

    $verificar = $conn->prepare('SELECT * FROM jogos WHERE nomeJogo = :nomeJogo');
    $verificar->bindValue(':nomeJogo', $nomeJogo);
    $verificar->execute();

    if ($verificar->rowCount() > 0) {
        header("Location: ../index.php?erro=3");
        exit();
    } else {
        $sql = 'INSERT INTO jogos (nomeJogo, descricao, jogoCategoria) VALUES (:nomeJogo, :descricao, :jogoCategoria)';
        $inserir = $conn->prepare($sql);
        $inserir->bindValue(':nomeJogo', $nomeJogo);
        $inserir->bindValue(':descricao', $descricao);
        $inserir->bindValue(':jogoCategoria', $categoria);
        $inserir->execute();

        $join = 'CREATE VIEW IF NOT EXISTS verJogo 
            AS SELECT c.nomeCategoria AS categoria, j.nomeJogo
            FROM jogos AS j
            JOIN categoria AS c ON j.jogoCategoria = c.idcategoria
            GROUP BY j.nomeJogo, j.jogoCategoria ORDER BY c.nomeCategoria, j.nomeJogo ASC';
        $conn->exec($join);

        $select = 'SELECT * FROM verJogo';
        $result = $conn->query($select);

        if ($result) {
            header("Location: ../index.php?sucesso=4");
        } else {
            header("Location: ../index.php?erro=4");
            exit();
        }
    }
} else {
    header("Location: ../index.php?erro=5");
    exit();
}
