<?php

define('BASE_URL', '/CRU-Emprestimo-Itens/');


define('HOST','127.0.0.1');
define('USUARIO','root');
define('SENHA','');
define('DB','emprestimoitem');

function connectBanco()
{
  $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB);

  if(!$conexao){
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
  }
  return $conexao;
}
connectBanco();
?>