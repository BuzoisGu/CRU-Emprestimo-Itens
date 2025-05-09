<?php
session_start();
require __DIR__ . '../../config/conexao.php';
$conexao = connectBanco();

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
    <div class="container mt-4 py-5">
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
                  <td><a href="" class="btn btn-secondary btn-sm">Visualizar</a>
                    <a href="" class="btn btn-success btn-sm">Editar</a>
                    <form action="" method="POST" class="d-inline">
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>