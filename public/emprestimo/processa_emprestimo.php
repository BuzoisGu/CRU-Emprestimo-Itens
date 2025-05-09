<?php
include_once __DIR__ . '/../../config/conexao.php';
session_start();

$conexao = connectBanco();

if (isset($_POST['id_item'], $_POST['data_emprestimo'], $_POST['prazo_emprestimo']) && isset($_SESSION['id'])) {
    $idItem = $_POST['id_item'];
    $id = $_SESSION['id'];
    $dataEmprestimo = $_POST['data_emprestimo'];
    $prazoEmprestimo = $_POST['prazo_emprestimo'];

    $sql = "INSERT INTO emprestimos (id, id_item, data_emprestimo, prazo_emprestimo) 
            VALUES ('$id', '$idItem', '$dataEmprestimo', '$prazoEmprestimo')";

    if (mysqli_query($conexao, $sql)) {
        $sqlUpdate = "UPDATE item SET status_item = 'emprestado' WHERE id_item = '$idItem'";
        mysqli_query($conexao, $sqlUpdate);
        header('Location: '. BASE_URL .'public/item/itens.php');
        
    } else {
        echo "Erro ao processar empréstimo: " . mysqli_error($conexao);
    }
} else {
    header('Location: '. BASE_URL .'public/emprestimo/cadastroEmprestimo.php');
    exit();
}
?>
