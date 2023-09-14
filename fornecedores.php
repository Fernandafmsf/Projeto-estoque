<?php
session_start();
include('connection.php');

$q = "SELECT * FROM fornecedor";
$query = $pdo->prepare($q);
$query->execute();

$qtd = $query->rowCount();


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de fornecedores</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

      <a class="navbar-brand" href="index.php">Cadastro de produtos</a>


      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item ">
            <a class="nav-link " href="index.php">Home </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="listar.php">Listar produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="fornecedores.php">Listar fornecedores</a>
          </li>
        </ul>
      </div>

      <form class="d-flex " method="POST">
        <input class="form-control m-2 " type="text" name="nome" placeholder="Nome do produto..." value="<?php echo $nome_exibition; ?>">
        <button class="btn btn-dark m-2" type="submit" name="search">Pesquisar</button>
      </form>

    </div>
  </nav>
  <br><br>

  <div class="container-sm">

    <?php
    if ($qtd <= 0) {
    ?>
      <script>
        alert("Nao foi encontrado resultados")
      </script>

    <?php
    } else {
    ?>

      <h3>Lista de fornecedores</h3>
      <table class="table table-striped table-hover table-bordered">
        <thead>
          <tr>
            <td>Codigo</td>
            <td>Nome</td>
            <td>Telefone</td>
            <td>Ações</td>
          </tr>
        </thead>

      <?php
    }
      ?>

      <tbody>
        <?php
        foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $row) {
        ?>
          <tr>
            <td>
              <?= $row['codigo'] ?>
            </td>
            <td>
              <?= $row['nome'] ?>
            </td>
            <td>
              <?= $row['telefone'] ?>
            </td>
            <td>
              <button class="btn btn-success">
                <a href="update-fornecedor.php?id=" <?= $row['codigo'] ?> class="nav-link">
                  Editar
                </a>
              </button>

              <button class="btn btn-danger">
                <a href="deletar-fornecedor.php?id=" <?= $row['codigo'] ?> onclick="return confirm('Tem certeza que deseja excluir?')" class="nav-link">
                  Deletar
                </a>
              </button>

            </td>
          </tr>

        <?php
        }
        ?>
      </tbody>

  </div>


</body>

</html>