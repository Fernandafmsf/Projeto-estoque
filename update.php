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



  <div class="container-sm">
    <h3>Edite os dados </h3>

    <?php

    if (!isset($_POST['update'])) {
      header('Location:?page=index');
    }

    $product_id = $_POST['update'];
    $q = "SELECT * FROM produtos WHERE id=:prod_id";
    $query = $pdo->prepare($q);
    $query->bindParam(':prod_id', $product_id, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);


    ?>
    <form action="?page=code-update" method="POST">

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