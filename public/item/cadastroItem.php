<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
<?php include '../includes/sidebar.php'; ?>
<div class="container py-5">
    <h1 style="color: white;">Cadastro de Itens</h1>
    <form action="createItem.php" method='POST' class="text-white">
    <div class="form mb-3 w-75 pt-3" style>
        <label for="name" class="form-label">Nome do Item</label>
        <input type="text" class="form-control" id="nome" name="nome_item">
    </div>
    <div class="mb-3 w-75">
        <label for="descricao">Descrição</label><br>
    <textarea id="descricao" name="descricao_item" rows="3" cols="130" style="border-radius: 10px" ></textarea>
    </div>
    <div class="mb-3 w-75">
        <label for="categoria">Categoria</label>
        <select id="categoria" name="categoria" class="form-control">
            <option value="livro">Livro</option>
            <option value="ferramenta">Ferramenta</option>
            <option value="eletronico">Eletrônico</option>
            <option value="movel">Móvel</option>
            <option value="outros">Outros</option>
        </select>
    </div>
    <div class="mb-3 ">
        <input type="submit" class="btn btn-success" value="Cadastrar Item">
    </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>