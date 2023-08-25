<?php
session_start();
include "connection.php";

$query = $pdo-> prepare("SELECT * FROM produtos");
$query -> execute();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD - produtos</title>
</head>
<body>
  <h1>Cadastro de produtos</h1>
  <p>Faça o cadastro de produtos!</p>

  <form action="cadastrar.php" method="POST">
    <label for="name">Nome:</label>
    <input type="text" name="nome" required>
      <br><br>
    <label for="categoria">Categoria do produto:</label>
    <input type="text" name="categoria"required >
      <br><br>
    <label for="quantidade">Quantidade</label>
    <input type="number" name="quantidade" required>
    <button type="submit">Cadastrar</button>
  </form>

  <br><br>

  <table border="1">
    <thead>
      <tr>
        <td>Produto</td>
        <td>Categoria</td>
        <td>Quantidade</td>
        <td>Atualizar</td>
        <td>Deletar</td>
      </tr>
    </thead>

    <tbody>
      <?php
        foreach($query->fetchAll(PDO::FETCH_ASSOC) as $row){ // começa aqui
      ?>
      <tr>
        <td> 
          <?= $row['nome'] ?> 
        </td>
        <td>
          <?= $row['categoria'] ?> 
        </td>
        <td> 
          <?= $row['quantidade'] ?>
        </td>
        <td>
          <button>
            <a href="update.php?id=<?=$row['id']?>" style="text-decoration:none">
              Update
            </a>
          </button>
          
        </td>

        <td>
          <form action="deletar.php" method="POST">
            <button type="submit" name="delete" value="<?=$row['id']; ?>">
              Deletar
            </button>
          </form>
        </td>

      </tr>

      <?php
        }
        // termina aqui
      ?>
    </tbody>
  </table>

</body>
</html>

