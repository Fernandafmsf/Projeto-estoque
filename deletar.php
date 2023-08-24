<?php
 
  include "connection.php";
  
  if(isset($_POST['delete'])){
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


      if($query){
        //inserir mensagem depois
        header('Location:/Projeto-estoque/index.php');

      }else{
        //inserir mensagem depois
        header('Location:/Projeto-estoque/index.php');

      }


    }catch(PDOexception $e){
      echo 'Erro ao conectar com o MySQL: ' .$e->getMessage();

    }

    
  }

  





?>