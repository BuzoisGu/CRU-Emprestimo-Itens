<?php
include_once __DIR__ . '../../../config/conexao.php';
$conexao = connectBanco();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeItem = $_POST['nome_item'];
    $descricaoItem = $_POST['descricao_item'];
    $categoriaItem = $_POST['categoria_item'];
    $statusItem = $_POST['status_item'];

    $sql = "INSERT INTO item (nome_item, descricao_item, categoria_item, status_item) VALUES ('$nomeItem', '$descricaoItem', '$categoriaItem', '$statusItem')";
    if (mysqli_query($conexao, $sql)) {
        echo "Cadastro de Item realizado com sucesso!";
        header('Location: '. BASE_URL .'public/item/itens.php');
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }
} else {
    header('Location: '. BASE_URL .'public/item/cadastroItem.php');
    exit();
}