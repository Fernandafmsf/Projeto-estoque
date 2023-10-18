<?php

namespace src\model;
// classe que contem o modelo da tabela do banco de dados 
use src\connection\Database;
use src\DAO\ProdutoDAO;
use PDO;


class Produto{
  public $id;
  public $nome;
  public $quantidade;
  public $categoria;



  public static function getProdutos($where=null){
    return (new ProdutoDAO('produtos'))->select($where)->fetchAll(PDO::FETCH_CLASS, self::class);

  }

  public static function getProduto($id){
    return (new ProdutoDAO('produtos'))->select(" id= ".$id)->fetchObject(self::class);

  }

public function cadastrar(){
  $produtoDAO=new ProdutoDAO('produtos');
  $this->id=$produtoDAO->insert([
    'nome'=> $this->nome,
    'quantidade' =>$this->quantidade,
    'categoria' =>$this->categoria
  ]);
  return true;
}

public function deletar(){
  return (new ProdutoDAO('produtos'))->excluir(' id= '.$this->id);

}




}