<?php
session_start();

if (!isset($_SESSION['tipo'])) {
    header('Location: ' . BASE_URL . 'public/user/login.php');
    exit();
}

function isAdmin() {
    return isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'admin';
}

function isUser() {
    return isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'user';
}
