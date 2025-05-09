<?php
include_once __DIR__ . '../../../config/conexao.php';
$conexao = connectBanco();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idItem = $_POST['id_item'];
    $nomeItem = $_POST['nome_item'];
    $descricaoItem = $_POST['descricao_item'];
    $categoriaItem = $_POST['categoria_item'];
    $statusItem = $_POST['status_item'];

    $sql = "UPDATE item SET nome_item= '$nomeItem', descricao_item= '$descricaoItem', categoria_item= '$categoriaItem', status_item= '$statusItem' WHERE id_item = '$idItem'";
    if (mysqli_query($conexao, $sql)) {
        header('Location: '. BASE_URL .'public/item/itens.php');
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }
} else {
    header('Location: '. BASE_URL .'public/includes/atualizar_item.php');
    exit();
}