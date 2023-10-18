<?php

require_once "./vendor/autoload.php";


use src\model\Produto;




//instanciando produto
$obProduto= Produto::getProduto($_GET['id']);

//verificando se chegou o id do produto
if (!isset($_GET['id']) || (!$obProduto instanceof Produto)) {
  header("location: index.php");
  exit;
}


if(isset($_POST['Excluir'])){
  $obProduto->deletar();
  header('location: index.php');
  exit;
}


include "./src/view/header.php";
include "./src/view/footer.php";

