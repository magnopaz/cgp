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
        <center><h1><br/><br/><br/><br/><br/><br/>Solicitação de Cadastro</h1><br /><h3>Atenção, os campos nome, matrícula e senha são obrigatórios.<br /></h3></center>
        <form name="formSolicitaCadastro" method="post" action="g_solicitarCadastro.php">
            Nome:<textarea name="nome" rows="1" cols="80"></textarea><br /><br />
            Matrícula (sem o dígito): <input type="text" name="matricula" /><br /><br />
            Senha: <input type="text" name="senha" /><br /><br />
            Observações:<br /><br /><textarea name="observacoes" rows="3" cols="100"></textarea><br /><br />
        
            <input type="submit" value="Solicitar Cadastro"/>
	</form>
            </div>
  		
	</body>
	
	
</html>