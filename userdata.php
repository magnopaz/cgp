<?php
	//coloca na variável $matricula o valor o usuário da seção, pego durante o login 
	$matricula=($_SESSION["usuario"]);
	//faz a busca no banco da linha que corresponde ao usuário da seção
	$sql = "SELECT * FROM usuarios WHERE matricula = '$matricula'";
	$query = $conexao->query($sql);
	//armazena no array $dados todas as informações da linha do usuário na tabela clientes 
	$dados = $query->fetch_array();
        
        if ($dados["tipo"] == 1){
            $voltar = "concessao.php";
        } else if ($dados["tipo"] == 2){
            $voltar = "disponivel.php";
        } else if ($dados["tipo"] == 3){
            $voltar = "fiscal.php";
        } else if ($dados["tipo"] == 6){
            $voltar = "adm.php";
        }
?>