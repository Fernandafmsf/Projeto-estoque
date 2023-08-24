<?php
session_start();
 
include "connection.php";
 

//na ausencia do $_Post['delete'], retornar à index
if(!isset($_POST['delete'])){
  header('Location:/Projeto-estoque/index.php');

}
$product_id=$_POST['delete'];

try {
  $q = "DELETE FROM produtos WHERE id=:prod_id";
  $query=$pdo->prepare($q);
  $query-> bindParam(':prod_id', $product_id, PDO::PARAM_STR );
  $query->execute();

      /*Outra forma de proteger o dado seria: 
        $data=[
              ':prod_id'=> $product_id
            ];*/

}catch(PDOexception $e){
  echo 'Erro ao conectar com o MySQL: ' .$e->getMessage();

}


if(!$query){
    //inserir mensagem depois
  header('Location:/Projeto-estoque/index.php');
  return;
}

//tendo retorno positivo da query, realizar uma ação
header('Location:/Projeto-estoque/index.php');

    


  





