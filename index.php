<?php
session_start();
include "connection.php";

$query = $pdo->prepare("SELECT * FROM produtos");
$query->execute();
$qtd = $query->rowCount();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <title>CRUD - produtos</title>
</head>

<body>
  <script src="js/bootstrap.bundle.min.js"></script>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid m-2">
      <a class="navbar-brand" href="index.php">Cadastro de produtos</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class=" navbar-collapse collapse" id="navbarNav">

        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="listar.php">Listar produtos</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
  <br>

  <div class="container-sm">
    <h1>Cadastro de produtos</h1>
    <p>Faça o cadastro de produtos!</p>

    <form action="cadastrar.php" method="POST">

      <div class="mb-3">
        <label for="name">Nome</label>
        <input type="text" name="nome" class="form-control form-control" required>
      </div>

      <div class="mb-3">
        <label for="name">Fornecedor</label>
        <input type="text" name="fornecedor" class="form-control form-control" required>
      </div>

      <div class="mb-3">
        <label for="categoria">Categoria do produto</label>
        <select class="form-select" name="categoria" id="categoria">
          <option selected>Selecione...</option>
          <option value="Informatica">Informatica</option>
          <option value="Mercearia">Mercearia</option>
          <option value="Brinquedo">Brinquedo</option>
          <option value="Maquiagem">Maquiagem</option>

        </select>

      </div>

      <div class="mb-3">
        <label for="quantidade">Quantidade</label>
        <input type="number" name="quantidade" class="form-control form-control" required>
      </div>

      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </div>
    </form>
  </div>

  <?php if (isset($_SESSION['message'])) : ?>

    <h5 class="alert alert-success container-sm"> <?= $_SESSION['message'] ?></h5>

  <?php
    unset($_SESSION['message']);
  endif;
  ?>



</body>

</html>