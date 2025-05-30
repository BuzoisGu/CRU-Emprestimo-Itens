<?php
session_start();
include_once __DIR__ . '/../../config/conexao.php';

$conexao = connectBanco();
if (!isset($_GET['id_item'])) {
    echo "ID do usuário não fornecido.";
    exit();
}

$idItem = $_GET['id_item'];
$sql = "SELECT * FROM item WHERE id_item = '$idItem'";
$resultado = mysqli_query($conexao, $sql);
if (mysqli_num_rows($resultado) > 0) {
    $item = mysqli_fetch_assoc($resultado);
} else {
    echo "Usuário não encontrado.";
    exit();
}
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <body>
    <?php include '../includes/sidebar.php'; ?>
    <div class="container py-5">
      <h1 style="color: white;">Editar Item</h1>
      <form action="<?= BASE_URL ?>public/item/updateItem.php" method="POST" class="text-white">
          <input type="hidden" name="id_item" value="<?= $item['id_item'] ?>">
          <div class="form mb-3 w-75 pt-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome_item" name="nome_item" value="<?= $item['nome_item'] ?>" >
          </div>

          <div class="mb-3 w-75">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao_item" name="descricao_item" rows="3"><?= $item['descricao_item'] ?></textarea>
          </div>

          <div class="mb-3 w-75">
            <label for="categoria">Categoria</label>
            <select id="categoria" name="categoria_item" class="form-control">
              <option value="" disabled>Escolha uma categoria</option>
              <option value="livro" <?= $item['categoria_item'] == 'livro' ? 'selected' : '' ?>>Livro</option>
              <option value="ferramenta" <?= $item['categoria_item'] == 'ferramenta' ? 'selected' : '' ?>>Ferramenta</option>
              <option value="eletronico" <?= $item['categoria_item'] == 'eletronico' ? 'selected' : '' ?>>Eletrônico</option>
              <option value="movel" <?= $item['categoria_item'] == 'movel' ? 'selected' : '' ?>>Móvel</option>
              <option value="outros" <?= $item['categoria_item'] == 'outros' ? 'selected' : '' ?>>Outros</option>
            </select>
          </div>

            <div class="mb-3 w-75">
            <label for="status">Status</label>
            <select id="status" name="status_item" class="form-control">
              <option value="" disabled>---</option>
              <option value="disponivel" <?= $item['status_item'] == 'disponivel' ? 'selected' : '' ?>>Disponível</option>
              <option value="emprestado" <?= $item['status_item'] == 'emprestado' ? 'selected' : '' ?>>Emprestado</option>
            </select>
          </div>
          
          <button type="submit" name="atualizar" class="btn btn-primary">Salvar Alterações</button>
          <a href="<?= BASE_URL ?>public/item/itens.php" class="btn btn-secondary ms-2">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>