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
    //inserir mensagem depois
    header('Location:/Projeto-estoque/index.php');
    return;
  }


  header('Location:/Projeto-estoque/index.php');
}
catch(PDOexception $e){
  echo 'Erro ao conectar com o MySQL: ' .$e->getMessage();

}







