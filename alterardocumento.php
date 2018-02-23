<?php
	include "banco.php";

	
	session_start();
	if(!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])){
		header("Location: index.php");
		exit;
	}
        include "userdata.php";
        $iddocumento = $_POST['iddocumento'];
        $sql = "SELECT * FROM documentos WHERE iddocumento = '$iddocumento'";
	$query = $conexao->query($sql);
        $rs = $query->fetch_array();
       		    
?>

<html>
	<head>
		<title><?php echo 'Alterar Documento';?></title>
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
			<li><a class="current" href="adm.php">Documentos</a></li>
			<li><a href="cadastrarconcessao.php">Cadastrar Concessão</a></li>
			<li><a href="pesquisarconcessao.php">Pesquisar Concessão</a></li>
			<li><a href="mensagens.php">Mensagens</a></li>
			<li><a href="logout.php">Sair</a></li>
                    </ul>
        </div>
                     
                     <br/><br/><br/><br/><br/><br/><br/><br/>
                     
        <form name="formdocumento" method="post" action="g_alterardocumento.php">
            Documento:<br /><br /> <textarea name="documento" rows="1" cols="100"><?php echo "$rs[documento]";?></textarea><br /><br />
            Despachado para:<br /><br /> <textarea name="despachado" rows="1" cols="100"><?php echo "$rs[despachado]";?></textarea><br /><br />
            Observacoes:<br /><br /> <textarea name="observacoes" rows="3" cols="100"><?php echo "$rs[observacoes]";?></textarea><br /><br />
            Respondido no:<br /><br /> <textarea name="respondido" rows="2" cols="100"><?php echo "$rs[respondido]";?></textarea><br /><br />
            
            Responder até (deve ser no formato 11/11/1111):	<textarea name="responderate" rows="1" cols="15"><?php echo traduz_data_para_exibir("$rs[responderate]");?></textarea><br /><br />
           
            <input type="hidden" name="iddocumento" value="<?php echo $iddocumento; ?> "/>
            <input type="submit" value="Alterar Documento"/>
		</form>
        <form action=<?php echo $voltar; ?>>
            <input type="submit" value="Voltar" />
        </form>
        <br>

            
  		
	</body>
	
	
</html>
