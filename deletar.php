<?php
  session_start();
  include "connection.php";
  
  if(isset($_POST['delete'])){
    $product_id=$_POST['delete'];

    try {
      $q = "DELETE FROM produtos WHERE id=:prod_id";
      $query=$pdo->prepare($q);
      $data=[
              ':prod_id'=> $product_id
            ];
      $query_execute=$query->execute($data);

      if($query_execute){
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