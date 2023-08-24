<?php
//conectando ao DB e fazendo tratamento de erro com try catch
try
{
  $pdo=new PDO('mysql:host=localhost;dbname=loja', 'root', 'admin');
}
catch(PDOexception $e)
{
  echo 'Erro ao conectar com o MySQL: ' .$e->getMessage();
}

