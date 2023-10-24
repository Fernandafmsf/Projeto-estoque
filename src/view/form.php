<?php

use src\controller\controller;
?>
<main>
  <section class="container-sm">
    <h2><?= $TITLE ?></h2>

    <form method="POST">

      <div class="mb-3">
        <label for="name">Produto: </label>
        <input type="text" name="nome" class="form-control">
      </div>

      <div class="mb-3">
        <label for="name">Quantidade:</label>
        <input type="number" name="quantidade" class="form-control">
      </div>

      <div class="mb-3">
        <label for="categoria">Categoria do produto</label>
        <select class="form-select" name="categoria" id="categoria">
          <option>Selecione...</option>
          <option value="Informatica">Informatica</option>
          <option value="Mercearia">Mercearia</option>
          <option value="Brinquedo">Brinquedo</option>
          <option value="Maquiagem">Maquiagem</option>
        </select>
      </div>

      <div>
        <button type="submit" name="cadastrar" class="btn btn-success">Cadastrar</button>
      </div>

    </form>
  </section>
</main>

