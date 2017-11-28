<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Gestor de recursos</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="<?php echo base_url();?>cadastro/menuPrincipal">Menu principal</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Opções <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#" data-toggle="modal" data-target="#produtos">Nota fiscal de entrada</a></li>
						<li><a href="#" data-toggle="modal" data-target="#cadForn">Cadastrar fornecedor</a></li>
						<li><a href="#" data-toggle="modal" data-target="#contasReceber">Contas a receber</a></li>
						<li><a href="#" data-toggle="modal" data-target="#contasPagar">Contas a pagar</a></li>
					</ul>
				</li>
				<li><a href="<?php echo base_url();?>cliente/Cliente">Meus clientes</a></li>
				<li><a href="<?php echo base_url();?>cliente/Fornecedor">Meus fornecedores</a></li>
			</ul>
		</div>
	</nav>
</body>
</html>