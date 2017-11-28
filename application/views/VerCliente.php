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
		<h3 align="center">Detalhes do cliente</h3>
		<div class="container" style="margin-top: 4%;">
			<table class="table">
				<label>Cliente</label>
				<tbody>
					<tr>
						<td style="text-transform: uppercase; size: 10%;"><?php echo $cliente->nome;?></td>
						<td style="text-transform: uppercase; size: 10%;"><?php echo $cliente->cnpj;?></td>
						<td style="text-transform: uppercase; size: 10%;"><?php echo $cliente->telefone;?></td>
					</tr>

					<br />
				</tbody>
			</table>
			<table class="table">
				<label>Endereço</label>
				<tbody>
					<tr>
						<td style="text-transform: uppercase;"><?php echo $cliente->rua;?></td>
						<td style="text-transform: uppercase;"><?php echo $cliente->cidade;?></td>
						<td style="text-transform: uppercase;"><?php echo $cliente->bairro;?></td>
						<td><?php echo $cliente->cep;?></td>
					</tr>
					<br />
				</tbody>
			</table>
		</div>
		<hr />
	</div>
</body>
</html>