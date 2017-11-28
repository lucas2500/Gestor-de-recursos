
function deleteCliente(){

	x = confirm("Deseja realmente apagar este cliente?");

	if(x == true){

		return x;

	} else{

		return false;
	}

}

function deleteForn(){

	x = confirm("Deseja realmente apagar este fornecedor?");

	if(x == true){

		return x;

	} else{

		return false;
	}

}


function confirmEdit(){

	var nome = document.getElementById("nome").value;
	var cnpj = document.getElementById("cnpj").value;
	var tel = document.getElementById("telefone").value;
	var rua = document.getElementById("rua").value;
	var cidade = document.getElementById("cidade").value;
	var bairro = document.getElementById("bairro").value;
	var cep = document.getElementById("cep").value;

	if(nome != "" && cnpj != "" && tel != "" && rua != "" && cidade != "" && bairro != "" && cep)

		alert("Registro atualizado com sucesso!!");

}

function cadForn(){

	var nome = document.getElementById("nome").value;
	var cnpj = document.getElementById("rzSocial").value;
	var telefone = document.getElementById("telefone").value;

	if(nome != "" && cnpj != "" && telefone != ""){

		alert("Fornecedor cadastrado com sucesso!!");

	}

}

function cadDuplicata(){

	var nome = document.getElementById("nomeForn").value;
	var total = document.getElementById("valorCompra").value;
	var dtCompra = document.getElementById("dtCompra").value;
	var dtVencimento = document.getElementById("dtVencimento").value;

	if(nome != "" && total != "" && dtCompra != "" && dtVencimento != ""){

		alert("Duplicata cadastrada com sucesso!!");

	}

}

function updateEstoque(){

	codigo = document.getElementById("codProd").value;
	qtd = document.getElementById("qtdAdqui").value;
	peso = document.getElementById("peso").value;
	totalKg = document.getElementById("totalKg").value;

	if(codigo != "" && qtd != "" && peso != "" && totalKg != ""){


		alert("Estoque atualizado com sucesso!!");
	}
}

