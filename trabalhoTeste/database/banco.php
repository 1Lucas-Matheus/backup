<?php
$hospedagem = "localhost";
$nome = "root";
$senha = "";

try {
    $conn = new PDO("mysql:host=$hospedagem;dbname=novosistema", $nome, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro! seu erro foi: " . $e->getMessage();
}
