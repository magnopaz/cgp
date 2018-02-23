<?php include "banco.php"; ?>
<html>
	<head>
		<title>Autenticando o usuário</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script type="text/javascript">
			function loginconcessao(){
				setTimeout("window.location='concessao.php'", 1);
				
			}
                        function logindisponivel(){
                            setTimeout("window.location='disponivel.php'", 1);
				
			}
                        function loginfiscal(){
                            setTimeout("window.location='fiscal.php'", 1);
				
			}
                        function loginsuccessfully(){
                            setTimeout("window.location='painel.php'", 1);
				
			}
                        function loginadm(){
                            setTimeout("window.location='adm.php'", 1);
				
			}
			function loginfailed(){
				setTimeout("window.location='index.php'", 3000);
				
			}
		</script>
		
	</head>
	<body>
<?php
        $matricula=mysqli_real_escape_string($conexao, $_POST['usuario']);
        $senha=mysqli_real_escape_string($conexao, $_POST['senha']);
        $sqlBusca = "SELECT * FROM usuarios WHERE matricula = '$matricula' AND senha = '$senha'";
        $sql = mysqli_query($conexao, $sqlBusca);
        $usuario = $sql->fetch_array();
        $row = mysqli_num_rows($sql);
        if($row > 0){
            session_start();
            $_SESSION['usuario']=$_POST['usuario'];
            $_SESSION['senha']=$_POST['senha'];
            echo "<center>Login efetuado com sucesso!</center>";
            if ($usuario['tipo'] == 1){
                echo "<script>loginconcessao()</script>";
            } else if ($usuario['tipo'] == 2){
                echo "<script>logindisponivel()</script>";
            } else if ($usuario['tipo'] == 3){
                echo "<script>loginfiscal()</script>";
            } else if ($usuario['tipo'] == 6){
                echo "<script>loginadm()</script>";
            }else {
                echo "<script>loginsuccessfully()</script>";
            }
            
        }else{
            echo "<center>Usuário ou senha inválidos!</center>";	
            echo "<script>loginfailed()</script>";

        }
?>
		
		
	</body>
	
</html>