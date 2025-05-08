<?php
include_once '../../config/conexao.php';
$conexao = connectBanco();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeItem = $_POST['nome_item'];
    $descricaoItem = $_POST['descricao_item'];
    $categoriaItem = $_POST['categoria_item'];

    $sql = "INSERT INTO item (nome_item, descricao_item, categoria_item) VALUES ('$nomeItem', '$descricaoItem', '$categoriaItem')";
    if (mysqli_query($conexao, $sql)) {
        echo "Cadastro de Item realizado com sucesso!";
        header('Location: ../index.php');
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }
} else {
    header('Location: cadastro.php');
    exit();
}