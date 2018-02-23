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
		<title><?php echo 'Cadastrando Documento';?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />
                <link rel="stylesheet" href="css/estilos.css">
		
	</head>
		 <body id="home">
	<div class="wrap">
		<div id="logo">
                    <h1><a href="." title="Home">Sistema CGP</a></h1>
                    <p>Desenvolvido por Magno Paz</p>
		</div>
                    <ul id="nav">
			<li><a href="adm.php">Documentos</a></li>
			<li><a class="current" href="cadastrarconcessao.php">Cadastrar Concessão</a></li>
			<li><a href="pesquisarconcessao.php">Pesquisar Concessão</a></li>
			<li><a href="mensagens.php">Mensagens</a></li>
			<li><a href="logout.php">Sair</a></li>
                    </ul>
        </div>
                     <br/><br/><br/><br/><br/><br/><br/><br/>
        <form name="formdocumentos" method="post" action="g_cadastrardocumentos.php">
            Documento:<br /><br /> <textarea name="documento" rows="1" cols="100"></textarea><br /><br />
            Despachado para:<br /><br /> <textarea name="despachado" rows="1" cols="100"></textarea><br /><br />
            Observações:<br /><br /> <textarea name="observacoes" rows="1" cols="100"></textarea><br /><br />
            Responder até dia (deve ser no formato 11/11/1111):	<input type="text" name="responderate" /><br /><br />
                        
            <input type="submit" value="Cadastrar documento"/>
		</form>

        <form action=<?php echo $voltar; ?>>
            <input type="submit" value="Voltar" />
        </form>
            
  		
	</body>
	
	
</html>
