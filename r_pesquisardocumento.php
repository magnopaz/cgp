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

$sql = "SELECT * FROM documentos WHERE $localPesquisa LIKE '%$termoPesquisa%'"; 

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
                $iddocumento = $rs[iddocumento];            
                $data1 = new DateTime($rs[responderate]);
                $data2 = new DateTime(date('Y/m/d'));
                $intervalo = $data1->diff($data2);
                $dias = $intervalo->days;
				echo '<fieldset>
                Documento:<br />' . nl2br2($rs[documento]) . '<br />
                Despachado para:<br />' . nl2br2($rs[despachado]) . '<br />
                Despachado em:<br />' . traduz_data_para_exibir($rs[despachadoem]) . '<br />
                Observacões:<br />' . nl2br2($rs[observacoes]) . '<br />
                Responder até:<br />' . traduz_data_para_exibir($rs[responderate]) . '<br />
                Respondido no:<br />' . nl2br2($rs[respondido]) . '<br />';
                if ($data2 > $data1){
                    echo '<br/>O prazo para responder já foi finalizado.<br/>';
                }else{
                    echo 'Faltam ' . $dias . ' dias para o fim do prazo do resposta.';
                }
                echo '</fieldset>';
                ?>
                <form name="formalterar" method="post" action="alterardocumento.php">
                    
                <input type="hidden" name="iddocumento" value="<?php echo $iddocumento; ?> "/>
                <input type="submit" value="Alterar Documento"/><br/></form><?php
                
			}
		}
        
        
        ?>
        
        
        

        <form action="pesquisardocumento.php">
            <input type="submit" value="Nova Pesquisa" />
        </form>         
        <form action=<?php echo $voltar; ?>>
            <input type="submit" value="Voltar" />
        </form>            


		
	</body>
	
	
</html>