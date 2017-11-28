<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="<?php echo base_url('assets/confirm.js');?>"></script>
	<style type="text/css">
	td{

		background-color: #F8F8FF;

	}
</style>
</head>
<body>
	<div class="container">
		<h3>Clientes cadastrados</h3>
		<br />
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Código</th>
					<th>Detalhes</th>
					<th>Editar</th>
					<th>Excluir</th>
				</tr>
			</thead>
			<tbody>
				<?php

				foreach($cliente as $CLIENTE){

					echo "<tr>";
					echo "<td style='text-transform: uppercase;'>".$CLIENTE->nome."</td>";
					echo "<td>".$CLIENTE->ID."</td>";
					echo '<td><a href = "/cliente/verCliente/'.$CLIENTE->ID.'" <button class = "btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span></button></a>';
					echo '<td><a href = "/cliente/editCliente/'.$CLIENTE->ID.'" <button class = "btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button></a>';
					echo '<td><a href = "/cliente/deleteCliente/'.$CLIENTE->ID.'" <button class = "btn btn-danger" onclick = "return deleteCliente()"><span class="glyphicon glyphicon-trash"></span></button></a>';
					echo "</tr>";

				} 
				?>
			</tbody>
		</table>
	</div>
</body>
</html>