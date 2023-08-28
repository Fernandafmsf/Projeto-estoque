<?php
var_dump($_POST);
include "connection.php";

try{
  $q = "INSERT INTO produtos VALUES (null, :nome, :categoria, :quantidade)";
  $query=$pdo->prepare($q);

  $query ->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);
  $query ->bindParam(':categoria', $_POST['categoria'], PDO::PARAM_STR);
  $query ->bindParam(':quantidade', $_POST['quantidade'], PDO::PARAM_STR);
  $query->execute();

  if(!$query){
      header('Location:/Projeto-estoque/incex.php');

  }
  header('Location:/Projeto-estoque/index.php');
  

}
catch(PDOexception $e){
  echo 'Erro ao conectar com o MySQL: ' .$e->getMessage();

}







