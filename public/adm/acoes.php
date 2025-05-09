<?php
session_start();
require '../../config/conexao.php';
$conexao = connectBanco();

if(isset($_POST['create_usuario'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO usuarios (nome, email, data_nascimento, senha) VALUES ('$nome', '$email', '$data_nascimento', '$senha')";

    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = "Usuário adicionado com sucesso!";
        header("Location: ../index.php");
        exit;
    } else {
        $_SESSION['mensagem'] = "Erro ao adicionar usuário!";
        header("Location: ../index.php");
        exit;
    }
}