<?php
include "connection.php";
session_start();
var_dump($_POST);//fazer com isset?

try{
  $q="SELECT * FROM produtos WHERE nome=:nome";
  $query=$pdo->prepare($q);
  $query->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);
  $query->execute();

  if(!$query){
    //inserir mensagem depois
    header('Location:/Projeto-estoque/index.php');
    return;
  }



}catch(PDOexception $e){
  echo 'Erro ao conectar com o MySQL: ' .$e->getMessage();

}

