<?php
session_start();
include ('connection.php');


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
<body class="container-sm">

  <h3>Edite os dados </h3>

<?php

if(!isset($_GET['id'])){
  header('Location:/Projeto-estoque/index.php');

}

  $product_id=$_GET[ 'id'];
  $q="SELECT * FROM produtos WHERE id=:prod_id";
  $query = $pdo->prepare($q);
  $query-> bindParam(':prod_id', $product_id, PDO::PARAM_STR );
  $query->execute();

  $result=$query->fetch(PDO::FETCH_ASSOC);


?>
<form action="code-update.php" method="POST">

  <div class="mb-3">
    <input type="hidden" name="id" value="<?=$result['id']?>">

    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="<?=$result['nome']; ?>" class="form-control">
  </div>

  <div class="mb-3">
    <label for="categoria">Categoria do produto:</label>
    <input type="text" name="categoria" value= "<?=$result['categoria'] ?>" class="form-control" required >
  </div>

  <div class="mb-3">
    <label for="quantidade">Quantidade</label>
    <input type="number" name="quantidade" value="<?=$result['quantidade'] ?>" class="form-control" required>
  </div>

  <button type="submit" name="update-product" class="btn btn-success">Atualizar</button>
  <button class="btn btn-primary">
    <a href="index.php" class="nav-link">Voltar</a>
  </button>
</form>
  
</body>
</html>