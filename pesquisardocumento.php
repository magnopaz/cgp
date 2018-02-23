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
			<li><a class="current" href="adm.php">Documentos</a></li>
			<li><a href="cadastrarconcessao.php">Cadastrar Concessão</a></li>
			<li><a href="pesquisarconcessao.php">Pesquisar Concessão</a></li>
			<li><a href="mensagens.php">Mensagens</a></li>
			<li><a href="logout.php">Sair</a></li>
                    </ul>
        </div>
                     <br/><br/><br/><br/><br/><br/><br/><br/>
            
        <form name="formpesquisadocumentos" method="post" action="r_pesquisardocumento.php">
            
            Pesquisar o termo <input type="text" name="termoPesquisa" /> onde <SELECT name="localPesquisa">
            <OPTION VALUE="documento">Documento</OPTION>
            <OPTION VALUE="despachado">Despachado para</OPTION>
            <OPTION VALUE="observacoes">Observacoes</OPTION>
            <OPTION VALUE="respondido">Respondido</OPTION>
            </SELECT>
            <input type="submit" value="Pesquisar"/>
				</form>

        <form action=<?php echo $voltar; ?>>
            <input type="submit" value="Voltar" />
        </form>            


		
	</body>
	
	
</html>