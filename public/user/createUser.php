<?php
include_once __DIR__ . '../../../config/conexao.php';
$conexao = connectBanco();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
    $password = $_POST['password'];

    $sql = "INSERT INTO usuarios (nome, email, data_nascimento, senha) VALUES ('$nome', '$email', '$data_nascimento', '$password')";
    if (mysqli_query($conexao, $sql)) {
        echo "Cadastro realizado com sucesso!";
        header('Location: ../index.php');
        exit();
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }
} else {
    header('Location: ../index.php');
    echo "Cadastro não realizado!";

    exit();
}