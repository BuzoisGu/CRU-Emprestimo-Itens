<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">
</head>

<body>
    <?php include_once '../admin/navbar.php'; ?>
    <div class="container py-5">
        <h2 class="text-center">Atualiza Usuários</h2>
        <form action="update.php" method="POST">
            <div class="mb-3 w-25">
                <label for="id" class="form-label">Id</label>
                <input type="text" class="form-control" id="id" name="id">
            </div>
            <div class="mb-3 w-75">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome">
            </div>
            <p><a class="link-offset" href="cadastro.php">Cadastrar</a> | <a class="link-offset" href="deletar.php">Excluir</a></p>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous"></script>
</body>

</html>