<?php

use src\model\Produto;

$resultados = ' ';

foreach ($produtos as $produto) {
  $resultados.= '
    <tr>
      <td>' . $produto->nome . '</td>
      <td>' . $produto->quantidade . '</td>
      <td>' . $produto->categoria . '</td>
      <td>
        <button type="button" class="btn btn-primary">
          <a class="nav-link" href="editar.php?id=' . $produto->id . '">
            Editar
          </a>
        </button>

        <a href="deletar.php?id= ' .$produto->id . '">
          <button type="button" class="btn btn-danger">Excluir</button>
        </a>

      </td>
    </tr>
  ';
}
$resultados=strlen($resultados)? $resultados : '<tr>
  <td colspan="6" class="text-center">Nenhum produto encontrado</td>
</tr>';


?>

<main>

  <section class="container-sm">

    <table class="table table-striped table-hover table-bordered mt-3">

      <thead>
        <tr>
          <td>Nome</td>
          <td>Quantidade</td>
          <td>Categoria</td>
          <td>Ações</td>
        </tr>
      </thead>
      <tbody>
        <?= $resultados ?>
      </tbody>



    </table>



  </section>

</main>