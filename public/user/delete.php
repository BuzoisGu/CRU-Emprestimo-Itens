<?php
include_once __DIR__ . '../../../config/conexao.php';
$conexao = connectBanco();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];

    $sql = "delete from usuarios where id = '$id'";
    if (mysqli_query($conexao, $sql)) {
      header('Location: ' . BASE_URL . 'public/index.php');
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }
} else {
    header('Location: ' . BASE_URL . 'public/index.php');
    exit();
}