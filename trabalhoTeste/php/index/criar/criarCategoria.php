<?php
session_start();

if (isset($_GET['nomeCategoria'])) {
    require '../../../database/banco.php';

    $nomeCategoria = $_GET['nomeCategoria'];

    $verificar = $conn->prepare('SELECT * FROM categoria WHERE nomeCategoria = :nomeCategoria');
    $verificar->bindValue(':nomeCategoria', $nomeCategoria);
    $verificar->execute();

    if ($verificar->rowCount() == 1) {
        header("Location: ../index.php?erro=1");
        exit();
    } else {
        $sql = 'INSERT INTO categoria (nomeCategoria) VALUES (:nomeCategoria)';
        $inserir = $conn->prepare($sql);
        $inserir->bindValue(':nomeCategoria', $nomeCategoria);
        $inserir->execute();

        $pegarId = $conn->prepare('SELECT idcategoria FROM categoria WHERE nomeCategoria = :nomeCategoria');
        $pegarId->bindValue(':nomeCategoria', $nomeCategoria);
        $pegarId->execute();
        $resultado = $pegarId->fetch(PDO::FETCH_ASSOC);
        $idCategoria = $resultado['idcategoria'];

        header("Location: ../index.php?sucesso=1");

        exit();
    }
} else {
    header("Location: ../index.php?erro=2");
    exit();
}
?>
