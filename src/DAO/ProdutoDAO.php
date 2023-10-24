<?php

namespace src\DAO;

use src\model\Produto;
use src\connection\Database;

use PDOException;

/**
 * ProdutoDAO extende Database para ser possivel usar o getConnection do database
 */

class ProdutoDAO extends Database{
  public $table;
  public $conn;

  public function __construct($table) {
    $this->table = $table;
    $this->getConnection();
  }

  public function execute($query, $params=[]){
    try{
      $statement= $this::$conexao->prepare($query);
      $statement->execute($params);
      return $statement;

    }catch(PDOException $e){
      echo "Erro ao conectar com o MySQL: ".$e->getMessage();
    }
  }

  public function insert($values){
    $fiedls = array_keys($values);
    $binds = array_pad([], count($fiedls), '?');

    $query="INSERT INTO ".$this->table."(" .implode(', ', $fiedls). ") VALUES (" .implode(',', $binds). ")";

    $this->execute($query,array_values($values));
    return $this::$conexao->lastInsertId();

  }

  public function select($where=null){

    $where= strlen($where) ? 'WHERE'.$where : '';

    $query="SELECT * FROM ".$this->table. ' ' .$where;

    return $this->execute($query);

  }

  public function excluir($where){
   
    $query = "DELETE FROM " .$this->table. " WHERE".$where;
    $this->execute($query);
    return true;  

  }

  public function update($where, $values){
    $fields = array_keys($values);

    $query= "UPDATE " .$this->table." SET " .implode('=?, ', $fields).'=? WHERE'.$where;
    $this->execute($query, array_values($values));
    return true;

  }

  public function search($nome){

    $query = "SELECT * FROM " .$this->table. " WHERE nome LIKE '%" .$nome. "%' LIMIT 5";  
  
    return $this->execute($query);;

  }


  
}