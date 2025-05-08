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
      <h1 style="color: white;">Cadastro de Usuários</h1>
      <form action="createUser.php" method='POST' class="text-white">
        <div class="form mb-3 w-75 pt-3">
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome">
        </div>
        <div class="mb-3 w-75">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3 w-75">
          <label for="password" class="form-label">Senha</label>
          <input type="password" class="form-control " name="password">
        </div>
        <div class="mb-3 ">
          <input type="submit" class="btn btn-success" value="Registrar">
        </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>