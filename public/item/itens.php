<?php
session_start();
require __DIR__ . '/../../config/conexao.php';
$conexao = connectBanco();

$sql = "SELECT * FROM item";
$resultado = mysqli_query($conexao, $sql);
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Itens</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php include_once __DIR__ . '../../includes/sidebar.php';?>
    <div class="container py-5">
    <h1 class="text-white m-4">Itens Cadastrados </h1>
    <?php if($_SESSION['tipo'] === 'admin') {?>
        <a href="<?= BASE_URL ?>public/item/cadastroItem.php" class="btn btn-light float-end px-5 mt-2">Adicionar Item</a>
    <?php } ?>
    <div class="row">
      <?php while ($item = mysqli_fetch_assoc($resultado)): ?>
        <div class="col-md-4 mb-4" >
          <div class="card" style="width: 300px height" >
            <div class="card-body">
              <h5 class="card-title"><?= $item['nome_item'] ?></h5>
              <p class="card-text"><?= substr($item['descricao_item'], 0, 100) ?></p>
              <p><strong>Categoria:</strong> <?= $item['categoria_item'] ?></p>
              <p><strong>Status:</strong> <?= $item['status_item'] ?></p>

            <?php if ($_SESSION['tipo'] === 'admin'): ?>
              <a href="visualizar_item.php?id=<?= $item['id_item'] ?>" class="btn btn-dark">Visualizar</a>

              <a href="../includes/atualizar_item.php?id_item=<?= $item['id_item'] ?>" class="btn btn-warning btn-sm">Editar</a>

              <form action="<?= BASE_URL ?>public/item/deleteItem.php" method="POST" class="d-inline">
              <input type="hidden" name="id_item" value="<?= $item['id_item'] ?>">
              <button type="submit" name="delete_item" value="1" class="btn btn-danger btn-sm">
                Excluir
              </button>
            </form>
            <?php else: ?>
            <!-- Botão para pegar emprestado -->
              <form action="<?= BASE_URL ?>public/emprestimo/cadastroEmprestimo.php" method="POST" class="d-inline">
                <input type="hidden" name="id_item" value="<?= $item['id_item'] ?>">
                <button type="submit" name="emprestimo_item" value="1" class="btn btn-danger btn-sm"
                <?= $item['status_item'] === 'emprestado' ? 'disabled' : '' ?>>
                <?= $item['status_item'] === 'emprestado' ? 'Indisponível' : 'Empréstimo' ?>
                </button>
              </form>
            <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>