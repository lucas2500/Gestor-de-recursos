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
		<h3>Fornecedores cadastrados</h3>
		<br />
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nome</th>
					<th>CNPJ</th>
					<th>Telefone</th>
					<th>Código</th>
					<th>Excluir</th>
				</tr>
			</thead>
			<tbody>
				<?php

				foreach($fornecedor as $FORN){

					echo "<tr>";
					echo "<td style='text-transform: uppercase;'>".$FORN->nome."</td>";
					echo "<td>".$FORN->cnpj."</td>";
					echo "<td>".$FORN->telefone."</td>";
					echo "<td>".$FORN->ID."</td>";
					echo '<td><a href = "/cliente/deleteForn/'.$FORN->ID.'" <button class = "btn btn-danger" onclick ="return deleteForn()"><span class="glyphicon glyphicon-trash"></span></button></a>';
					echo "</tr>";

				} 
				?>
			</tbody>
		</table>
	</div>
</body>
</html>