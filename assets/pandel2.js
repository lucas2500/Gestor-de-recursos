
$(document).ready(function () { 

	var $seuCampoCpf = $("#telefone");
	$seuCampoCpf.mask('00-0000-0000', {reverse: true});

	var $seuCampoCpf2 = $("#valorCompra");
	$seuCampoCpf2.mask('000.000.000.000.000,00', {reverse: true});

	var $seuCampoCpf3 = $("#prodPeso");
	$seuCampoCpf3.mask('000,000,000,000,000,000', {reverse: true});

	var $seuCampoCpf4 = $("#peso");
	$seuCampoCpf4.mask('000,000,000,000,000,000', {reverse: true})

	var $seuCampoCpf5 = $("#valorUnit");
	$seuCampoCpf5.mask('000.000.000.000.000,00', {reverse: true});

	var $seuCampoCpf6 = $("#qtdMin");
	$seuCampoCpf6.mask('000,000,000,000,000,00', {reverse: true});
});

function myFunction() {
	var input, filter, table, tr, td, i;
	input = document.getElementById("pesquisarCliente");
	filter = input.value.toUpperCase();
	table = document.getElementById("cliente");
	tr = table.getElementsByTagName("tr");
	for (i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td")[0];
		if (td) {
			if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			} else {
				tr[i].style.display = "none";
			}
		}       
	}

	var totalLinha =  $('#cliente tr:visible').length;
	var totalLinha2 = totalLinha-1;

	var x = totalLinha2;
	document.getElementById("demo").innerHTML = "Nº de vendas realizadas: " + x;
}

function myFunction2() {
	var input, filter, table, tr, td, i;
	input = document.getElementById("mes");
	filter = input.value.toUpperCase();
	table = document.getElementById("cliente");
	tr = table.getElementsByTagName("tr");
	for (i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td")[2];
		if (td) {
			if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			} else {
				tr[i].style.display = "none";
			}
		}       
	}

	var totalLinha =  $('#cliente tr:visible').length;
	var totalLinha2 = totalLinha-1;

	var x = totalLinha2;
	document.getElementById("demo").innerHTML = "Nº de vendas realizadas: " + x;
}

function contaLinha(){

	var totalLinha =  $('#cliente tr:visible').length;
	var totalLinha2 = totalLinha-1;

	var x = totalLinha2;
	document.getElementById("demo").innerHTML = "Nº de vendas realizadas: " + x;

}

// function startCalc(){
// 	interval = setInterval("calc()",1);
// }

// function calc(){

// 	var peso = $("#prodPeso").val().replace(',', '.');
// 	var qtd = $("#qtd").val().replace(',', '.');

// 	document.cadProds.qtdKG.value = peso * qtd;
// }

// function stopCalc(){
// 	clearInterval(interval);
// }

// OUTRA FUNÇÃO DE CÁLCULO EM TEMPO REAL


function startCalc2(){
	interval = setInterval("calc2()",1);
}

function calc2(){

	var peso = $("#qtdAdqui").val().replace(',', '.');
	var qtd = $("#peso").val().replace(',', '.');

	document.cadProds.totalKg.value = peso * qtd;
}

function stopCalc2(){
	clearInterval(interval);
}

