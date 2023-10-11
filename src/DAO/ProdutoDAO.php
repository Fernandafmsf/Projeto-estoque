<?php
include "../model/Produto.php";
include "../connection/Database.php";

use PDOException;

/**
 * Classe que vai efetivamente realizar as operaçoes do CRUD
 * Vai pegar a instancia de PDO que se encontra na classe Database para preparar e executar a query
 */

class ProdutoDAO {
  private $table = 'produtos';
 
  public function create(Produto $produto){
    
    try{
      $query = 'INSERT INTO ' . self::$table . '(nome, quantidade, categoria) VALUES(?, ?, ?)';

      $statement = Database::getConnection()->prepare($query);
      $statement->bindValue(1, $produto->getNome());
      $statement->bindValue(2, $produto->getQuantidade());
      $statement->bindValue(3, $produto->getCategoria());

      return $statement->execute();
      
    }catch(PDOException $e){
      echo 'Erro ao conectar com o MySQL' . $e->getMessage();
    }
  }

  
}