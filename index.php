<?php
session_start();
include "connection.php";

$query = $pdo-> prepare("SELECT * FROM produtos");
$query -> execute();
$qtd=$query->rowCount();

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

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <a class="navbar-brand" href="#">Cadastro de produtos</a>
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
<br>
    <div class="container-sm">

  <h1>Cadastro de produtos</h1>
  <p>Faça o cadastro de produtos!</p>

  <form action="cadastrar.php" method="POST">

    <div class="mb-3">
      <label for="name">Nome</label>
      <input type="text" name="nome" class="form-control form-control-sm" required>
    </div>

    <div class="mb-3">
      <label for="categoria">Categoria do produto</label>
      <input type="text" name="categoria" class="form-control form-control-sm" required >
    </div>

    <div class="mb-3">
      <label for="quantidade">Quantidade</label>
      <input type="number" name="quantidade" class="form-control form-control-sm" required>
    </div>

    <div class="mb-3">
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>   
  </form>
</div>

   <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

