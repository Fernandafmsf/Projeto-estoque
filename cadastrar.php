<?php
require_once "./vendor/autoload.php";


use src\model\Produto;
$TITLE = "Cadastre seu produto";
$produto=new Produto();

if(isset($_POST['cadastrar'])){
  $produto->nome=$_POST['nome'];
  $produto->quantidade=$_POST['quantidade'];
  $produto->categoria =$_POST['categoria'];

  $produto->cadastrar();
  header("location: index.php?status= success");
  exit;
}

include __DIR__ . "/src/view/header.php";
include __DIR__ . "/src/view/form.php";
include __DIR__ . "/src/view/footer.php";

