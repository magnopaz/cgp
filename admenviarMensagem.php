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
		<title><?php echo 'Enviar Mensagem';?></title>
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
			<li><a href="admconcessao.php">Concessão</a></li>
			<li><a href="admdisponivel.php">Disponível</a></li>
                        <li><a href="admvistorias.php">Vistorias</a></li>
			<li><a class="current" href="admmensagens.php">Mensagens</a></li>
			<li><a href="logout.php">Sair</a></li>
                    </ul>
        </div>
                     <br/><br/><br/><br/><br/><br/><br/><br/>
		<center><h1>Enviar Mensagem</h1></center>

        <form name="formMensagem" method="post" action="g_admenviarMensagem.php">
                    <?php
		$sql = "SELECT nome, matricula FROM usuarios";
		$query = $conexao->query($sql);
		?>
        <?php echo '<TD>Destinatário</TD><TD><SELECT name="destinatario">'?>
        <?php 
        while ($nomes = $query->fetch_array()) {
					echo '<OPTION VALUE=' . "$nomes[matricula]" . '>' . "$nomes[nome]" . '</OPTION>';
				}
				echo '</SELECT></TD>';?>
            Assunto:<br /><br /> <textarea name="assunto" rows="1" cols="100"></textarea><br /><br />
            Mensagem:<br /><br /> <textarea name="mensagem" rows="5" cols="100"></textarea><br /><br />
             
			<input type="submit" value="Enviar"/>
		</form>

        <form action=<?php echo $voltar; ?>>
            <input type="submit" value="Voltar" />
        </form>

            
  		
	</body>
	
	
</html>
