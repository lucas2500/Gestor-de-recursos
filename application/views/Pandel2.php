<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Financeiro</title>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery.mask.js');?>" ></script>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery.mask.min.js');?>" ></script>
	<script type="text/javascript" src="<?php echo base_url('assets/confirm.js');?>"></script>

	<link href="<?php echo base_url('assets/css/bootstrap-datepicker.css');?>" rel="stylesheet"/>
	<script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js');?>"></script> 
	<script src="<?php echo base_url('assets/js/bootstrap-datepicker.pt-BR.min.js');?>" charset="UTF-8"></script>
	<script src="<?php echo base_url('assets/pandel2.js');?>"></script>

	<style type="text/css">

	td{
		background-color: #F8F8FF;
	}

	select{

		width: 40%;
		margin: 1%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}

	.input2[type=text] {
		width: 30%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
	}

	input[type=text] {
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
	}

	body{

		overflow-x: hidden;
		overflow-y: scroll;

	}

	.upper{

		text-transform: uppercase;	
	}

</style>

</head>
<body onload="contaLinha()">

	<hr />

	<div class="container" align="left">

		<h4>Vendas efetuadas</h4>

		<!-- <br /> -->

		<select required class="select" name="mes" id="mes" onchange="myFunction2()">
			<option value="">FILTRAR POR MÊS</option>
			<option value="/01">JANEIRO</option>
			<option value="/02">FEVEREIRO</option>
			<option value="/03">MARÇO</option>
			<option value="/04">ABRIL</option>
			<option value="/05">MAIO</option>
			<option value="/06">JUNHO</option>
			<option value="/07">JULHO</option>
			<option value="/08">AGOSTO</option>
			<option value="/09">SETEMPRO</option>
			<option value="/10">OUTUBRO</option>
			<option value="/11">NOVEMBRO</option>
			<option value="/12">DEZEMBRO</option>
		</select>

		<input type="text" id="pesquisarCliente" class="input2" onkeyup="myFunction()" placeholder="BUSCAR CLIENTE" style="margin: 1%;">
	</div>

	<br />

	<div class="container">
		<table class="table table-bordered" id="cliente">

			<thead>

				<tr>
					<th>Cliente</th>
					<th>Valor da venda</th>
					<th>Data da venda</th>
					<th>Detalhes</th>
					<th>Excluir</th>
				</tr>
				<tbody>

					<?php
					foreach($quitVendas as $VENDAS){ 

						echo "<tr>";
						echo "<td style='text-transform: uppercase;'>".$VENDAS->nomeCliente."</td>";
						echo "<td>R$ ".$VENDAS->valorTotal."</td>";
						echo "<td>".$VENDAS->dataVenda."</td>";
						echo '<td><a href = "/cadastro/verCompra/'.$VENDAS->ID.'"<button class = "btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span></button></td>';
						echo '<td><a href = "/cadastro/deleteVenda/'.$VENDAS->ID.'"<button class = "btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>';
						"</td>";
						
						echo "</tr>";

					}

					?>

				</tbody>
			</thead>
		</table>
		<p id="demo"></p>
	</div>

	<!-- MODAL DUPLICATAS -->

	<div class="modal fade" id="produtos" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Dados da nota</h4>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url();?>cadastro/Duplicatas" method="post">

						<select required class="select" name="nomeForn" id="nomeForn" style="text-transform: uppercase;">
							<option value="">Selecionar fornecedor</option>

							<?php 

							foreach($forn as $FORN){

								echo "<option style='text-transform: uppercase;' value='".$FORN->nome."'>".$FORN->nome."</option>'";	
							}
							?>
						</select>
						<br />
						<br />

						<div class="form-group">
							<textarea class="form-control" placeholder="DESCRIÇÃO DA COMPRA" name="descricao" rows="5" id="comment"></textarea>
						</div>
						<input type="text" placeholder="R$ VALOR TOTAL" name="valorTotal" id="valorCompra" required="">
						<input type="text" placeholder="DATA DA COMPRA" name="dtCompra" id="dtCompra" required="">
						<input type="text" placeholder="DATA DE VENCIMENTO" name="dtVencimento" id="dtVencimento" required="">
						<br />
						<br />
						<div class="modal-footer">
							<button class="btn btn-success" onclick="cadDuplicata()" type="submit">Cadastrar</button>
						</div>
					</form>

					<form name="cadProds" action="<?php echo base_url();?>cliente/entradaEstoque" method="post">
						<h4>Atualizar estoque</h4>
						
						<select required class="select" name="codProd" id="codProd" style="text-transform: uppercase;">
							<option value="">Selecionar produto</option>

							<?php 

							foreach($produto as $PROD){

								echo "<option style='text-transform: uppercase;' value='".$PROD->ID."'>".$PROD->nomeProd."</option>'";	
							}
							?>
						</select>

						<input type="text" name="qtdAdqui" id="qtdAdqui" onfocus="startCalc2()" onblur="stopCalc2()" placeholder="QUANTIDADE ADQUIRIDA" required="">
						<input type="text" name="peso" id="peso" onfocus="startCalc2()" onblur="stopCalc2()" placeholder="PESO" required="">
						<input type="hidden" name="totalKg" id="totalKg" required="">
					</div>
					<div class="modal-footer">
						<button class="btn btn-success" style="margin-right: 1%;" onclick="updateEstoque()" type="submit">Atualizar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->

	<!-- MODAL CONTAS A PAGAR -->

	<div class="modal fade" id="contasPagar" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Aguardando pagamento</h4>
				</div>
				<div class="modal-body">

					<table class="table table-bordered">

						<thead>
							<tr>
								<th>Fornecedor</th>	
								<th>Valor</th>
								<th>Data da compra</th>
								<th>Vencimento</th>
								<th>Confirmar PGMT</th>		
							</tr>
						</thead>
						<tbody>
							<?php 
							$contador = 0;
							foreach($duplicata as $DUPLICATAS){

								echo "<tr>";

								echo "<td style='text-transform: uppercase;'>".$DUPLICATAS->nomeForn."</td>";
								echo "<td>R$ ".$DUPLICATAS->valorTotal."</td>";
								echo "<td>".$DUPLICATAS->dtCompra."</td>";
								echo "<td>".$DUPLICATAS->dtVencimento."</td>";
								echo '<td><a href = "/cadastro/quitarCompras/'.$DUPLICATAS->ID.'"<button class = "btn btn-success"><span class="glyphicon glyphicon-ok-circle"></span></button></a>';
								"</tr>";

								echo "</tr>";
								$contador++;


							}
							?>
						</tbody>
					</table>
					<div class="row" align="left">
						<div class="col-md-12">
							Total de compras em aberto: <?php echo $contador ?>
						</div>
					</div> 

					<hr />

					<h4>Quitadas</h4>

					<table class="table table-bordered">

						<thead>

							<tr>
								<th>Fornecedor</th>	
								<th>Valor</th>
								<th>Data da compra</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tbody>

							<?php 
							$contador = 0;
							foreach($compras as $COMPRAS){

								echo "<tr>";

								echo "<td style='text-transform: uppercase;'>".$COMPRAS->nomeForn."</td>";
								echo "<td>R$ ".$COMPRAS->valorTotal."</td>";
								echo "<td>".$COMPRAS->dtCompra."</td>";
								echo '<td><a href = "/cadastro/deleteCompra/'.$COMPRAS->ID.'"<button class = "btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>';
								"</td>";

								echo "</tr>";
								$contador++;
							}
							?>
						</tbody>
					</table>
					<div class="row" align="left">
						<div class="col-md-12">
							Total de compras realizadas: <?php echo $contador ?>
						</div>
					</div> 
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->

	<!-- MODAL CONTAS A RECEBER -->

	<div class="modal fade" id="contasReceber" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Contas a receber</h4>
				</div>
				<div class="modal-body">

					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Cliente</th>
								<th>Valor</th>
								<th>Data da compra</th>
								<th>Confirmar PGMT</th>
							</tr>
						</thead>	

						<tbody>
							<?php
							$contador = 0;
							foreach($vendas as $VENDAS){ 

								echo "<tr>";
								echo "<td style='text-transform: uppercase;'>".$VENDAS->nomeCliente."</td>";
								echo "<td>R$ ".$VENDAS->valorTotal."</td>";
								echo "<td>".$VENDAS->dataVenda."</td>";
								echo '<td><a href = "/cadastro/quitarVendas/'.$VENDAS->ID.'"<button class = "btn btn-success"><span class="glyphicon glyphicon-ok-circle"></span></button></a>';
								"</td>";

								echo "</tr>";
								$contador++;

							}

							?>
						</tbody>
					</table>
					<div class="row" align="left">
						<div class="col-md-12">
							Total de vendas em aberto: <?php echo $contador ?>
						</div>
					</div> 
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->

	<!-- MODAL PARA CADASTRAR FORNECEDORES -->

	<div class="modal fade" id="cadForn" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Cadastrar fornecedor</h4>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url();?>cliente/cadForn" method="post">
						<label>Dados do fornecedor</label>
						<input type="text"  placeholder="NOME DO FORNECEDOR" id="nome" name="nome" class="upper" required="">
						<input type="text" placeholder="CPF/CNPJ" name="cnpj" id="rzSocial" required="">
						<input type="text" placeholder="TELEFONE" name="telefone" id="telefone" required="">
					</div>
					<div class="modal-footer">
						<button type="submit" onclick="return cadForn()" class="btn btn-success">Cadastrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->


	<script type="text/javascript">

		$('#dtCompra').datepicker({	
			format: "dd/mm/yyyy",	
			language: "pt-BR",
			// startDate: '+0d',
		});

		$('#dtVencimento').datepicker({	
			format: "dd/mm/yyyy",	
			language: "pt-BR",
			// startDate: '+0d',
		});


	</script>
</body>
</html>