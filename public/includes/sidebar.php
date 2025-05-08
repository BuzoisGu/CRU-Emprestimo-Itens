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
      padding: 15px;  
      display: block;
      text-decoration: none;
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
      <a href="#">Início</a>
      <a href="#">Itens</a>
      <a href="#">Meus Empréstimos</a>
      <a href="#">Meu Histórico</a>
    </div>
    <div class="sair">
      <a href="#">Sair</a>
    </div>
  </div>
</body>