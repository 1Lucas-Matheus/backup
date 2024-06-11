<?php
session_start();

if (!isset($_SESSION['usuario'])) {
  header("Location: ../login/login.php");
  exit();
} else {
  $usuario = $_SESSION['usuario'];

  $nome = $usuario['nome'];
  $email = $usuario['email'];
  $idPatamar = $usuario['idPatamar'];

  require 'partes/header.php';

  require 'partes/conteudo.php';

  require 'partes/footer.php';
}
