<?php
session_start();

if (isset($_GET['email']) && isset($_GET['conteudo']) && isset($_GET['jogo']) 
        && !empty(trim($_GET['email'])) && !empty(trim($_GET['conteudo'])) && !empty(trim($_GET['jogo']))) {

    require '../../database/banco.php';

    $email = str_replace('%40', '@', $_GET['email']);
    $conteudo = $_GET['conteudo'];
    $jogo = $_GET['jogo'];

    $verificar = $conn->prepare('SELECT * FROM tabcomentarios WHERE comentarioConta = :email AND conteudo = :conteudo AND jogoComentado = :jogo');
    $verificar->bindValue(':email', $email);
    $verificar->bindValue(':conteudo', $conteudo);
    $verificar->bindValue(':jogo', $jogo);
    $verificar->execute();

    if ($verificar->rowCount() > 0) {
        header("Location: ../index.php?erro=1");
        exit();
    } else {
        $sql = 'INSERT INTO tabcomentarios (conteudo, jogoComentado, comentarioConta) VALUES (:conteudo, :jogo, :email)';
        $inserir = $conn->prepare($sql);
        $inserir->bindValue(':conteudo', $conteudo);
        $inserir->bindValue(':jogo', $jogo);
        $inserir->bindValue(':email', $email);
        $inserir->execute();

        if($inserir){
            header("Location: ../acoesJogos/teste.php?nomeJogo=$jogo");
            exit();
        }
    }
} else {
    header("Location: ../teste.php?erro=2");
    exit();
}
?>
