<?php
//conectando ao DB e fazendo tratamento de erro com try catch
$host = "localhost:3309";
$db = "loja";
$username = "admin";
$password = "admin";

try
{
  $pdo=new PDO('mysql:host=localhost:3306;dbname=loja', 'admin', 'admin');
}
catch(PDOexception $e)
{
  echo 'Erro ao conectar com o MySQL: ' .$e->getMessage();
}

