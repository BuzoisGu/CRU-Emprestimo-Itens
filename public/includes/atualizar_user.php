<?php
session_start();
include_once __DIR__ . '/../../config/conexao.php';

$conexao = connectBanco();
if (!isset($_GET['id'])) {
    echo "ID do usuário não fornecido.";
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($conexao, $sql);
if (mysqli_num_rows($resultado) > 0) {
    $usuario = mysqli_fetch_assoc($resultado);
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
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <body>
    <?php include '../includes/sidebar.php'; ?>
    <div class="container py-5">
      <h1 style="color: white;">Editar Cadastro</h1>
      <form action="<?= BASE_URL ?>public/user/update.php" method="POST" class="text-white">
          <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
          <div class="form mb-3 w-75 pt-3">
            <label for="nome" class="form-label">Novo Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= $usuario['nome'] ?>" >
          </div>

          <div class="mb-3 w-75">
            <label for="email" class="form-label">Novo Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $usuario['email'] ?>" >
          </div>

          <button type="submit" name="atualizar" class="btn btn-primary">Salvar Alterações</button>
          <a href="<?= BASE_URL ?>public/" class="btn btn-secondary ms-2">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>