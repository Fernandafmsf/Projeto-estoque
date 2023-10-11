<?php

use PDO;
use PDOException;

/**
 * Classe criada para realizar a conexao com o banco de dados 
 * Responsavel por instanciar um objeto pdo (com infos do banco de dados) - feito em getConnection - e retornar esse objeto
 */

class Database{
  const HOST = '127.0.0.1:3306';
  const DB = 'loja';
  const USER = 'admin';
  const PASSWORD = 'admin';
  const table = "produtos";

  public static $conexao;

  public function __construct() {
    //
  }

  public static function getConnection(){
    try {
      self::$conexao = new PDO("mysql:host=" . self::HOST . "; dbname=" . self::DB, self::USER, self::PASSWORD);
      self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return self::$conexao;
    } catch (PDOException $e) {
      echo 'Erro ao conectar com o MySQL' . $e->getMessage();
    }
    
  }

  }

