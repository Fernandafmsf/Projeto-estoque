<?php

use src\model\Produto;

require_once "./vendor/autoload.php"; 
$TITLE= "Edite seu produto";
$editProduto = new Produto();

if(!isset($_GET['id'])){
  header('location: index.php');
  exit;
}

$editProduto = Produto::getProduto($_GET['id']); //tem que ser o mesmo ja usado antes 

if(isset($_POST['nome'], $_POST['quantidade'], $_POST['categoria'])){

  $editProduto ->nome = $_POST['nome'];
  $editProduto->quantidade = $_POST['quantidade'];
  $editProduto->categoria = $_POST['categoria'];

  $editProduto -> atualizar();

  header('location: index.php');

}

include "./src/view/header.php";
include "./src/view/form-edit.php";
include "./src/view/footer.php";