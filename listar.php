<?php
session_start();
include ("connection.php");

if(isset($_POST['search'])){
  $nome=$_POST['nome'];

  $q= "SELECT * FROM produtos WHERE nome LIKE :nome ";
  $query=$pdo->prepare($q);
  $query ->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);
  $query_execute= $query->execute();

  $qtd=$query->rowCount();

}else{

  $q= "SELECT * FROM produtos";
  $query=$pdo->prepare($q);
  $query->execute();

  $qtd=$query->rowCount();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de produtos</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">

  <a class="navbar-brand" href="#">Cadastro de produtos</a>


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
    </ul>
  </div>

    <form class="d-flex "  method="POST">
      <input class="form-control m-2 " type="text" name="nome" placeholder="Nome do produto...">
      <button class="btn btn-dark m-2" type="submit" name="search">Pesquisar</button>
    </form>

  </div>
</nav>
  <br><br>
  <div class="container-sm">

  <?php
    if($qtd<=0){
    ?>
    <script>
      alert("Nao foi encontrado resultados.");
    </script>
    <?php
    }else{
  ?>

  <h3>Lista de produtos</h3>
<table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <td>Produto</td>
        <td>Categoria</td>
        <td>Quantidade</td>
        <td>Ações</td>
       
      </tr>
    </thead>

  <?php
    }
  ?>
  <tbody>
  <?php
      foreach($query->fetchAll(PDO::FETCH_ASSOC) as $row){ // começa aqui
  ?>
    <tr>
      <td> 
        <?= $row['nome'] ?> 
      </td>
      <td>
        <?= $row['categoria'] ?> 
      </td>
      <td> 
        <?= $row['quantidade'] ?>
      </td>
      <td>
        <button class="btn btn-success">
          <a href="update.php?id=<?=$row['id']?>" class="nav-link">
            Editar
          </a>
        </button>
          
      <button class="btn btn-danger">
          <a href="deletar.php?id=<?=$row['id']?>"
          onclick="return confirm('Tem certeza que deseja excluir?')" class="nav-link">
            Deletar
          </a>
        </button>
      
      </td>

      </tr>

  <?php
      }

    // termina aqui
  ?>
  </tbody>
</table>
    </div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>