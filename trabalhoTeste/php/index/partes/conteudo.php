<section class="d-flex justify-content-center align-items-center col-12" id="sectionAlerta">
  <?php
  switch ($idPatamar) {
    case 1:
      break;
    case 2:
      break;
    default:
      $mensagemErro = "Erro desconhecido!";
      echo '<div class="alert alert-danger alert-dismissible fade show col-11" role="alert">' . '<strong>' . $mensagemErro . '</strong>' . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' . '</div>';
      header("Location: ../login/login.php?erro=3");
      session_start();
      session_unset();
      session_destroy();
      break;
  }

  if (isset($_GET['sucesso'])) {
    $sucesso = $_GET['sucesso'];
    switch ($sucesso) {
      case 1:
        $sucesso = "Sucesso! categoria adicionada com sucesso";

        echo '<div class="alert alert-dismissible fade show alert-success col-11" role="alert">'
          . '<strong>' . $sucesso . '</strong>' .
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
          . '</div>';
        break;
      case 2:
        $sucesso = "Sucesso! jogo excluido com sucesso";

        echo '<div class="alert alert-dismissible fade show alert-success col-11" role="alert">'
          . '<strong>' . $sucesso . '</strong>' .
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
          . '</div>';
        break;
      case 3:
        $sucesso = "Sucesso! parâmetros do jogo atualizado com sucesso";

        echo '<div class="alert alert-dismissible fade show alert-success col-11" role="alert">'
          . '<strong>' . $sucesso . '</strong>' .
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
          . '</div>';
        break;
      case 4:
        $sucesso = "Sucesso! parâmetros do jogo atualizado com sucesso";

        echo '<div class="alert alert-dismissible fade show alert-success col-11" role="alert">'
          . '<strong>' . $sucesso . '</strong>' .
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
          . '</div>';
        break;
    }
  } elseif (isset($_GET['erro'])) {

    $erroUrl = $_GET['erro'];

    switch ($erroUrl) {
      case 1:
        $erro = "Erro ao adicionar categoria, Essa categoria está cadastrado!";

        echo '<div class="alert alert-dismissible fade show alert-danger col-11" role="alert">'
          . '<strong>' . $erro . '</strong>' .
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
          . '</div>';
        break;
      case 2:
        $erro = "É nescessario que ponha um nome na categoria";

        echo '<div class="alert alert-dismissible fade show alert-danger col-11" role="alert">'
          . '<strong>' . $erro . '</strong>' .
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
          . '</div>';
        break;
      case 3:
        $erro = "Erro ao adicionar jogo, Esse jogo está cadastrado!";

        echo '<div class="alert alert-dismissible fade show alert-danger col-11" role="alert">'
          . '<strong>' . $erro . '</strong>' .
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
          . '</div>';
        break;
      case 4:
        $erro = "Erro ao adicionar jogo, tente novamente";

        echo '<div class="alert alert-dismissible fade show alert-danger col-11" role="alert">'
          . '<strong>' . $erro . '</strong>' .
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
          . '</div>';
        break;
      case 5:
        $erro = "Por Favor, preencha todos os campos";

        echo '<div class="alert alert-dismissible fade show alert-danger col-11" role="alert">'
          . '<strong>' . $erro . '</strong>' .
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
          . '</div>';
        break;
      case 6:
        $erro = "Falha! A ação de excluir jogo falhou";

        echo '<div class="alert alert-dismissible fade show alert-danger col-11" role="alert">'
          . '<strong>' . $erro . '</strong>' .
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
          . '</div>';
        break;
      case 7:
        $erro = "Falha ao excluir jogo";

        echo '<div class="alert alert-dismissible fade show alert-danger col-11" role="alert">'
          . '<strong>' . $erro . '</strong>' .
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
          . '</div>';
        break;
    }
  }
  ?>
</section>

<section class="col-12 d-flex justify-content-center align-items-center">
  <div id="carouselExampleAutoplaying" class="carousel slide col-8 mt-1 mb-3" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../../images/jogoUm.jpg" class="d-block col-12 jogosImg rounded-4 ">
      </div>
      <div class="carousel-item">
        <img src="../../images/jogoDois.jpg" class="d-block col-12 jogosImg rounded-4   ">
      </div>
      <div class="carousel-item">
        <img src="../../images/jogoTres.jpg" class="d-block col-12 jogosImg rounded-4   ">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
  </div>
</section>

