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
        <title><?php echo 'Pesquisar Concessão';?></title>

	</head>
			 <body id="home">
	<div class="wrap">
		<div id="logo">
                    <h1><a href="." title="Home">Sistema CGP</a></h1>
                    <p>Desenvolvido por Magno Paz</p>
		</div>
                    <ul id="nav">
			<li><a href="concessao.php">Início</a></li>
			<li><a href="cadastrarconcessao.php">Cadastrar Concessão</a></li>
			<li><a class="current" href="pesquisarconcessao.php">Pesquisar Concessão</a></li>
			<li><a href="mensagens.php">Mensagens</a></li>
			<li><a href="logout.php">Sair</a></li>
                    </ul>
        </div>
                     <br/><br/><br/><br/><br/><br/><br/><br/>
            
        <form name="formpesquisaconcessao" method="post" action="r_pesquisarconcessao.php">
            
            Pesquisar o termo <input type="text" name="termoPesquisa" /> onde <SELECT name="localPesquisa">
            <OPTION VALUE="cessionario">Cessionário</OPTION>
            <OPTION VALUE="finalidade">Finalidade</OPTION>
            <OPTION VALUE="processoNumero">Numero do Processo</OPTION>
            <OPTION VALUE="objetoConcessao">Objeto da Concessão</OPTION>
            <OPTION VALUE="instrumentoLegal">Instrumento Legal</OPTION>
            </SELECT>
            <input type="submit" value="Pesquisar"/>
				</form>

        <form action=<?php echo $voltar; ?>>
            <input type="submit" value="Voltar" />
        </form>            


		
	</body>
	
	
</html>