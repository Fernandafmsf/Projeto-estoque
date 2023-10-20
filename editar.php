<?php

use src\model\Produto;

require_once "./vendor/autoload.php"; 
$TITLE= "Edite seu produto";

if(!isset($_GET['id'])){
  header('location: index.php');
  exit;
}

$produto = Produto::getProduto($_GET['id']); //tem que ser o mesmo ja usado antes 

if(isset($_POST['nome'], $_POST['quantidade'], $_POST['categoria'])){

  $produto ->nome = $_POST['nome'];
  $produto->quantidade = $_POST['quantidade'];
  $produto->categoria = $_POST['categoria'];

  $produto -> atualizar();

  header('location: index.php');

}

include "./src/view/header.php";
include "./src/view/form.php";
include "./src/view/footer.php";