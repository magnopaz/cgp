<?php
	include "banco.php";

	
	session_start();
	if(!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])){
		header("Location: index.php");
		exit;
	}
	include "userdata.php";
$termoPesquisa = mysqli_real_escape_string($conexao,$_POST['termoPesquisa']);
$localPesquisa = mysqli_real_escape_string($conexao,$_POST['localPesquisa']);

$sql = "SELECT * FROM concessoes WHERE $localPesquisa LIKE '%$termoPesquisa%'"; 

?>

<html>
	<head>
		<link rel="stylesheet" href="css/estilos.css">
        <title><?php echo 'Resultado da Pesquisa';?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
        <?php
            $query = $conexao->query($sql);
		    if ($query->num_rows < 1){
			 echo "Não há resultados para esta pesquisa.";
            }
            else{
		      echo 'Foram encontrados ' . $query->num_rows . ' resultados<br />';
			while ($rs = $query->fetch_array()){
                $idConcessao = $rs[idConcessao];            
                $data1 = new DateTime($rs[dataTermino]);
                $data2 = new DateTime(date('Y/m/d'));
                $intervalo = $data1->diff($data2);
                $dias = $intervalo->days;
				echo '<fieldset>
                Cessionário:<br />' . nl2br2($rs[cessionario]) . '<br />
                Número do Processo:<br />' . nl2br2($rs[processoNumero]) . '<br />
                Data do Processo:<br />' . traduz_data_para_exibir($rs[processoData]) . '<br />
                Objeto da Concessão:<br />' . nl2br2($rs[objetoConcessao]) . '<br />
                Finalidade:<br />' . nl2br2($rs[finalidade]) . '<br />
                Instrumento Legal:<br />' . nl2br2($rs[instrumentoLegal]) . '<br />
                Data de início:<br />' . traduz_data_para_exibir($rs[dataInicio]) . '<br />
                Data limite para execução da finalidade:<br />' . traduz_data_para_exibir($rs[dataFinalidade]) . '<br />
                Data de término:<br />' . traduz_data_para_exibir($rs[dataTermino]) . '<br/>
                Observações:<br />' . nl2br2($rs[observacao]) . '<br /><br />';
                if ($data2 > $data1){
                    echo '<br/>O prazo desta concessão já foi finalizado.<br/>';
                }else{
                    echo 'Faltam ' . $dias . ' dias para o fim da concessão.';
                }
                echo '</fieldset>';
                ?>
                <form name="formalterar" method="post" action="alterarConcessao.php">
                    
                <input type="hidden" name="idConcessao" value="<?php echo $idConcessao; ?> "/>
                <input type="submit" value="Alterar concessão"/><br/></form><?php
                
			}
		}
        
        
        ?>
        
        
        

        <form action="pesquisarconcessao.php">
            <input type="submit" value="Nova Pesquisa" />
        </form>         
        <form action=<?php echo $voltar; ?>>
            <input type="submit" value="Voltar" />
        </form>            


		
	</body>
	
	
</html>