<section class="d-flex justify-content-center">
  <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Adicionar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <button class="btn btn-primary" id="textoBotao" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
            <h5 class="modal-title">Adicionar jogo</h5>
          </button>
          <button class="btn btn-primary" id="textoBotao" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal">
            <h5 class="modal-title">Adicionar Categoria</h5>
          </button>
        </div>
      </div>
    </div>
  </div>

  <form class="row g-3 needs-validation" action="criar/adicionarJogo.php" novalidate>
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Adicionar Jogo</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <label for="nomeJogo" class="form-label">Nome jogo:</label>
            <div class="input-group has-validation">
              <input type="text" class="form-control" id="nomeJogo" aria-describedby="inputGroupPrepend3" name="nomeJogo" required>
              <div class="invalid-feedback">
                Digite o nome do jogo.
              </div>
            </div>
            <label for="descricaoJogo" class="form-label">Descrição:</label>
            <div class="input-group has-validation">
              <input type="text" class="form-control" id="descricaoJogo" aria-describedby="inputGroupPrepend3" name="descricao" required>
              <div class="invalid-feedback">
                Digite a descrição do jogo.
              </div>
            </div>
            <label for="categoriaJogo" class="form-label">Categoria:</label>
            <div class="input-group has-validation">
              <select name="opcao" class="col-12" required>
                <option value="">Selecione uma opção</option>
                <?php
                require '../../database/banco.php';
                $nomes = 'SELECT idcategoria, nomeCategoria FROM categoria';
                $consultaNomes = $conn->prepare($nomes);
                $consultaNomes->execute();
                while ($nome = $consultaNomes->fetch(PDO::FETCH_ASSOC)) {
                  echo '<option value="' . $nome['idcategoria'] . '">' . $nome['nomeCategoria'] . '</option>';
                }
                ?>
              </select>
              <div class="invalid-feedback">
                Selecione a categoria do jogo.
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">Voltar</button>
            <button class="btn btn-success">Cadastrar</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <form class="row g-3 needs-validation" action="criar/criarCategoria.php" novalidate>
    <div class="modal fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Adicionar Categoria</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <label for="nomeCategoria" class="form-label">Nome categoria:</label>
            <div class="input-group has-validation">
              <input type="text" class="form-control" id="nomeCategoria" aria-describedby="inputGroupPrepend3" name="nomeCategoria" required>
              <div class="invalid-feedback">
                Digite o nome da categoria.
              </div>
            </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">Voltar</button>
            <button class="btn btn-success">Cadastrar</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Adicionar</button>
</section>

<?php
require '../../database/banco.php';

$ids = 'SELECT COUNT(idcategoria) AS total FROM categoria';
$resultado = $conn->prepare($ids);
$resultado->execute();
$quantCategorias = $resultado->fetch(PDO::FETCH_ASSOC);

if ($quantCategorias) {
  for ($i = 0; $i < $quantCategorias['total']; $i++) {
    $offset = $i;
    $nomes = 'SELECT nomeCategoria AS nomCategorias FROM categoria LIMIT :offset, 1';
    $consultaNomes = $conn->prepare($nomes);
    $consultaNomes->bindParam(':offset', $offset, PDO::PARAM_INT);
    $consultaNomes->execute();
    $nome = $consultaNomes->fetch(PDO::FETCH_ASSOC);
    echo '<section>';

    echo '<div class="d-flex justify-content-between align-items-end mx-3">
          <label class="fs-1 fw-bold">' . $nome['nomCategorias'] . '</label>
        </div><br>';

    echo '<div class="row col-12">';

    $select = 'SELECT * FROM verJogo';
    $resultado = $conn->query($select);

    if ($resultado) {
      $linhas = $resultado->fetchAll(PDO::FETCH_ASSOC);
      foreach ($linhas as $linha) {
        if ($nome['nomCategorias'] == $linha['categoria']) {
          echo '<div class="col-md-2 text-center" style="margin: 0 55px">';
          echo '<div class="card mb-4 col-md-3" style="width: 18rem;">
            <img src="https://cdn-cosmos.bluesoft.com.br/products/7896748233885" class="card-img-top">
            <div class="card-body">
              <p class="card-text fs-2">' . $linha['nomeJogo'] . '</p>
              <form action="../acoesJogos/teste.php" method="post">
                <input type="hidden" name="nomeJogo" value="' . $linha['nomeJogo'] .'">
                <input type="hidden" name="categoria" value="' . $linha['categoria'] .'">
                <input type="hidden" name="user" value="' . $email . '">
                <input type="submit" class="btn btn-primary" value="Visitar Review">
              </form>
            </div>
          </div>';
          echo '</div>';
        }
      }
    }

    echo '</div>';
    echo '</section>';
  }
}
?>

<form action="" method="post">

<script>
  (() => {
    'use strict'

    const forms = document.querySelectorAll('.needs-validation')

    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>



<style>
  #sectionAlerta {
    margin-top: 70px;
  }


  @keyframes bordarRGB {
    0% {
      border-color: rgb(0, 255, 0);
    }

    25% {
      border-color: rgb(255, 0, 0);
    }

    50% {
      border-color: rgb(0, 0, 255);
    }

    75% {
      border-color: rgb(255, 255, 0);
    }

    100% {
      border-color: rgb(255, 0, 255);
    }
  }

  .alertaVerde {
    border: 3px solid;
    background-color: transparent;
    animation: bordarRGB 5s infinite alternate;
  }

  #visualizar {
    color: dodgerblue;
    outline: none;
    text-decoration: none;
    transition: color 0.4s;
  }

  #visualizar:hover {
    color: red;
    transition: color 0.2s;
  }

  #textoBotao {
    width: 210px;
    margin: 0px 2px;
  }
</style>










