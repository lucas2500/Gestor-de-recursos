<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="<?php echo base_url('assets/confirm.js');?>"></script>
	<style type="text/css">

	input[type=text] {
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
	}

	.upper{

		text-transform: uppercase;

	}
</style>
</head>
<body>
	<div class="container-fluid">
		<h3 align="center">Editar registro do cliente</h3>
		<div class="container" style="margin-top: 4%; margin-bottom: 5%;">
			<form action="<?php echo base_url();?>cliente/cadCliente" method="post">
				<input type="text" class="upper" name="nome" id="nome" required="" value="<?php echo $cliente->nome;?>">
				<input type="text" name="cnpj" id="cnpj" required="" value="<?php echo $cliente->cnpj;?>">
				<input type="text" name="telefone" id="telefone" required="" value="<?php echo $cliente->telefone;?>">
				<input type="text" class="upper" name="rua" id="rua" required="" value="<?php echo $cliente->rua;?>">
				<input type="text" class="upper" name="cidade" id="cidade" required="" value="<?php echo $cliente->cidade;?>">
				<input type="text" class="upper" name="bairro" id="bairro" required="" value="<?php echo $cliente->bairro;?>">
				<input type="text" name="cep" id="cep" required="" value="<?php echo $cliente->cep;?>">
				<input type="hidden" name="ID" value="<?php echo $cliente->ID;?>">
				<br />
				<br />
				<div align="right">
					<button class="btn btn-success" type="submit" onclick="return confirmEdit()">Atualizar registro</button>
				</div>	
			</form>
		</div>
	</div>
</body>
</html>