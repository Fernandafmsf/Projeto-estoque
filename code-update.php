<?php
session_start();
include ('connection.php');

if(!isset($_POST['update-product'])){
  header('Location:/Projeto-estoque/index.php');

}

try{
  $q="UPDATE produtos SET nome=:nome, categoria=:categoria, quantidade=:quantidade WHERE id=:id";
  $query= $pdo->prepare($q);

  $query->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
  $query->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);
  $query->bindParam(':categoria', $_POST['categoria'], PDO::PARAM_STR);
  $query->bindParam(':quantidade', $_POST['quantidade'], PDO::PARAM_STR);

  $query->execute();

  if(!$query){
    $_SESSION['message-update'] = "Atualização falhou";
    header('Location:/Projeto-estoque/index.php');
    return;
  }

  $_SESSION['message-update']= "Atualizado com sucesso!";
  header('Location:/Projeto-estoque/listar.php');
  exit(0);
}
catch(PDOexception $e){
  echo 'Erro ao conectar com o MySQL: ' .$e->getMessage();
  header('Location:/Projeto-estoque/listar.php');
  exit(0);
}







