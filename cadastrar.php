<?php
include "./src/model/Produto.php";
include "./src/DAO/ProdutoDAO.php";

$produto=new Produto();
$produtoDAO= new ProdutoDAO();

include __DIR__ . "/src/view/header.php";
include __DIR__ . "/src/view/form.php";
include __DIR__ . "/src/view/footer.php";

