<?php
session_start();
include('connection.php');


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Update dados</title>
</head>

<body>
  <script src="js/bootstrap.bundle.min.js"></script>


  <nav class="navbar navbar-expand-lg navbar-light bg-light">

    <a class="navbar-brand" href="index.php">Cadastro de produtos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listar.php">Listar produtos</a>
        </li>

      </ul>
    </div>
  </nav>
  <br><br>

  <div class="container-sm">
    <h3>Edite os dados </h3>

    <?php

    if (!isset($_GET['id'])) {
      header('Location:/Projeto-estoque/index.php');
    }

    $product_id = $_GET['id'];
    $q = "SELECT * FROM produtos WHERE id=:prod_id";
    $query = $pdo->prepare($q);
    $query->bindParam(':prod_id', $product_id, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);


    ?>
    <form action="code-update.php" method="POST">

      <div class="mb-3">
        <input type="hidden" name="id" value="<?= $result['id'] ?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?= $result['nome']; ?>" class="form-control">
      </div>

      <div class="mb-3">
        <label for="nome">Fornecedor:</label>
        <input type="text" name="fornecedor" value="<?= $result['fornecedor']; ?>" class="form-control">
      </div>

      <div class="mb-3">
        <label for="categoria">Categoria do produto:</label>
        <input type="text" name="categoria" value="<?= $result['categoria'] ?>" class="form-control" required>
      </div>


      <div class="mb-3">
        <label for="quantidade">Quantidade</label>
        <input type="number" name="quantidade" value="<?= $result['quantidade'] ?>" class="form-control" required>
      </div>

      <button type="submit" name="update-product" class="btn btn-success">Atualizar</button>
      <button class="btn btn-danger">
        <a href="index.php" class="nav-link">Cancelar</a>
      </button>
    </form>
    <br>



  </div>
</body>

</html>