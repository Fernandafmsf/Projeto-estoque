<?php

// classe que contem o modelo da tabela do banco de dados 

class Produto{
  private $id;
  private $nome;
  private $quantidade;
  private $categoria;


  public function getId(){
    return $this->id;
  }
  public function getNome()
  {
    return $this->nome;
  }
  public function getQuantidade()
  {
    return $this->quantidade;
  }
  public function getCategoria()
  {
    return $this->categoria;
  }

  public function setId($id){
    $this->id=$id;
  }

  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  public function setQuantidade($quantidade)
  {
    $this->quantidade = $quantidade;
  }

  public function setCategoria($categoria)
  {
    $this->categoria = $categoria;
  }


}