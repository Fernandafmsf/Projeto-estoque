<?php
session_start(); // necessario iniciar para usar o 'edit'
var_dump($_POST);
include "connection.php";

try{
  $q = "INSERT INTO produtos VALUES (null, :nome, :valor, :quantidade, :categoria, :codigo_fornecedor )";
  $query=$pdo->prepare($q);

  $query ->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);
  $query->bindParam(':valor', $_POST['valor'], PDO::PARAM_STR);
  $query->bindParam(':quantidade', $_POST['quantidade'], PDO::PARAM_STR);
  $query ->bindParam(':categoria', $_POST['categoria'], PDO::PARAM_STR);
  $query->bindParam(':codigo_fornecedor', $_POST['codigo_fornecedor'], PDO::PARAM_STR);
  
  $query->execute();

  if(!$query){
    header('Location:/Projeto-estoque/index.php');
    $_SESSION['message'] = "Cadastro falhou";

  }
  $_SESSION['message'] = "Cadastrado com sucesso";
  header('Location:/Projeto-estoque/index.php');
  exit (0); // estudar sobre 
  

}
catch(PDOexception $e){
  echo 'Erro ao conectar com o MySQL: ' .$e->getMessage();
  exit(0);

}







