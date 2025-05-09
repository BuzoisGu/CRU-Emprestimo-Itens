<?php
include_once __DIR__ . '../../../config/conexao.php';
$conexao = connectBanco();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $idItem = $_POST['id_item'];

    $sql = "delete from item where id_item = '$idItem'";
    if (mysqli_query($conexao, $sql)) {
      header('Location: '. BASE_URL .'public/item/itens.php');
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }
} else {
    header('Location: '. BASE_URL .'public/item/itens.php');
    exit();
}