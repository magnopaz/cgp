<?php
include "banco.php";


session_start();
if (!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])) {
    header("Location: index.php");
    exit;
}
include "userdata.php";
?>

<html>
    <head>
        <link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="css/estilos.css">
        <title><?php echo 'Cadastrando Disponível'; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body id="home">
        <div class="wrap">
            <div id="logo">
                <h1><a href="." title="Home">Sistema CGP</a></h1>
                <p>Desenvolvido por Magno Paz</p>
            </div>
            <ul id="nav">
                <li><a href="adm.php">Documentos</a></li>
                <li><a href="admconcessao.php">Concessão</a></li>
                <li><a class="current" href="admdisponivel.php">Disponível</a></li>
                <li><a href="admvistorias.php">Vistorias</a></li>
                <li><a href="admmensagens.php">Mensagens</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/>
       <center><h1>Pesquisar Imóveis no Disponível</h1></center>
            
        <form name="formpesquisaimoveis" method="post" action="r_admpesquisarimoveis.php">
            
            Pesquisar o termo <input type="text" name="termoPesquisa" /> onde <SELECT name="localPesquisa">
            <OPTION VALUE="cd_imovel_reduzido">Código reduzido</OPTION>
            <OPTION VALUE="observacoesimovel">Observações ou Averbações</OPTION>
            <OPTION VALUE="matriculaimovel">Número da Matrícula</OPTION>
            <OPTION VALUE="denominacaoimovel">Denominação do Imóvel</OPTION>
            <OPTION VALUE="confrontacao_imovel">Conforntações do Imóvel</OPTION>
            denominacaoimovel
            </SELECT>
            <input type="submit" value="Pesquisar"/>
				</form>
       <form action="admdisponivel.php">
            <input type="submit" value="Voltar" />
        </form>
         


		
	</body>
	
	
</html>
