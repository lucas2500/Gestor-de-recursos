function deleteUser(){

	var x = confirm("Deseja realmente excluir este usuário?");

	if(x == true){

		alert("Usuário excluido com sucesso!!");
		return x;

	} else{

		return false;
	}

}

function confirmCad(){

	var nome = document.getElementById("Nome").value;
	var email = document.getElementById("Email").value;
	var senha = document.getElementById("Senha1").value;

	if(nome != "" && email != "" && senha != ""){

		alert("Usuário cadastrado com sucesso!!");

	}

}

function confirmAlteracao(){

	var email = document.getElementById("EMAIL").value;
	var senha = document.getElementById("primeira_senha").value;
	var confirmSenha = document.getElementById("confirmar_senha");

	if("email" != "" && senha != "" && confirmSenha != ""){

		alert("Sua senha foi alterada com sucesso!! \n \n" + "Você deverá efetuar o login novamente");
	}

}

function confirmVenda(){

	var nome = document.getElementById("nomeCliente").value;
	var valor = document.getElementById("valorVenda").value;
	var data = document.getElementById("dataVenda").value;

	if(nome != "" && valor != "" && data != ""){

		alert("Venda processada com sucesso!!");
	}


}

function validarSenha(){

	try{

		var email = document.getElementById("EMAIL").value;
		var senha1 = document.getElementById("senha1").value;
		var senha2 = document.getElementById("senha2").value;

		if(email == "" || senha1 == "" || senha2 == "") throw "Nenhum campo pode ficar vázio";
		if(senha1 != senha2) throw "As senhas não coincidem";

		else{

			alert("Sua senha foi alterada com sucesso!!");
		}


	} catch(erro){

		alert("Aviso \n \n" + erro);
		return false;

	}

}

function cadFicha(){

	var prod = document.getElementById("prod").value;
	var trigo = document.getElementById("farinha").value;
	var sal = document.getElementById("sal").value;
	var acucar = document.getElementById("acucar").value;
	var adipanC = document.getElementById("adipan").value;
	var docemix = document.getElementById("docemix").value;
	var fermento = document.getElementById("fermento").value;
	var agua = document.getElementById("agua").value;

	if(prod != "" && trigo != "" && sal != "" && acucar != "" && adipanC != "" && docemix != "" && fermento != ""
		&& agua != ""){

		alert("Ficha técnica cadastrada com sucesso!!");
}

}

function cadCliente(){

	var nome = document.getElementById("nomeCli").value;
	var cnpj = document.getElementById("cnpj").value;
	var tel = document.getElementById("TELEFONE").value;
	var rua = document.getElementById("rua").value;
	var num = document.getElementById("numero").value;
	var cidade = document.getElementById("cidade").value;
	var bairro = document.getElementById("bairro").value;
	var cep = document.getElementById("CEP").value;


	if(nome != "" && cnpj != "" && tel != "" && rua != "" && num != "" && cidade != "" && bairro != "" && cep != ""){

		alert("Cliente cadastrado com sucesso!!");
	}


}


function updateProd(){

	var nome = document.getElementById("nomeProd").value;
	var qtd = document.getElementById("qtdMin").value;
	var valor = document.getElementById("valorUnitario").value;

	if(nome != "" && qtd != "" && valor != ""){

		alert("Produto atualizado com sucesso!!");
	}

}

function deleteProd(){

	var x = confirm("Deseja mesmo excluir este produto?");

	if(x == true){

		return x;

	} else{

		return false;
	}

}

function deleteFicha(){

	var x = confirm("Deseja mesmo excluir esta ficha?");

	if(x == true){

		return x;

	} else{

		return false;
	}


}