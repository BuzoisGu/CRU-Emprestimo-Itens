<?php
session_start();
include_once __DIR__ . '../../../config/conexao.php';
$conexao = connectBanco();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['nome'];
        $_SESSION['tipo'] = $row['tipo'];
        header('Location: ../index.php');
        exit();
    } else {
        $_SESSION['mensagem'] = 'Email ou senha incorretos!';
        header('Location: ../user/login.php');
        exit();
    }
}