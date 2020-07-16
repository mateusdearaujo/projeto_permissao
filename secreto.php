<?php
session_start();
require 'config.php';
require 'classes/usuarios.class.php';
require 'header.php';

if(empty($_SESSION['logado'])) {
	header("Location: login.php");
	exit;
}

$usuarios = new Usuarios($pdo);
$usuarios->setUsuario($_SESSION['logado']);

if(!$usuarios->temPermissao("SECRET")) {
	header("Location: index.php");
	exit;
}
?>
<h1>Página Secreta</h1>