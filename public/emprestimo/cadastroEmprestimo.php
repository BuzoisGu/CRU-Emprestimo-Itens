<?php
session_start();

include_once __DIR__ . '/../../config/conexao.php';

if (!isset($_SESSION['id'])) {
    echo "<p>Usuário não logado!</p>";
    exit;
}

$conexao = connectBanco();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_item'])) {
    $id_item = $_POST['id_item'];

    $sql = "SELECT * FROM item WHERE id_item = '$id_item'";
    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        $item = mysqli_fetch_assoc($result);
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
<?php include_once __DIR__ . '../../includes/sidebar.php';?>
<div class="container mt-5">
    <h1 style="color: white">Empréstimo do item: <?= $item['nome_item'] ?></h1>
    <form action="processa_emprestimo.php" method="POST">
        <input type="hidden" name="id_item" value="<?= $item['id_item'] ?>">
        <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>"> 

        <div class="mb-3 w-75">
            <label for="data_emprestimo" style="color: white;">Data de Empréstimo:</label>
            <input type="date" name="data_emprestimo" class="form-control" required>
        </div>

        <div class="mb-3 w-75">
            <label for="prazo_emprestimo" style="color: white;">Prazo de Devolução:</label>
            <input type="date" name="prazo_emprestimo" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Confirmar Empréstimo</button>
    </form>
</div>
</body>
</html>
<?php
    } else {
        echo "<p>Item não encontrado!</p>";
    }
    } else {
        echo "<p>Requisição inválida!</p>";
}
?>
