<?php
	include "banco.php";

	
	session_start();
	if(!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])){
		header("Location: index.php");
		exit;
	}

	
?>

<html>
	<head>
                <link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" href="css/estilos.css">
        <title><?php echo 'Mensagens';?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
			<li><a href="pesquisarconcessao.php">Pesquisar Concessão</a></li>
			<li><a class="current" href="mensagens.php">Mensagens</a></li>
			<li><a href="logout.php">Sair</a></li>
                    </ul>
        </div>
                     <br/><br/><br/><br/><br/><br/><br/><br/>
              <div class='container'>
        
                  
        <nav class="menu-opcoes">
            <ul>
                <li><a href="enviarMensagem.php">Enviar mensagem</a></li>
                <li><a href="mensagens.php">Receber mensagem</a></li>
            </ul>
        </nav><center><h1>Mensagens Recebidas</h1></center>

     <?php
        $d = $_SESSION["usuario"];          
        $sql = "SELECT * FROM mensagens WHERE destinatario = '$d'";
        $query = $conexao->query($sql);
        while ($ms = $query->fetch_array()){
                        echo '<div class="mensagemVisualizar"><fieldset>
                        Remetente:<br />' . $ms[remetenteNome] . '<br />
                        Assunto:<br />' . nl2br2($ms[assunto]) . '<br />
                        Mensagem:<br />' . nl2br2($ms[mensagem]) . '<br />
                        </fieldset></div>';      
                    
                                    
        }

        ?>            
        
		</div>
	</body>
	
	
</html>
