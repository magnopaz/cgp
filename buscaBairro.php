<html>
	<head>
		<link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />
                <link rel="stylesheet" href="css/estilos.css">

        <title><?php echo 'Bairros de Uberlândia';?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	 <body id="home">
	<div class="wrap">
		<div id="logo">
                    <h1><a href="." title="Home">Sistema CGP</a></h1>
                    <p>Desenvolvido por Magno Paz</p>
        </div></div>
             <div class='container'>
                 
        <center><br/><br/><br/><br/><br/><br/><h2>Utilize o "Ctrl+f" para buscar o nome do bairro</h2><br /></center>
        
     <?php
        include "banco.php";
        $sql = "SELECT * FROM bairros";
        $query = $conexao->query($sql);
        while ($tl = $query->fetch_array()){
                        echo '<fieldset><div class="telefoneVisualizar">
                        Nome do Bairro: ' . nl2br2($tl[nm_bairro_cidade]) . '<br />
                        Número: ' . nl2br2($tl[cd_bairro]) . '<br /></fieldset>';      
                                       
        }

        ?>            

		</div>
	</body>
	
	
</html>