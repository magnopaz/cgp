<?php
	include "banco.php";

	
	session_start();
	if(!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])){
		header("Location: index.php");
		exit;
	}
        include "userdata.php";
        $idConcessao = $_POST['idConcessao'];
        $sql = "SELECT * FROM concessoes WHERE idConcessao = '$idConcessao'";
	$query = $conexao->query($sql);
        $rs = $query->fetch_array();
       		    
?>

<html>
	<head>
		<title><?php echo 'Alterar Concessão';?></title>
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
			<li><a href=".">Início</a></li>
			<li><a class="current" href="cadastrarconcessao.php">Cadastrar Concessão</a></li>
			<li><a href="pesquisarconcessao.php">Pesquisar Concessão</a></li>
			<li><a href="mensagens.php">Mensagens</a></li>
			<li><a href="logout.php">Sair</a></li>
                    </ul>
        </div>
                     
                     <br/><br/><br/><br/><br/><br/><br/><br/>
                     
        <form name="formconcessao" method="post" action="g_alterarconcessao.php">
            Cessionário:<br /><br /> <textarea name="cessionario" rows="1" cols="100"><?php echo "$rs[cessionario]";?></textarea><br /><br />
            Processo nº: <textarea name="processoNumero" rows="1" cols="15"><?php echo "$rs[processoNumero]";?></textarea>
            Data do Processo (deve ser no formato 11/11/1111):	<textarea name="processoData" rows="1" cols="15"><?php echo traduz_data_para_exibir("$rs[processoData]");?></textarea><br /><br />
            Objeto da concessão:<br /><br /> <textarea name="objetoConcessao" rows="3" cols="100"><?php echo "$rs[objetoConcessao]";?></textarea><br /><br />
            Finalidade:<br /><br /> <textarea name="finalidade" rows="3" cols="100"><?php echo "$rs[finalidade]";?></textarea><br /><br />
            Especificação do instrumento legal da concessão, bem como o instrumento de sua publicidade:<br /><br /> <textarea name="instrumentoLegal" rows="3" cols="100"><?php echo "$rs[instrumentoLegal]";?></textarea><br /><br />
            Prazos para o cumprimento do objeto da concessão:<br>
            Inicio da Concessão(deve ser no formato 11/11/1111):	<textarea name="dataInicio" rows="1" cols="15"><?php echo traduz_data_para_exibir("$rs[dataInicio]");?></textarea><br />
            Prazo limite para execução da finalidade da concessão (deve ser no formato 11/11/1111):	<textarea name="dataFinalidade" rows="1" cols="15"><?php echo traduz_data_para_exibir("$rs[dataFinalidade]");?></textarea><br />
            Término da Concessão(deve ser no formato 11/11/1111):	<textarea name="dataTermino" rows="1" cols="15"><?php echo traduz_data_para_exibir("$rs[dataTermino]");?></textarea><br /><br />
            Observações:<br /><br /> <textarea name="observacao" rows="3" cols="100"><?php echo "$rs[observacao]";?></textarea><br /><br />
            <input type="hidden" name="idConcessao" value="<?php echo $idConcessao; ?> "/>
            <input type="submit" value="Alterar Concessão"/>
		</form>

        <form action=<?php echo $voltar; ?>>
            <input type="submit" value="Voltar" />
        </form>
        <br>
		<a href="logout.php">Sair</a>
            
  		
	</body>
	
	
</html>
