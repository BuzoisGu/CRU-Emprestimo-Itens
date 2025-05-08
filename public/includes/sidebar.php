<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    body {
      min-height: 100vh;
      display: flex;
      background-color: #1d1d1d;
    }
    .sidebar {
      width: 250px;
      height: 100vh;
      background-color: #1b1b1b;
      display: flex;
      flex-direction: column;
    }
    .menus {
      display: flex;
      flex-direction: column;
    }
    .sair {
      margin-top: auto;
    }
    .sair a {
      text-align: center;
      display: block;
      color: white;
      text-decoration: none;
}
    .sidebar a {
      color: white;
      text-decoration: none;
      padding: 15px;  
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .sidebar a:hover {
      background-color:rgb(255, 255, 255);
      color: #8d8d8d;
    }
    .content {
      flex-grow: 1;
      padding: 20px;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h4 class="text-white text-center py-3">Empresta+</h4>
    <div class="menus">
      <a href="#"><i class="fas fa-home"></i> Início</a>
      <a href="#"><i class="fas fa-box"></i> Itens</a>
      <a href="#"><i class="fas fa-book-reader"></i> Meus Empréstimos</a>
      <a href="#"><i class="fas fa-history"></i> Meu Histórico</a>
</div>
<div class="sair">
  <a href="#"><i class="fas fa-sign-out-alt"></i> Sair</a>
</div>
  </div>
</body>