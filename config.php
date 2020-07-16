<?php
try {
	$pdo = new PDO("mysql:dbname=projeto_permissao;host=localhost", "mateus", "");
} catch(PDOException $e) {
	echo "Erro: ".$e->getMessage();
	exit;
}
?>