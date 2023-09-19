<?php
session_start();
include "connection.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

  <div class="container-sm">
    <h1>Cadastro de produtos</h1>

    <form action="?page=cadastrar" method="POST">

      <div class="mb-3">

        <label for="name">Nome</label>
        <input type="text" name="nome" class="form-control form-control" required>
      </div>

      <div class="mb-3">
        <label for="name">Valor de venda</label>
        <input type="number" name="valor" class="form-control form-control" required>
      </div>

      <div class="mb-3">
        <label for="quantidade">Quantidade</label>
        <input type="number" name="quantidade" class="form-control form-control" required>
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
        <label for="name">Codigo do Fornecedor</label>
        <input type="text" name="codigo_fornecedor" class="form-control form-control" required>
      </div>

      <div class="mb-3">
        <button type="submit" class="btn btn-primary" >Cadastrar</button>
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