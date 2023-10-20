<main>
  <section class="container m-3">
    <h2>Excluir vaga</h2>

    <form method="post">
      <div class="form-group">
        <p>Deseja deletar o produto <strong><?= $obProduto->nome ?>?</strong></p>
        <p>Dados do produto: </p>
        <ul>
          <li>Quantidade: <?= $obProduto->quantidade ?></li>
          <li>Categoria: <?= $obProduto->categoria ?></li>
        </ul>
      </div>

      <div>
        <button type="button" class="btn btn-success">
          <a href="index.php" class="nav-link">Cancelar</a>
        </button>
        <button type="submit" name="Excluir" class="btn btn-danger">Excluir</button>
      </div>
    </form>

  </section>


</main>