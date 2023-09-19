<?php
session_start();

$q = "SELECT * FROM fornecedor";
$query = $pdo->prepare($q);
$query->execute();

$qtd = $query->rowCount();


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de fornecedores</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>

  <div class="container-sm">

    <?php
    if ($qtd <= 0) {
    ?>
      <script>
        alert("Nao foi encontrado resultados")
      </script>

    <?php
    } else {
    ?>

     

      </div>
      <table class="table table-striped table-hover table-bordered">
        <thead>
          <tr>
            <td>Codigo</td>
            <td>Nome</td>
            <td>Telefone</td>
            <td>Ações</td>
          </tr>
        </thead>

      <?php
    }
      ?>

      <tbody>
        <?php
        foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $row) {
        ?>
          <tr>
            <td>
              <?= $row['codigo'] ?>
            </td>
            <td>
              <?= $row['nome'] ?>
            </td>
            <td>
              <?= $row['telefone'] ?>
            </td>
            <td>
              <button class="btn btn-success">
                <a href="update-fornecedor.php?id=" <?= $row['codigo'] ?> class="nav-link">
                  Editar
                </a>
              </button>

              <button class="btn btn-danger">
                <a href="deletar-fornecedor.php?id=" <?= $row['codigo'] ?> onclick="return confirm('Tem certeza que deseja excluir?')" class="nav-link">
                  Deletar
                </a>
              </button>

            </td>
          </tr>

        <?php
        }
        ?>
      </tbody>

  </div>


</body>

</html>