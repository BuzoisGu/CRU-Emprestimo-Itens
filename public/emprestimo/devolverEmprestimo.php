<?php
session_start();
include_once __DIR__ . '/../../config/conexao.php';
$conexao = connectBanco();

if (!isset($_SESSION['id'])) {
    echo "Usuário não logado!";
    exit;
}

if (isset($_POST['id_emprestimo'])) {
    $idEmprestimo = $_POST['id_emprestimo'];

    // Atualiza o status do empréstimo para 'devolvido'
    $sqlUpdateEmprestimo = "UPDATE emprestimos SET status_emprestimo = 'devolvido' WHERE id_emprestimo = $idEmprestimo";
    $resultUpdateEmprestimo = mysqli_query($conexao, $sqlUpdateEmprestimo);

    // Verifica se a atualização do empréstimo foi bem-sucedida
    if ($resultUpdateEmprestimo) {
        // Agora, atualizar o status do item para 'disponível'
        $sqlUpdateItem = "UPDATE item SET status_item = 'disponivel' WHERE id_item = (SELECT id_item FROM emprestimos WHERE id_emprestimo = $idEmprestimo)";
        $resultUpdateItem = mysqli_query($conexao, $sqlUpdateItem);

        if ($resultUpdateItem) {
            header('Location: ' . BASE_URL . 'public/emprestimo/meusEmprestimos.php'); // Redireciona de volta para a página dos empréstimos
        } else {
            echo "Erro ao atualizar o status do item: " . mysqli_error($conexao);
        }
    } else {
        echo "Erro ao atualizar o empréstimo: " . mysqli_error($conexao);
    }
} else {
    echo "Requisição inválida!";
}
?>
