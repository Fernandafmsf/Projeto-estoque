<main>
  <section class="container-sm">
    <h2><?= $TITLE ?></h2>

    <form method="POST">

      <div class="mb-3">
        <label for="name">Produto: </label>
        <input type="text" name="nome" class="form-control" value="<?= $editProduto->nome ?>">
      </div>

      <div class="mb-3">
        <label for="name">Quantidade:</label>
        <input type="number" name="quantidade" class="form-control" value="<?= $editProduto->quantidade ?>">
      </div>

      <div class="mb-3">
        <label for="categoria">Categoria do produto</label>
        <input type="text" name="categoria" class="form-control" value="<?= $editProduto->categoria ?>" readonly>
      </div>

      <div>
        <button type="submit" name="cadastrar" class="btn btn-success">Cadastrar</button>
      </div>

    </form>
  </section>
</main>