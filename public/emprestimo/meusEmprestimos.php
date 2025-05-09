<?php
session_start();
include_once __DIR__ . '/../../config/conexao.php';
$conexao = connectBanco();

if (!isset($_SESSION['id'])) {
    echo "Usuário não logado!";
    exit;
}

$id = $_SESSION['id'];

$sql = "SELECT e.id_emprestimo, i.nome_item, i.descricao_item, e.data_emprestimo, e.prazo_emprestimo
        FROM emprestimos e
        JOIN item i ON e.id_item = i.id_item
        WHERE e.id = $id AND e.status_emprestimo = 'emprestado'";

$result = mysqli_query($conexao, $sql);
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
    <h1 class="text-white m-4">Meus Empréstimos </h1>
    <table class="table">
        <thead>
            <tr>
                <th>Item</th>
                <th>Descrição</th>
                <th>Data Empréstimo</th>
                <th>Prazo</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $row['nome_item'] ?></td>
                    <td><?= $row['descricao_item'] ?></td>
                    <td><?= $row['data_emprestimo'] ?></td>
                    <td><?= $row['prazo_emprestimo'] ?></td>
                    <td>
                        <form action="devolverEmprestimo.php" method="POST">
                            <input type="hidden" name="id_emprestimo" value="<?= $row['id_emprestimo'] ?>">
                            <button type="submit" class="btn btn-warning">Devolver</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>