<?php
session_start();
require 'config.php';
require 'classes/usuarios.class.php';
require 'classes/documentos.class.php';
require 'header.php';

if(empty($_SESSION['logado'])) {
	header("Location: login.php");
	exit;
}

$usuarios = new Usuarios($pdo);
$usuarios->setUsuario($_SESSION['logado']);

$documentos = new Documentos($pdo);
$lista = $documentos->getDocumentos();

?>
<!DOCTYPE html>
<html lang="pt-br">
<body>
<div class="container">
<h1>Sistema</h1>

<?php if($usuarios->temPermissao("ADD")): ?>
	<a href="">Adicionar Documento</a>
<?php endif; ?>

<?php if($usuarios->temPermissao("SECRET")): ?>
	<a href="/estudo/secreto.php">Página Secreta</a>
<?php endif; ?>
<a href="/estudo/disconnect.php">Deslogar</a>

<table class="table table-bordered">
	<tr>
		<th>Nome do Arquivo</th>
		<th>Ações</th>
	</tr>
	<?php foreach($lista as $item): ?>
		<tr>
			<td><?php echo utf8_encode($item['titulo']); ?></td>
			<td>
				<?php if($usuarios->temPermissao("EDIT")): ?>
					<a href="">Editar</a>
				<?php endif; ?>

				<?php if($usuarios->temPermissao("DEL")): ?>
					<a href="">Excluir</a>
				<?php endif; ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
</div>
</body>
</html>