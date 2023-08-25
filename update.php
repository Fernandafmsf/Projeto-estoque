<?php
session_start();
include ('connection.php');


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update dados</title>
</head>
<body>
<a href="index.php">Voltar</a>
<h3>Edite os dados </h3>

<br>

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

  <input type="hidden" name="id" value="<?=$result['id']?>">

  <label for="nome">Nome:</label>
  <input type="text" name="nome" value="<?=$result['nome']; ?>">
  <br><br>

  <label for="categoria">Categoria do produto:</label>
  <input type="text" name="categoria" value= "<?=$result['categoria'] ?>"required >
  <br><br>

  <label for="quantidade">Quantidade</label>
  <input type="number" name="quantidade" value="<?=$result['quantidade'] ?>" required>
  <button type="submit" name="update-product">Atualizar</button>
</form>
  
</body>
</html>