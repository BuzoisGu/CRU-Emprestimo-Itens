<?php
include_once '../../config/conexao.php';
$conexao = connectBanco();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['nome'];
        $_SESSION['tipo'] = $row['tipo'];
        header('Location: ../index.php');
        exit();
    } else {
        echo '<div class="alert alert-danger">Email ou senha incorretos!</div>';
    }
}