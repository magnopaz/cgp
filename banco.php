<?php

$host = "localhost";
$user = "magno";
$pass = "ulukai";
$banco = "cgp";
$conexao = mysqli_connect($host, $user, $pass, $banco);

if (mysqli_connect_errno($conexao)){
	echo "Problemas para conectar no banco. Verifique os dados!";
	die();
}

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


function grava_concessao($conexao, $concessaogravar){
    $sqlGravar = "INSERT INTO concessoes (cessionario, finalidade, processoNumero, processoData, objetoConcessao, instrumentoLegal, dataInicio, dataFinalidade, dataTermino, observacao, proxima_vistoria) VALUES ('{$concessaogravar['cessionario']}', '{$concessaogravar['finalidade']}', '{$concessaogravar['processoNumero']}', '{$concessaogravar['processoData']}', '{$concessaogravar['objetoConcessao']}', '{$concessaogravar['instrumentoLegal']}', '{$concessaogravar['dataInicio']}', '{$concessaogravar['dataFinalidade']}', '{$concessaogravar['dataTermino']}', '{$concessaogravar['observacao']}', '{$concessaogravar['proxima_vistoria']}')";
    mysqli_query($conexao, $sqlGravar);
}

function traduz_data_para_banco($data){
	if ($data == "") {
	return "";
	}
	$dados = explode("/", $data);
	$data_mysql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";
	return $data_mysql;
}

function traduz_data_para_exibir($data){
	if ($data == "" OR $data == "0000-00-00") {
	return "";
	}
	$dados = explode("-", $data);
	$data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";
	return $data_exibir;
}

function validar_data($data){
	$padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
	$resultado = preg_match($padrao, $data);
	return $resultado;
}

function validar_cpf($cpf){
	$padrao = '/^[0-9]{11}$/';
	$resultado = preg_match($padrao, $data);
	return $resultado;
}

function nl2br2($string) { 
$string = str_replace(array("\r\n", "\r", "\n"), "<br />", $string); 
return $string; 
}

function grava_historico($conexao, $historicogravar){
	$sqlGravar = "INSERT INTO historicos (usuario, historico, dataHistorico) VALUES ('{$historicogravar['usuario']}', '{$historicogravar['historico']}', '{$historicogravar['dataHistorico']}')";
	mysqli_query($conexao, $sqlGravar);
} 


?>
