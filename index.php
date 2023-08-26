<?php
session_start();
include "connection.php";

$query = $pdo-> prepare("SELECT * FROM produtos");
$query -> execute();
$qtd=$query->rowCount();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <title>CRUD - produtos</title>
</head>
<body class="container-sm">
  <h1>Cadastro de produtos</h1>
  <p>Faça o cadastro de produtos!</p>

  <form action="cadastrar.php" method="POST">

    <div class="mb-3">
      <label for="name">Nome</label>
      <input type="text" name="nome" class="form-control form-control-sm" required>
    </div>

    <div class="mb-3">
      <label for="categoria">Categoria do produto</label>
      <input type="text" name="categoria" class="form-control form-control-sm" required >
    </div>

    <div class="mb-3">
      <label for="quantidade">Quantidade</label>
      <input type="number" name="quantidade" class="form-control form-control-sm" required>
    </div>

    <div class="mb-3">
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>   
  </form>

  <br><br>

  <?php
      if($qtd<=0){
        print"<h3>Não foi encontrado resultados</h3>
        <h3>Cadastre produtos</h3>";
      }
      else{
        
      ?>
  <table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <td>Produto</td>
        <td>Categoria</td>
        <td>Quantidade</td>
        <td>Atualizar</td>
        <td>Deletar</td>
      </tr>
    </thead>

    <?php
      }
    ?>
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
          <button class="btn btn-success">
            <a href="update.php?id=<?=$row['id']?>" class="nav-link">
              Update
            </a>
          </button>
          
        </td>

        <td>
          <form action="deletar.php" method="POST">
            <button class="btn btn-danger" type="submit" name="delete" value="<?=$row['id']; ?>">
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

   <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

