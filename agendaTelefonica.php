<html>
	<head>
		<link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />
                <link rel="stylesheet" href="css/estilos.css">

        <title><?php echo 'Agenda Telefônica';?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	 <body id="home">
	<div class="wrap">
		<div id="logo">
                    <h1><a href="." title="Home">Sistema CGP</a></h1>
                    <p>Desenvolvido por Magno Paz</p>
        </div></div>
             <div class='container'>
                 
        <center><br/><br/><br/><br/><br/><br/><h2>Cadastrar Telefone</h2><br /></center>
        <fieldset><form name="formTelefone" method="post" action="g_cadastrarTelefone.php">
            <br/>Nome:<textarea name="nome" rows="1" cols="97"></textarea><br /><br />
            Local/Secretaria: <textarea name="local" rows="1" cols="88"></textarea><br /><br />
            Divisão: <textarea name="divisao" rows="1" cols="95"></textarea><br /><br />
            Telefone: <input name="telefone" rows="1" cols="15"/><br /><br />
            E-mail:<textarea name="email" rows="1" cols="96"></textarea><br /><br />
        
            <center><input type="submit" value="Cadastrar"/></center>
	</form></fieldset>
         <center><h2><br/><br/>Telefones Cadastrados</h2></center>
     <?php
        include "banco.php";
        $sql = "SELECT * FROM telefones";
        $query = $conexao->query($sql);
        while ($tl = $query->fetch_array()){
                        echo '<fieldset><div class="telefoneVisualizar">
                        Nome:<br />' . nl2br2($tl[nome]) . '<br />
                        Local/Secretaria:<br />' . nl2br2($tl[local]) . '<br />
                        Divisão:<br />' . nl2br2($tl[divisao]) . '<br />
                        Telefone:<br />' . nl2br2($tl[telefone]) . '<br />
                        E-mail:<br />' . nl2br2($tl[email]) . '<br /></fieldset>';      
                                       
        }

        ?>            

		</div>
	</body>
	
	
</html>