<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery.mask.js');?>" ></script>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery.mask.min.js');?>" ></script>
	<script type="text/javascript" src="<?php echo base_url('assets/confirm2.js');?>"></script>
	
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

		<h3 align="center">Editar produto</h3>
		<br />
		<div align="left">
			<?php echo "Quantidade atual no estoque: ". "<strong>".$produtos->qtdKG." Kg</strong>";?>
			<br />
			<?php echo "Código: ". "<strong>".$produtos->ID. "</strong>";?>	
		</div>
		<hr />
		<form name="cadProds" action="<?php echo base_url();?>cadastro/cadProd" method="post">
			<label>Produto</label>
			<input type="text" style="text-transform: uppercase;" name="nomeProd" id="nomeProd" value="<?php echo $produtos->nomeProd;?>" required >
			<label>Peso unitário</label>
			<input type="text"  name="prodPeso" id="prodPeso" required value="<?php echo $produtos->prodPeso?>" readonly>
			<label>Quantidade mínima em Kg</label>
			<input type="text"  name="qtdMin" id="qtdMin" required value="<?php echo $produtos->qtdMin;?>" required>
			<label>Valor unitário R$</label>
			<input type="text" name="valorUnit" id="valorUnitario" required value="<?php echo $produtos->valorUnit;?>" required>
			<input type="hidden" name="qtdKG" id="qtdAtual" value="<?php echo $produtos->qtdKG;?>">
			<input type="hidden" name="ID" value="<?php echo $produtos->ID;?>">
			<br />
			<br />
			<button type="submit" onclick="return updateProd()" class="button">Finalizar</button>
			<hr />
		</form>
	</div>
</body>

<script type="text/javascript">
	
	$(document).ready(function () { 

		var $seuCampoCpf = $("#valorUnitario");
		$seuCampoCpf.mask('000.000.000.000.000,00', {reverse: true});

		var $seuCampoCpf2 = $("#qtdMin");
		$seuCampoCpf2.mask('000,000,000,000,000,000', {reverse: true});
	});
</script>
</html>