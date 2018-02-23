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
			<li><a class="current" href="concessao.php">Início</a></li>
			<li><a href="cadastrarconcessao.php">Cadastrar Concessão</a></li>
			<li><a href="pesquisarconcessao.php">Pesquisar Concessão</a></li>
			<li><a href="mensagens.php">Mensagens</a></li>
			<li><a href="logout.php">Sair</a></li>
                    </ul>
        </div>
        
             <div class='container'>
         <br/><br/><br/><br/><br/><br/><br/><br/>
     <?php
        $m = $dados["matricula"];
        $sql = "SELECT * FROM vistorias WHERE fiscal = $m AND vistoriaNumero = ''";
        $query = $conexao->query($sql);
        if ($query->num_rows < 1){
			 echo "Não há vistorias pendentes.";
        }else{
            echo '<center><h2>Você tem ' . $query->num_rows . ' vistorias pendentes.</h2></center>
            <form action="visualizarvistorias.php">
                <input type="submit" value="Visualizar Vistorias" />
            </form>';
        }
        
        
        
        
        ?>


		</div>
	</body>
	
	
</html>
