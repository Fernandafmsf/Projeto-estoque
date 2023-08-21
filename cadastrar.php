<?php
  var_dump($_POST);
  include "connection.php";

  $q = "INSERT INTO produtos VALUES (null, :nome, :categoria, :quantidade)";
  $query=$pdo->prepare($q);

  $query ->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);
  $query ->bindParam(':categoria', $_POST['categoria'], PDO::PARAM_STR);
  $query ->bindParam(':quantidade', $_POST['quantidade'], PDO::PARAM_STR);
  $query->execute();

header('Location:/Projeto-estoque/index.php');

?>