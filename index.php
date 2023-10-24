<?php
require __DIR__ . "/vendor/autoload.php";

use src\model\Produto;


if(isset($_POST['Pesquisar'])){ 
  $nome = $_POST['nomePesquisa'];
  $produtos = Produto::pesquisar($nome);

}else{
  $produtos = Produto::getProdutos(); //estatico
}

include __DIR__ . "/src/view/header.php";
include __DIR__ ."/src/view/home.php";
include __DIR__ . "/src/view/listagem.php";
include __DIR__ . "/src/view/footer.php";

?>
