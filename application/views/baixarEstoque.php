<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery.mask.js');?>" ></script>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery.mask.min.js');?>" ></script>
	
	<style type="text/css">

	input[type=text]{
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
	}

	.button {
		background-color: #4CAF50;
		color: white;
		padding: 6px 20px;
		margin: 7px 0;
		border: 2px solid;
		border-radius: 25px;
		cursor: pointer;
		width: 100%;
		}	}

		button:hover {
			opacity: 0.8;
		}
	</style>
</head>
<body>

	<div class="container">

		<h3 align="center">Editar fornada</h3>
		<br />
		<hr />
		<form name="cadProds" action="<?php echo base_url();?>cadastro/alterarFornada" method="post">
			<label>Produto</label>
			<input type="text" name="tipoProduto" value="<?php echo $fornada->tipoProduto;?>" readonly>
			<label>Quantidade produzida</label>
			<input type="text"  name="qtdProduzida" required value="<?php echo $fornada->qtdProduzida;?>">
			<label>Data da fornada</label>
			<input type="text" name="dataFornada" value="<?php echo $fornada->dataFornada;?>" readonly>
			<input type="hidden" name="ID" value="<?php echo $fornada->ID;?>">
			<br />
			<br />
			Código: <?php echo $fornada->ID;?>
			
			<br />
			<br />
			<button type="submit" class="button">Finalizar</button>
			<hr />
		</form>
	</div>
</body>
</html>