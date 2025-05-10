<?php
session_start();
require __DIR__ . '../../../config/conexao.php';
$conexao = connectBanco();

if (!isset($_SESSION['username'])) {
    header('Location: ' . BASE_URL . 'public/user/login.php');
    exit;
}

$user_id = $_SESSION['id']; // ou $_SESSION['id'] dependendo de como salva o login

$sql = "SELECT e.*, i.nome_item, i.categoria_item 
        FROM emprestimos e 
        INNER JOIN item i ON e.id_item = i.id_item 
        WHERE e.id = $user_id 
        ORDER BY e.data_emprestimo DESC";

$resultado = mysqli_query($conexao, $sql);
?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Meu Histórico</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include '../includes/sidebar.php'; ?>
  <div class="container mt-5">
    <h2 class="mb-4 text-white">Histórico de Empréstimos</h2>

    <?php if (mysqli_num_rows($resultado) > 0): ?>
      <table class="table table-bordered bg-white">
        <thead>
          <tr>
            <th>Item</th>
            <th>Categoria</th>
            <th>Data do Empréstimo</th>
            <th>Prazo</th>
            <th>Status</th>
            <th>Devolução</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($resultado)): ?>
            <tr>
              <td><?= $row['nome_item'] ?></td>
              <td><?= $row['categoria_item'] ?></td>
              <td><?= date('d/m/Y', strtotime($row['data_emprestimo'])) ?></td>
              <td><?= date('d/m/Y', strtotime($row['prazo_emprestimo'])) ?></td>
              <td><?= ucfirst($row['status_emprestimo']) ?></td>
              <td>
                <?= $row['data_devolucao'] ? date('d/m/Y', strtotime($row['data_devolucao'])) : '-' ?>
              </td>
              <td>
                <?php if ($row['status_emprestimo'] === 'emprestado'): ?>
                  <form action="<?= BASE_URL ?>public/emprestimo/devolverEmprestimo.php" method="POST">
                    <input type="hidden" name="id_emprestimo" value="<?= $row['id_emprestimo'] ?>">
                    <button type="submit" class="btn btn-success btn-sm">Devolver</button>
                  </form>
                <?php else: ?>
                  <span class="text-success">Devolvido</span>
                <?php endif; ?>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p class="text-white">Você ainda não fez nenhum empréstimo.</p>
    <?php endif; ?>
  </div>
</body>
</html>