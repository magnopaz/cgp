<?php
	include "banco.php";

	
	session_start();
	if(!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])){
		header("Location: index.php");
		exit;
	}
        include "userdata.php";
        $vencendo = 0;
	
?>

<html>
	<head>
		<link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />
                <link rel="stylesheet" href="css/estilos.css">

        <title><?php echo 'Bem Vindo ao Painel de Controle ' . $dados["nome"];?></title>
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
			<li><a class="current" href="admconcessao.php">Concessão</a></li>
			<li><a href="admdisponivel.php">Disponível</a></li>
                        <li><a href="admvistorias.php">Vistorias</a></li>
			<li><a href="admmensagens.php">Mensagens</a></li>
			<li><a href="logout.php">Sair</a></li>
                    </ul>
        </div>
             <br/><br/><br/><br/><br/><br/><br/><br/>
       <form name="formconcessao" method="post" action="adm_g_cadastrarconcessao.php">
            Cessionário:<br /><br /> <textarea name="cessionario" rows="1" cols="100"></textarea><br /><br />
            Processo nº: <input type="text" name="processoNumero" />
            Data do Processo (deve ser no formato 11/11/1111):	<input type="text" name="processoData" /><br /><br />
            Objeto da concessão:<br /><br /> <textarea name="objetoConcessao" rows="3" cols="100"></textarea><br /><br />
            Finalidade:<br /><br /> <textarea name="finalidade" rows="3" cols="100"></textarea><br /><br />
            Especificação do instrumento legal da concessão, bem como o instrumento de sua publicidade:<br /><br /> <textarea name="instrumentoLegal" rows="3" cols="100"></textarea><br /><br />
            Prazos para o cumprimento do objeto da concessão:<br>
            Inicio da Concessão(deve ser no formato 11/11/1111):	<input type="text" name="dataInicio" /><br />
            Prazo limite para execução da finalidade da concessão (deve ser no formato 11/11/1111):	<input type="text" name="dataFinalidade" /><br />
            Término da Concessão(deve ser no formato 11/11/1111):	<input type="text" name="dataTermino" /><br /><br />
            Próxima vistoria (deve ser no formato 11/11/1111):	<input type="text" name="proxima_vistoria" /><br />
            Observações:<br /><br /> <textarea name="observacao" rows="3" cols="100"></textarea><br /><br />
            
            <input type="submit" value="Cadastrar Concessão"/>
		</form>

        <form action=<?php echo $voltar; ?>>
            <input type="submit" value="Voltar" />
        </form>
            
  		
	</body>
	
	
</html>