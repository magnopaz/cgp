<?php
	include "banco.php";

	
	session_start();
	if(!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])){
		header("Location: index.php");
		exit;
	}
	include "userdata.php";
?>

<html>
	<head>
		<link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />
                <link rel="stylesheet" href="css/estilos.css">

        <title>Pesquisar Imóveis</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	 <body id="home">
	<div class="wrap">
		<div id="logo">
                    <h1><a href="." title="Home">Sistema CGP</a></h1>
                    <p>Desenvolvido por Magno Paz</p>
		</div>
                    <ul id="nav">
			<li><a class="current" href="disponivel.php">Disponível</a></li>
			<li><a href="cadastrarconcessao.php">Cadastrar Concessão</a></li>
			<li><a href="pesquisarconcessao.php">Pesquisar Concessão</a></li>
			<li><a href="mensagens.php">Mensagens</a></li>
			<li><a href="logout.php">Sair</a></li>
                    </ul>
        </div>
             <br/><br/><br/><br/><br/><br/><br/><br/>
        <center><h1>Pesquisar Imóveis</h1></center>
            
        <form name="formpesquisaimoveis" method="post" action="r_pesquisarimoveis.php">
            
            Pesquisar o termo <input type="text" name="termoPesquisa" /> onde <SELECT name="localPesquisa">
            <OPTION VALUE="cd_imovel_reduzido">Código reduzido</OPTION>
            <OPTION VALUE="nm_logradouro">Logradouro</OPTION>
            <OPTION VALUE="nm_bairro_cidade">Bairro</OPTION>
            </SELECT>
            <input type="submit" value="Pesquisar"/>
				</form>
        <form action="disponivel.php">
            <input type="submit" value="Voltar" />
        </form>
         


		
	</body>
	
	
</html>
