<?php
session_start();
require __DIR__ . '../../config/conexao.php';
$conexao = connectBanco();

$sql = "SELECT * FROM item";
$resultado = mysqli_query($conexao, $sql);

if (!isset($_SESSION['username'])) {
    header('Location: ' . BASE_URL . 'public/user/login.php');
}
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php include 'includes/sidebar.php'; ?>
    <div class="container mt-5">
    <?php if($_SESSION['tipo'] === 'admin') {?>
    <h1 class="text-white mb-5">Usuários Cadastrados</h1>
    <?php include 'includes/mensagem.php'; ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Lista de Usuários
                <a href="adm/usuario_create.php" class="btn btn-dark float-end">Adicionar usuário</a>
              </h4>
            </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Data de Nascimento</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT * FROM usuarios";
                $usuarios = mysqli_query($conexao, $sql);
                if (mysqli_num_rows($usuarios) > 0) {
                  foreach ($usuarios as $usuario) {
                    ?>
                <tr>
                  <td><?= $usuario['id'] ?></td>
                  <td><?= $usuario['nome'] ?></td>
                  <td><?= $usuario['email'] ?></td>
                  <td><?=date('d/m/Y', strtotime($usuario['data_nascimento'])) ?></td>
                  <td><a href="adm/usuario_view.php?id=<?=$usuario['id']?>" class="btn btn-dark btn-sm">Visualizar</a>
                    <a href="includes/atualizar_user.php?id=<?= $usuario['id'] ?>" class="btn btn-sm btn-warning">Editar</a>

                    <form action="<?= BASE_URL ?>public/user/delete.php" method="POST" class="d-inline">
                      <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                      <button type="submit" name="delete_usuario" value="1" class="btn btn-danger btn-sm">
                        Excluir
                      </button>
                    </form>
                  </td>
                </tr>
                <?php
                  }
                } else {
                  echo "<tr><td colspan='4'>Nenhum usuário encontrado</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
          </div>
        </div>
      </div>
      <?php } else { ?>
        <h1 class="text-white m-4">Itens Cadastrados </h1>
        <div class="container py-5">
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
      <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>