<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <title>CRUD - produtos</title>
</head>

<body>
  <script src="js/bootstrap.bundle.min.js"></script>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid m-2">
      <a class="navbar-brand" href="index.php">Cadastro de produtos</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class=" navbar-collapse collapse" id="navbarNav">

        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="?page=home">Cadastrar </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="?page=listar-prod">Listar produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=fornecedores">Listar fornecedores</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
  <br>

  <div class="container">
    <?php 
    include ("connection.php");
    switch($_REQUEST["page"]){
      case "home": 
        include("home.php");
        break;
      
      case "listar-prod":
        include("listar.php");
        break;

      case "fornecedores":
        include("fornecedores.php");
        break;

      case "cadastrar":
        include("cadastrar.php");
        break;

      case "update":
        include("update.php");
        break;

      case "code-update":
        include("code-update.php");
        break;

      case "deletar":
        include("deletar.php");
        break;


      default: 
      print"<h1>Bem vindo!</h1>";
    }
    ?>
  </div>