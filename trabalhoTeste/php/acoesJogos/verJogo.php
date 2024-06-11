<?php

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login/login.php");
    exit();
} else {
    $usuario = $_SESSION['usuario'];

    $nome = $usuario['nome'];
    $idPatamar = $usuario['idPatamar'];
}

?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="col-12">

    <?php
    session_start();

    if (isset($_GET['nomeJogo']) && isset($_GET['categoria']) && !empty(trim($_GET['nomeJogo'])) && !empty(trim($_GET['categoria']))) {
        require '../../database/banco.php';

        $nomeJogo = $_GET['nomeJogo'];
        $categoria = $_GET['categoria'];

        $verificarExistencia = $conn->prepare('SELECT * FROM jogos WHERE nomeJogo = :nomeJogo');
        $verificarExistencia->bindValue(':nomeJogo', $nomeJogo);
        $verificarExistencia->execute();

        if ($verificarExistencia->rowCount() == 1) {

            $pegarDados = 'SELECT nomeJogo, descricao, jogoCategoria FROM jogos WHERE nomeJogo = :nomeJogo';
            $resultado = $conn->prepare($pegarDados);
            $resultado->bindValue(':nomeJogo', $nomeJogo);
            $resultado->execute();

            if ($resultado) {
                $linha = $resultado->fetch(PDO::FETCH_ASSOC);
                $nomeJogo = $linha['nomeJogo'];
                $descricao = $linha['descricao'];
                $categoriaId = $linha['jogoCategoria'];
                $url = '<img src="https://cdn-cosmos.bluesoft.com.br/products/7896748233885" style="background: no-repeat;" class="col-4">';
                echo $url;
                echo "<p id='descricao'> $descricao </p>";
            }
        }
    }
    ?>

    <div class="modal fade" id="edicao" aria-hidden="true" aria-labelledby="botaoEditar" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="botaoEditar">Editar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <button class="btn btn-primary" data-bs-target="#excluir" data-bs-toggle="modal">Excluir</button>
                    <button class="btn btn-primary" data-bs-target="#Editar" data-bs-toggle="modal">Editar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="excluir" aria-hidden="true" aria-labelledby="divExcluir" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="divExcluir">Excluir</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-dismissible fade show alert-danger col-12" role="alert">
                        <strong> Você tem certeza que quer apagar esse jogo? </strong>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-target="#edicao" data-bs-toggle="modal">Voltar</button>
                    <form action="excluirJogo.php"> <button class="btn btn-primary" data-bs-toggle="modal">Excluir</button> </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Editar" aria-hidden="true" aria-labelledby="divEditar" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="divEditar">Editar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Hide this modal and show the first with the button below.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-target="#edicao" data-bs-toggle="modal">Voltar</button>
                    <form action="atualizar.php"> <button class="btn btn-primary" data-bs-toggle="modal">Salvar</button> </form>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" data-bs-target="#edicao" data-bs-toggle="modal">Editar</button>

    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Comentários:</h1>
        </div>
        <div>
            <button class="btn btn-success" data-bs-target="#adicionarComentario" data-bs-toggle="modal">Adicionar</button>
        </div>
    </div>

    <div class="modal fade" id="adicionarComentario" aria-hidden="true" aria-labelledby="divAdicionarComentario" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="divAdicionarComentario">Adicionar Comentário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Hide this modal and show the first with the button below.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                    <form action="atualizar.php"> <button class="btn btn-primary" data-bs-toggle="modal">Adicionar</button> </form>
                </div>
            </div>
        </div>
    </div>

    <?php

    if (isset($_GET['nomeJogo']) && isset($_GET['categoria'])) {
        require '../../database/banco.php';

        $nomeJogo = $_GET['nomeJogo'];

        $sql = 'SELECT * FROM tabcomentarios';
        $consultarConteudo = $conn->prepare($sql);
        $consultarConteudo->execute();
        $todosComentarios = $consultarConteudo->fetchAll(PDO::FETCH_ASSOC);

        if (!(empty($todosComentarios))) {

            $coments = 'SELECT * FROM tabcomentarios WHERE jogoComentado = :jogoComentado';
            $procurarConteudo = $conn->prepare($coments);
            $procurarConteudo->bindValue(':jogoComentado', $nomeJogo);
            $procurarConteudo->execute();
            $comentarios = $procurarConteudo->fetchAll(PDO::FETCH_ASSOC);

            if (!empty($comentarios)) {
                foreach ($comentarios as $comentario) {
                    echo '
                <section class="m-2">
                    <div class="col-12 d-flex justify-content-between px-2">
                        ' . $comentario['conteudo'] . '.
                        <div>
                            <button class="btn btn-primary" data-bs-target="#modalExluir' . $comentario['idComentario'] . '" data-bs-toggle="modal">Excluir</button>
                            <button class="btn btn-primary" data-bs-target="#modalEditar' . $comentario['idComentario'] . '" data-bs-toggle="modal">Editar</button>
                        </div>
                    </div>
                    <div class="modal fade" id="modalEditar' . $comentario['idComentario'] . '" aria-hidden="true" aria-labelledby="EditarComentario' . $comentario['idComentario'] . '" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="EditarComentario' . $comentario['idComentario'] . '">Editar Comentário</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="row g-3 needs-validation" action="atualizarComentario.php" novalidate>
                                        <label for="novoComentario' . $comentario['idComentario'] . '" class="form-label">Comentário:</label>
                                        <div class="input-group has-validation">
                                            <input type="text" class="form-control" id="novoComentario' . $comentario['idComentario'] . '" aria-describedby="inputGroupPrepend3" name="novoComentario" value="' . $comentario['conteudo'] . '" required>
                                            <input type="hidden" name="comentarioId" value="' . $comentario['idComentario'] . '">
                                            <div class="invalid-feedback">
                                                Digite o comentário.
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button class="btn btn-success">Atualizar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="modal fade" id="modalExluir' . $comentario['idComentario'] . '" aria-hidden="true" aria-labelledby="EditarComentario' . $comentario['idComentario'] . '" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="EditarComentario' . $comentario['idComentario'] . '">Excluir Comentário</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="row g-3 needs-validation" action="atualizarComentario.php" novalidate>
                                        <div class="alert alert-dismissible fade show alert-danger col-12" role="alert">
                                            <strong> Você tem certeza que quer apagar ' . $comentario['conteudo'] . '? </strong>
                                        </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button class="btn btn-primary">Apagar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
                }
            }
        } else {
            echo "Nenhum comentário encontrado.";
        }
    }

    ?>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

<style>
    body {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100vh;
        height: 100vh;
    }

    #descricao {
        display: block;
    }
</style>