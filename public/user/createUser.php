<?php
include_once '../../config/conexao.php';
$conexao = connectBanco();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$password')";
    if (mysqli_query($conexao, $sql)) {
        echo "Cadastro realizado com sucesso!";
        header('Location: ../index.php');
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }
} else {
    header('Location: cadastro.php');
    exit();
}