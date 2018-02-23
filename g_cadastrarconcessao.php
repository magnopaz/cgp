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
				setTimeout("window.location='cadastrarconcessao.php'", 5000);
				
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
        
        
                $concessaogravar = array();
                $concessaogravar['cessionario']=mysqli_real_escape_string($conexao,$_POST['cessionario']);
                $concessaogravar['finalidade']=mysqli_real_escape_string($conexao,$_POST['finalidade']);
                $concessaogravar['processoNumero']=mysqli_real_escape_string($conexao,$_POST['processoNumero']);
                if (isset($_POST['processoData'])){
                    $concessaogravar['processoData']= traduz_data_para_banco($_POST['processoData']);
                } else {
                    $concessaogravar['processoData'] = '';
                }

                $concessaogravar['objetoConcessao']=mysqli_real_escape_string($conexao,$_POST['objetoConcessao']);
                $concessaogravar['instrumentoLegal']=mysqli_real_escape_string($conexao,$_POST['instrumentoLegal']);
                if (isset($_POST['dataInicio'])){
                    $concessaogravar['dataInicio']= traduz_data_para_banco($_POST['dataInicio']);
                } else {
                    $concessaogravar['dataInicio'] = '';
                }
                if (isset($_POST['dataFinalidade'])){
                    $concessaogravar['dataFinalidade']= traduz_data_para_banco($_POST['dataFinalidade']);
                } else {
                    $concessaogravar['dataFinalidade'] = '';
                }
                if (isset($_POST['dataTermino'])){
                    $concessaogravar['dataTermino']= traduz_data_para_banco($_POST['dataTermino']);
                } else {
                    $concessaogravar['dataTermino'] = '';
                }

                $concessaogravar['observacao']=mysqli_real_escape_string($conexao,$_POST['observacao']);
                
                
                $c1 = mysqli_real_escape_string($conexao,$_POST['cessionario']);
                $c2 = mysqli_real_escape_string($conexao,$_POST['objetoConcessao']);

                grava_concessao($conexao, $concessaogravar);

                $sqlBusca = "SELECT * FROM concessoes WHERE cessionario = '$c1' AND objetoConcessao = '$c2'";
                $sql = mysqli_query($conexao, $sqlBusca);
                $row = mysqli_num_rows($sql);
                if($row > 0){
                    echo "<center>Concessão gravada com sucesso!</center>";
                    echo "<script>gravasuccessfully()</script>";
                }else{
                    echo "<center>Falha na gravação.</center>";	
                    echo "<script>gravafailed()</script>";
                }
        ?>

	</body>
	
</html>
