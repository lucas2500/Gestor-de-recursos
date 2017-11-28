
$(document).ready(function () { 

	var $seuCampoCpf5 = $("#TELEFONE");
	$seuCampoCpf5.mask('00-0000-0000', {reverse: true});

	var $seuCampoCpf6 = $("#CEP");
	$seuCampoCpf6.mask('00000-000', {reverse: true});

	var $seuCampoCpf7 = $("#valorVenda");
	$seuCampoCpf7.mask('000.000.000.000.000,00', {reverse: true});

	var $seuCampoCpf8 = $("#valorUnit");
	$seuCampoCpf8.mask('000.000.000.000.000,00', {reverse: true});

	var $seuCampoCpf9 = $("#farinha");
	$seuCampoCpf9.mask('000,000,000,000,000,000', {reverse: true});

	var $seuCampoCpf10 = $("#sal");
	$seuCampoCpf10.mask('000,000,000,000,000,000', {reverse: true});

	var $seuCampoCpf11 = $("#acucar");
	$seuCampoCpf11.mask('000,000,000,000,000,000', {reverse: true});

	var $seuCampoCpf12 = $("#adipan");
	$seuCampoCpf12.mask('000,000,000,000,000,000', {reverse: true});

	var $seuCampoCpf13 = $("#docemix");
	$seuCampoCpf13.mask('000,000,000,000,000,000', {reverse: true});

	var $seuCampoCpf14 = $("#fermento");
	$seuCampoCpf14.mask('000,000,000,000,000,000', {reverse: true});

	var $seuCampoCpf15 = $("#agua");
	$seuCampoCpf15.mask('000,000,000,000,000,000', {reverse: true});

	var $seuCampoCpf16 = $("#prodPeso");
	$seuCampoCpf16.mask('000,000,000,000,000,000', {reverse: true});

	var $seuCampoCpf17 = $("#qtdMin");
	$seuCampoCpf17.mask('000,000,000,000,000,000', {reverse: true});

	var $seuCampoCpf18 = $("#peso");
	$seuCampoCpf18.mask('000,000,000,000,000,000', {reverse: true});

	var $seuCampoCpf19 = $("#qtdUsed");
	$seuCampoCpf19.mask('000,000,000,000,000,000', {reverse: true});
});


function confirmFornada(){

	alert("Fornada realizada com sucesso!!");

}


function startCalc(){
	interval = setInterval("calc()",1);
}
function calc(){

	var peso = $("#prodPeso").val().replace(',', '.');
	var qtd = $("#qtdeADQ").val().replace(',', '.');

	document.cadProds.qtdKG.value = peso * qtd;
}

function stopCalc(){
	clearInterval(interval);
}

// OUTRA FUNÇÃO DE CÁLCULO



function startCalc2(){
	interval = setInterval("calc2()",1);
}

function calc2(){

	var peso = $("#qtdAdqui").val().replace(',', '.');
	var qtd = $("#peso").val().replace(',', '.');

	document.updateForm.totalKg.value = peso * qtd;
}

function stopCalc2(){
	clearInterval(interval);
}




