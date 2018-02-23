<html>
	<head>
		<title>Gravando Cadastro de Telefone</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script type="text/javascript">
			function gravasuccessfully(){
				setTimeout("window.location='agendaTelefonica.php'", 1);
				echo 
			}
			function gravafailed(){
				setTimeout("window.location='agendaTelefonica.php'", 5000);
				
			}
			
		</script>
		
	</head>
	<body>


        <?php 
            include "banco.php";

      
        
                $CadastroGravar = array();
                $CadastroGravar['nome']=mysqli_real_escape_string($conexao,$_POST['nome']);
                $CadastroGravar['telefone']=mysqli_real_escape_string($conexao,$_POST['telefone']);
                $CadastroGravar['email']=mysqli_real_escape_string($conexao,$_POST['email']);
                $CadastroGravar['local']=mysqli_real_escape_string($conexao,$_POST['local']);
                $CadastroGravar['divisao']=mysqli_real_escape_string($conexao,$_POST['divisao']);

                $c1 = mysqli_real_escape_string($conexao,$_POST['nome']);
                $c2 = mysqli_real_escape_string($conexao,$_POST['telefone']);

                
                function grava_Cadastro($conexao, $CadastroGravar){
    $sqlGravar = "INSERT INTO telefones (nome, telefone, email, local, divisao) VALUES ('{$CadastroGravar['nome']}', '{$CadastroGravar['telefone']}', '{$CadastroGravar['email']}', '{$CadastroGravar['local']}', '{$CadastroGravar['divisao']}')";
    mysqli_query($conexao, $sqlGravar);
}

                grava_Cadastro($conexao, $CadastroGravar);

                $sqlBusca = "SELECT * FROM telefones WHERE nome = '$c1' AND telefone = '$c2'";
                $sql = mysqli_query($conexao, $sqlBusca);
                $row = mysqli_num_rows($sql);
                if($row > 0){
                    echo "<center>Cadastro realizado com sucesso.</center>";
                    echo "<script>gravasuccessfully()</script>";
                }else{
                    echo "<center>Falha na gravação.</center>";	
                    echo "<script>gravafailed()</script>";
                }
        ?>

	</body>
	
</html>