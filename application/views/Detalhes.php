<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="container-fluid">
		<h3 align="center">Recibo de compra</h3>
		<div class="container" style="margin-top: 4%;">
			<table class="table">
				<tbody>
					<tr>
						<td>PANDEL ALIMENTOS LTDA</td>
						<td><?php echo $detalhes->ID;?></td>
					</tr>
				</tbody>
			</table>

			<table class="table">
				<label>Cliente</label>
				<tbody>
					<tr>
						<td style="text-transform: uppercase; size: 10%;"><?php echo $detalhes->nomeCliente;?></td>
						<td><?php echo "R$ ". $detalhes->valorTotal;?></td>
						<td><?php echo $detalhes->dataVenda;?></td>
					</tr>

					<br />
				</tbody>
			</table>

			<table class="table">
				<label>Endereço</label>
				<tbody>
					<tr>
						<td style="text-transform: uppercase;"><?php echo $detalhes->rua;?></td>
						<td style="text-transform: uppercase;"><?php echo $detalhes->cidade;?></td>
						<td style="text-transform: uppercase;"><?php echo $detalhes->bairro;?></td>
						<td><?php echo $detalhes->cep;?></td>
					</tr>

					<br />
				</tbody>
			</table>

			<div>
				<label>Detalhes da compra</label>
				<br />	
				<textarea class="form-control" rows="5" readonly=""><?php echo $detalhes->descricao;?></textarea>
			</div>
		</div>
		<hr />
	</div>
</body>
</html>