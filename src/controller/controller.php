<?php
include "../DAO/ProdutoDAO.php";
include "../model/Produto.php";
include "../connection/Database.php";

/**
 * Responsável por intermediar a interface gráfica com as regras do CRUD
 * Vai 'pegar' dados enviados da interface e, dentro de uma logica, aplicar a operaçao determinada. Essa operaçao vai ser do objeto DAO
 */

//instancia classes 
$produto = new Produto();
$produtoDAO= new ProdutoDAO();


//pega todos os dados passados por post
$input = filter_input_array(INPUT_POST);

if (isset($_POST['cadastrar'])) {
  echo "cadastrar";

  $produto->setNome($input['nome']);
  $produto->setQuantidade($input['quantidade']);
  $produto->setCategoria($input['categoria']);

  $produtoDAO->create($produto);

  echo "sucesso";
} else{
  header("Location: ../../");
}

  



