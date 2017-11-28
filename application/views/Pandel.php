<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery.mask.js');?>" ></script>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery.mask.min.js');?>" ></script>
	<script type="text/javascript" src="<?php echo base_url('assets/confirm2.js');?>"></script>

	<link href="<?php echo base_url('assets/css/bootstrap-datepicker.css');?>" rel="stylesheet"/>
	<script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js');?>"></script> 
	<script src="<?php echo base_url('assets/js/bootstrap-datepicker.pt-BR.min.js');?>" charset="UTF-8"></script>
	<script src="<?php echo base_url('assets/pandel.js');?>"></script>

	<style type="text/css">

	td{

		background-color: #F8F8FF;

	}

	input[type=text], input[type=password] {
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
	}

	.select{

		width: 40%;
		margin: 1%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}

	.upper{

		text-transform: uppercase;

	}

</style>
</head>
<body>
	<?php

	if(!empty($nomeUser)){

		echo  '<div class="container-fluid" align="left">
		<h6 style="font-family: arial; font-size: 15px; color:#000000; padding: 1px; Text-transform: uppercase; ">Usuário: '.$nomeUser->nome.' / '.$nomeUser->ID. '</h6>
		</div>';

	} else{

		echo "<div align = 'center'><h3>Um erro ocorreu, por favor realize o login novamente!</h3></div>";
		$this->session->unset_userdata('email');

	}
	?>

	<hr />

	<form action="<?php echo base_url();?>cadastro/Fornada" method="post" onsubmit="confirmFornada()">
		<div class="container">
			<select class="select" required="" name="tipoProduto">
				<option value="">SELECIONAR PRODUTO</option>
				<option value="PÃO FRANCÊS CONGELADO">PÃO FRANCÊS CONGELADO</option>
				<option value="PÃO DOCE COMPRIDO CONGELADO">PÃO DOCE COMPRIDO CONGELADO</option>
				<option value="PÃO DOCE CORTADO CONGELADO">PÃO DOCE CORTADO CONGELADO</option>
				<option value="PÃO DOCE ENROLADO CONGELADO">PÃO DOCE ENROLADO CONGELADO</option>
				<option value="PÃO BROTE CONGELADO">PÃO BROTE CONGELADO</option>
				<option value="PÃO CARTEIRA CONGELADO">PÃO CARTEIRA CONGELADO</option>
				<option value="PÃO SEDA CONGELADO">PÃO SEDA CONGELADO</option>
				<option value="PÃO CRIOULO CONGELADO">PÃO CRIOULO CONGELADO</option>
				<option value="PÃO BOLINHA CONGELADO">PÃO BOLINHA CONGELADO</option>
			</select>

			<input type="hidden" name="qtdProduzida" value="1500">

			<button class="btn btn-success" type="submit" style="margin: 1%;">Finalizar fornada</button>

		</div>
	</form>
	<div class="container">
		<h4>Estoque</h4>
		<div align="right">
			<button class="btn btn-primary" style="margin: 1%;" data-toggle="modal" data-target="#abastecerProd"><span class="glyphicon glyphicon-upload"></span></button> <button class="btn btn-danger" data-toggle="modal" data-target="#debitarProd"><span class="glyphicon glyphicon-download"></span></button>
		</div>
		
		<table class="table table-bordered" id="mytable">

			<thead>

				<tr>
					<th>Produto</th>
					<th>Atual</th>
					<th>Mínima</th>
					<th>Preço unit</th>	
					<th>Última atualização</th>
					<th>Código</th>
					<th>Editar</th>
					<th>Excluir</th>
				</tr>
			</thead>
			<tbody>

				<?php
				$contador = 0;
				foreach($produtos as $PRODUTOS){

					echo "<tr>";
					echo "<td style='text-transform: uppercase;'>".$PRODUTOS->nomeProd."</td>";
					echo "<td>".$PRODUTOS->qtdKG." Kg</td>";
					echo "<td>".$PRODUTOS->qtdMin." Kg</td>";
					echo "<td>R$ ".$PRODUTOS->valorUnit."</td>";
					echo "<td>".$PRODUTOS->atualizacao."</td>";
					echo "<td>".$PRODUTOS->ID."</td>";
					echo '<td><a href = "/cadastro/editEstoque/'.$PRODUTOS->ID.'" <button class = "btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button></a></td>';
					echo '<td><a href = "/cadastro/deleteProduto/'.$PRODUTOS->ID.'" <button class = "btn btn-danger" onclick ="return deleteProd()"><span class="glyphicon glyphicon-trash"></span></button></a></td>';
					"</tr>";
					$contador++;

				}

				?>
			</tbody>
		</table>
		<div class="row" align="left">
			<div class="col-md-12">
				Total de produtos no estoque: <?php echo $contador ?>
			</div>
		</div>
	</div> 

	<br />

	<!-- MODAL DE CADASTRAR PRODUTOS -->

	<div class="modal fade" id="produtos" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Cadastrar novo produto</h4>
				</div>
				<div class="modal-body">
					<form name="cadProds" action="" method="">
						<input type="text" class="upper" placeholder="NOME DO PRODUTO" name="nomeProd" autofocus="" id="nomeProd" required="">
						<input type="text" placeholder="QUANTIDADE ADQUIRIDA" name="qtdeADQ" onfocus="startCalc()" onblur="stopCalc()" id="qtdeADQ" required="">
						<input type="text" placeholder="PESO" name="prodPeso" onfocus="startCalc()" onblur="stopCalc()" id="prodPeso" required="">
						<input type="text" placeholder="QUANTIDADE MÍNIMA EM Kg" name="qtdMin" id="qtdMin" required="">
						<input type="text" placeholder="R$ VALOR UNITÁRIO" name="valorUnit" id="valorUnit" required required="">
						<input type="hidden" placeholder="QUANTIDADE EM KG" name="qtdKG"  id="qtdKG" required required="">
					</div>
					<div class="modal-footer">
						<button class="btn btn-success" onclick="return send()" type="submit">Cadastrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- FIM DO MODAL -->

	<!-- MODAL EXPEDIÇÃO DE MERCADORIAS -->

	<div class="modal fade" id="expedicao" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Expedição de mercadorias</h4>
				</div>
				<div class="modal-body">
					<form method="post" action="<?php echo base_url();?>cadastro/Expedicao">

						<select required class="select" name="nomeCliente" id="nomeCliente" style="text-transform: uppercase;">
							<option value="">Selecionar cliente</option>

							<?php 

							foreach($cliente as $CLIENTE){

								echo "<option style='text-transform: uppercase;' value='".$CLIENTE->nome."'>".$CLIENTE->nome."</option>'";	
							}
							?>
						</select>

						<br />
						<br />

						<label>Dados da compra</label>
						<div class="form-group">
							<textarea class="form-control" placeholder="DESCRIÇÃO DA COMPRA" rows="5" id="comment" name="descricao"></textarea>
						</div>
						<input type="text" placeholder="R$ VALOR DA COMPRA" name="valorTotal" id="valorVenda"  required>
						<input type="text" placeholder="DATA DA COMPRA" id="dataVenda" required name="dataVenda" required>
					</div>
					<div class="modal-footer">
						<button class="btn btn-success" onclick="return confirmVenda()" type="submit">Finalizar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- FIM DO MODAL -->


	<!-- MODAL REDEFINIR SENHA -->

	<div class="modal fade" id="senha" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Redefinir senha</h4>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url();?>cadastro/updateSenha" method="post">
						<input type="text" placeholder="EMAIL" name="email" id="EMAIL" required autofocus="">
						<input type="password" placeholder="NOVA SENHA" name="senha" id="primeira_senha" required>
						<input type="password" placeholder="REPITA A SENHA" name="segundaSenha" id="confirmar_senha" required>
					</div>
					<div class="modal-footer">
						<button type="submit" onclick="confirmAlteracao()" class="btn btn-success">Redefinir</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->

	<!-- MODAL DE CADASTRO DE USUÁRIOS -->

	<div class="modal fade" id="user" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Cadastrar usuários</h4>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url();?>cadastro/addUsuario" method="post">
						<input type="text" placeholder="Nome" class="upper" name="nome"  id="Nome" required  autofocus="">
						<input type="text" placeholder="EMAIL" name="email"  id="Email" required>
						<input type="password" placeholder="SENHA" name="senha" id="Senha1" required>
					</div>
					<div class="modal-footer">
						<button type="submit" onclick="return confirmCad()" class="btn btn-success">Cadastrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->

	<!-- MODAL COM USUÁRIOS CADASTRADOS -->

	<div class="modal fade" id="cadUsers" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Usuários cadastrados</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered">
						<tr>
							<th>Nome</th>
							<th>Código</th>
							<th>Excluir</th>
						</tr>
						<tbody>
							<?php 

							foreach($user as $USER){

								echo "<tr>";
								echo "<td style = 'text-transform: uppercase;'>".$USER->nome."</td>";
								echo "<td>".$USER->ID."</td>";
								echo '<td><a href = "/cadastro/deleteUser/'.$USER->ID.'" <button class = "btn btn-danger" onclick="return deleteUser()"><span class="glyphicon glyphicon-trash"></span></button></a>';
								echo "</tr>";	


							}
							?>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->

	<!-- MODAL COM RELATÓRIO DE FORNADAS -->

	<div class="modal fade" id="fornada" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Relatório de fornadas</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered">
						<tr>
							<th>Produto</th>
							<th>Quantidade produzida</th>
							<th>Data da fornada</th>
							<th>Código</th>
							<th>Alterar</th>
							<th>Excluir</th>
						</tr>
						<tbody>
							<?php 

							foreach($fornada as $FORNADA){

								echo "<tr>";
								echo "<td>".$FORNADA->tipoProduto."</td>";
								echo "<td>".$FORNADA->qtdProduzida."</td>";
								echo "<td>".$FORNADA->dataFornada."</td>";
								echo "<td>".$FORNADA->ID."</td>";
								echo '<td><a href = "/cadastro/editFornada/'.$FORNADA->ID.'" <button class = "btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button></a>';
								echo '<td><a href = "/cadastro/deleteFornada/'.$FORNADA->ID.'" <button class = "btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>';
								echo "</tr>";
							}

							?>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- MODAL PARA CADASTRAR A FICHA TÉCNICA -->

	<div class="modal fade" id="fichaTecnica" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Cadastro de ficha técnica</h4>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url();?>cadastro/cadFichaTecnica" method="post">
						<small style="color: red;">*Preencha com "0" os campos dos produtos que não for usar.</small>
						<br />
						<br />
						<input type="text" name="nomeProd" class="upper" placeholder="Nome do produto" autofocus="" required="" id="prod">
						<input type="text" name="farinhaTrigo" placeholder="FARINHA DE TRIGO" required id="farinha">
						<input type="text" name="sal" placeholder="SAL" required id="sal">
						<input type="text" name="acucar" placeholder="AÇÚCAR" required id="acucar">
						<input type="text" name="adipanC" placeholder="MELHORADOR ADIPAN C" required id="adipan">
						<input type="text" name="docemix" placeholder="REFORÇADOR DOCEMIX" required id="docemix">
						<input type="text" name="fermentoInsta" placeholder="FERMENTO INSTANTÂNEO" required id="fermento">
						<input type="text" name="agua" placeholder="ÁGUA" required id="agua">
					</div>
					<div class="modal-footer">
						<button class="btn btn-success" onclick="return cadFicha()" type="submit">Cadastrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL FICHA TÉCNICA -->

	<!-- FICHAS TÉCNICAS CADASTRADAS -->

	<div class="modal fade" id="cadTecnicas" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Fichas técnicas cadastradas</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered">

						<tr>
							<th>Produto</th>
							<th>Trigo</th>
							<th>Adipan C</th>
							<th>Docemix</th>
							<th>Fermento</th>
							<th>Sal</th>
							<th>Açúcar</th>
							<th>Água</th>
							<th>Excluir</th>
						</tr>

						<tbody>

							<?php 

							foreach($ficha as $FICHA){

								echo "<tr>";
								echo "<td style='text-transform: uppercase;'>".$FICHA->nomeProd."</td>";
								echo "<td>".$FICHA->farinhaTrigo." Kg</td>";
								echo "<td>".$FICHA->adipanC." Kg</td>";
								echo "<td>".$FICHA->docemix." Kg</td>";
								echo "<td>".$FICHA->fermentoInsta." Kg</td>";
								echo "<td>".$FICHA->sal." Kg</td>";
								echo "<td>".$FICHA->acucar." Kg</td>";
								echo "<td>".$FICHA->agua." LT</td>";
								echo '<td><a href = "/cadastro/deleteFichaTecnica/'.$FICHA->ID.'" <button class = "btn btn-danger" onclick="return deleteFicha()"><span class="glyphicon glyphicon-trash"></span></button></a></td>';
								echo "</tr>";

							}
							?>
						</tbody>	
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->

	<div class="modal fade" id="abastecerProd" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Abastecer estoque</h4>
				</div>
				<div class="modal-body">
					<form name="updateForm" action="<?php echo base_url();?>cadastro/updateEstoque" method="post">
						<input type="text" name="codProd" id="codProd" placeholder="CÓDIGO DO PRODUTO" required="">
						<input type="text" name="qtdAdqui" id="qtdAdqui" onfocus="startCalc2()" onblur="stopCalc2()" placeholder="QUANTIDADE ADQUIRIDA" required="">
						<input type="text" name="peso" id="peso" onfocus="startCalc2()" onblur="stopCalc2()" placeholder="PESO" required="">
						<input type="hidden" name="totalKg" id="totalKg">
					</div>
					<div class="modal-footer">
						<button class="btn btn-success" type="submit">Finalizar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->

	<!-- MODAL DEBITAR PRODUTO -->

	<div class="modal fade" id="debitarProd" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Debitar estoque</h4>
				</div>
				<div class="modal-body">
					<form name="myForm" action="<?php echo base_url();?>cadastro/BaixarEstoque" method="post">
						<input type="text" name="codProd" id="codProd" placeholder="CÓDIGO DO PRODUTO" required="">
						<input type="text" name="qtdUsed" id="qtdUsed" placeholder="QUANTIDADE UTILIZADA" required="">
						<input type="hidden" name="qtdUsada" id="qtdUsada">
					</div>
					<div class="modal-footer">
						<button class="btn btn-success" onclick="convertValue()" type="submit">Finalizar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->

	<!-- MODAL CADASTRAR CLIENTE -->

	<div class="modal fade" id="cadCliente" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Cadastrar cliente</h4>
				</div>
				<div class="modal-body">
					<form name="myForm" action="<?php echo base_url();?>cliente/cadCliente" method="post">
						<label>Dados do cliente</label>
						<input type="text" name="nome" class="upper" id="nomeCli" placeholder="NOME" required="" autofocus="">
						<input type="text" name="cnpj" id="cnpj" placeholder="CNPJ/CPF" required="">
						<input type="text" placeholder="TELEFONE" name="telefone" id="TELEFONE" required>
						<br />
						<br />
						<label>Endereço</label>
						<input type="text" name="rua" class="upper" id="rua" placeholder="RUA" required="">
						<input type="text" name="numero" id="numero" placeholder="NÚMERO" required="">
						<input type="text" name="cidade" class="upper" id="cidade" placeholder="CIDADE" required="">
						<input type="text" name="bairro" class="upper" id="bairro" placeholder="BAIRRO" required="">
						<input type="text" name="cep" id="CEP" placeholder="CEP" required="">
						<div class="modal-footer">
							<button class="btn btn-success" onclick="return cadCliente()" type="submit">Finalizar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript">
		$('#dataVenda').datepicker({	
			format: "dd/mm/yyyy",	
			language: "pt-BR",
			// startDate: '+0d',
		});

		var password = document.getElementById("primeira_senha")
		, confirm_password = document.getElementById("confirmar_senha");

		function validatePassword(){
			if(password.value != confirm_password.value) {
				confirm_password.setCustomValidity("As senhas não coincidem");
			} else {
				confirm_password.setCustomValidity('');
			}
		}

		password.onchange = validatePassword;
		confirm_password.onkeyup = validatePassword;


		function convertValue(){

			var x = $("#qtdUsed").val().replace(',', '.');
			var y = parseFloat(x); 
			document.getElementById("qtdUsada").value = y;

		}

		function check(){
			var tabela = document.getElementById("mytable");


			for(var i=1; i<tabela.rows.length; i++){
				atual = (tabela.rows[i].cells[1].innerHTML);
				minimo = (tabela.rows[i].cells[2].innerHTML);

				x = parseFloat(atual);
				y = parseFloat(minimo);

				if(x > y){

					(tabela.rows[i]).style.color = "#228B22";
				} else{
					(tabela.rows[i]).style.color = "#FF4500";

				}

			}
		}
		window.onload = check;

		function send(){
			var prodName = document.getElementById('nomeProd').value;

			if(prodName != ""){

				var qtd = document.getElementById('qtdeADQ').value;
				var peso = document.getElementById('prodPeso').value;
				var preco = document.getElementById('valorUnit').value;
				var min = document.getElementById('qtdMin').value;
				var Kg = document.getElementById('qtdKG').value;

				var dados = 'nomeProd='+prodName + '&qtdeADQ='+qtd + '&prodPeso='+peso 
				+'&valorUnit='+preco + '&qtdMin='+min + '&qtdKG=' + Kg;

				$.ajax({

					type:'post',
					url: '<?php echo base_url();?>cadastro/cadProd',
					data: dados,
					cache: false,
				});

				var prodName = document.getElementById('nomeProd').value="";
				var qtd = document.getElementById('qtdeADQ').value="";
				var peso = document.getElementById('prodPeso').value="";
				var preco = document.getElementById('valorUnit').value="";
				var min = document.getElementById('qtdMin').value="";
				var Kg = document.getElementById('qtdKG').value="";
				return false;

			}
		}
	</script>
</body>
</html>