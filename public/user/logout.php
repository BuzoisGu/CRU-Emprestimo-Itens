<?php
include_once __DIR__ . '../../../config/conexao.php';

session_start();

session_unset();

session_destroy();
  header('Location: ' . BASE_URL . 'public/user/login.php');
exit();