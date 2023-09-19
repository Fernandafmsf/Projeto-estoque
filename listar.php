<?php
session_start();
include("connection.php");
$nome = "";
$nome_exibition = "";

if (isset($_POST['search'])) {
  $nome = "%" . $_POST['nome'] . "%";
  $nome_exibition = $_POST['nome'];

  $q = "SELECT * FROM produtos WHERE nome LIKE :nome";
  $query = $pdo->prepare($q);
  $query->bindParam(':nome', $nome, PDO::PARAM_STR);
  $query_execute = $query->execute();

  $qtd = $query->rowCount();
} else {

  $q = "SELECT * FROM produtos";
  $query = $pdo->prepare($q);
  $query->execute();


  $qtd = $query->rowCount();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de produtos</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>



  <div class="container-sm">

    <?php
    if ($qtd <= 0) {
    ?>
      <script>
        alert("Nao foi encontrado resultados.");
      </script>
    <?php
    } else {
    ?>


      <div class="row">
        <div class="col-sm 8">
          <h3>Lista de produtos</h3>
        </div>
        <div class="col-sm-4">
          <form class="d-flex " method="POST">
            <input class="form-control m-2 " type="search" name="nome" placeholder="Nome do produto..." value="<?php echo $nome_exibition; ?>">
            <button class="btn btn-dark m-2" type="submit" name="search">Pesquisar</button>
          </form>
        </div>

      </div>




      <table class="table table-striped table-hover table-bordered">
        <thead>
          <tr>
            <td>Produto</td>
            <td>Valor</td>
            <td>Quantidade</td>
            <td>Categoria</td>
            <td>Codigo Fornecedor</td>
            <td>Ações</td>

          </tr>
        </thead>

      <?php
    }
      ?>
      <tbody>
        <?php
        foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $row) { // começa aqui
        ?>
          <tr>
            <td>
              <?= $row['nome'] ?>
            </td>
            <td>
              R$<?= $row['valor'] ?>
            </td>
            <td>
              <?= $row['quantidade'] ?>
            </td>
            <td>
              <?= $row['categoria'] ?>
            </td>
            <td>
              <?= $row['codigo_fornecedor'] ?>
            </td>
            <td>

              <div class="row">
                <div class="col-sm-3 ">
                  <form action="?page=update" method="POST">
                    <button class="btn btn-success" type="submit" name="update" value="<?= $row['id'] ?>">
                      Editar
                    </button>
                  </form>
                </div>

                <div class="col-sm-3">
                  <form action="?page=deletar" method="POST">
                    <button onclick="return confirm('Tem certeza que deseja excluir?')" class="btn btn-danger" type="submit" name="delete" value="<?= $row['id'] ?>">
                      Deletar
                    </button>
                  </form>
                </div>

              </div>
            </td>

          </tr>

        <?php
        }

        // termina aqui
        ?>
      </tbody>
      </table>
  </div>
  <?php if (isset($_SESSION['message-update'])) : ?>
    <h5 class=" alert alert-success container-sm"><?= $_SESSION['message-update'] ?></h5>

  <?php
    unset($_SESSION['message-update']);
  endif;
  ?>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>