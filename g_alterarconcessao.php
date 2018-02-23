<html>
	<head>
		<title>Gravando Concessão</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script type="text/javascript">
			function gravasuccessfully(){
				setTimeout("window.location='concessao.php'", 5000);
				echo 
			}
			function gravafailed(){
				setTimeout("window.location='concessao.php'", 5000);
				
			}
			
		</script>
		
	</head>
	<body>


        <?php 
            include "banco.php";

        	session_start();
            if(!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])){
                header("Location: index.php");
                exit;
            }
        
        
                $idConcessao = $_POST['idConcessao'];
                $cessionario=mysqli_real_escape_string($conexao,$_POST['cessionario']);
                $finalidade=mysqli_real_escape_string($conexao,$_POST['finalidade']);
                $processoNumero=mysqli_real_escape_string($conexao,$_POST['processoNumero']);
                if (isset($_POST['processoData'])){
                    $processoData= traduz_data_para_banco($_POST['processoData']);
                } else {
                    $processoData = '';
                }

                $objetoConcessao=mysqli_real_escape_string($conexao,$_POST['objetoConcessao']);
                $instrumentoLegal=mysqli_real_escape_string($conexao,$_POST['instrumentoLegal']);
                $observacao=mysqli_real_escape_string($conexao,$_POST['observacao']);
                if (isset($_POST['dataInicio'])){
                    $dataInicio= traduz_data_para_banco($_POST['dataInicio']);
                } else {
                    $dataInicio = '';
                }
                if (isset($_POST['dataFinalidade'])){
                    $dataFinalidade= traduz_data_para_banco($_POST['dataFinalidade']);
                } else {
                    $dataFinalidade = '';
                }
                if (isset($_POST['dataTermino'])){
                    $dataTermino= traduz_data_para_banco($_POST['dataTermino']);
                } else {
                    $dataTermino = '';
                }

                $c1 = mysqli_real_escape_string($conexao,$_POST['cessionario']);
                $c2 = mysqli_real_escape_string($conexao,$_POST['objetoConcessao']);

                $up = "UPDATE concessoes SET cessionario = '$cessionario', finalidade = '$finalidade', processoNumero = '$processoNumero', processoData = '$processoData', objetoConcessao = '$objetoConcessao', instrumentoLegal = '$instrumentoLegal', dataInicio = '$dataInicio', dataFinalidade = '$dataFinalidade', dataTermino = '$dataTermino', observacao = '$observacao'  WHERE idConcessao = '$idConcessao'";
                mysqli_query($conexao, $up);


                $sqlBusca = "SELECT * FROM concessoes WHERE cessionario = '$c1' AND objetoConcessao = '$c2'";
                $sql = mysqli_query($conexao, $sqlBusca);
                $row = mysqli_num_rows($sql);
                if($row > 0){
                    echo "<center>Alteração gravada com sucesso!</center>";
                    echo "<script>gravasuccessfully()</script>";
                }else{
                    echo "<center>Falha na gravação.</center>";	
                    echo "<script>gravafailed()</script>";
                }
        ?>

	</body>
	
</html>
