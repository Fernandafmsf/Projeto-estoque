<?php
session_start();
include "connection.php";
 
//na ausencia do $_Post['delete'], retornar à index -> early return
if(!isset($_GET['id'])){
  header('Location:/Projeto-estoque/index.php');

}

$product_id=$_GET['id'];

try {
  $q = "DELETE FROM produtos WHERE id=:prod_id";
  $query=$pdo->prepare($q);
  $query-> bindParam(':prod_id', $product_id, PDO::PARAM_STR );
  $query->execute();


}catch(PDOexception $e){
  echo 'Erro ao conectar com o MySQL: ' .$e->getMessage();

}

//se não houver mais resultado da query, retorna à index
if(!$query){
    //inserir mensagem depois
  header('Location:/Projeto-estoque/index.php');
  return;
}

//tendo retorno positivo da query, realizar uma ação
header('Location:/Projeto-estoque/listar.php');

    


  





