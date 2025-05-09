<?php
include_once __DIR__ . '../../../config/conexao.php';
$conexao = connectBanco();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tipo = $_POST['tipo'];

    $sql = "UPDATE usuarios SET nome= '$nome', email= '$email', tipo='$tipo' WHERE id = '$id'";
    if (mysqli_query($conexao, $sql)) {
        header('Location: ' . BASE_URL . 'public/index.php');
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }
} else {
    header('Location: ' . BASE_URL . 'public/index.php');
    exit();
}