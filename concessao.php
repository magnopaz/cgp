<?php
	include "banco.php";

	
	session_start();
	if(!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])){
		header("Location: index.php");
		exit;
	}
    $vencendo = 0;
	
?>

<html>
	<head>
		<link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />
                <link rel="stylesheet" href="css/estilos.css">

        <title><?php echo 'Bem Vindo ao Painel de Controle de Concessão';?></title>
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
         <center><h2><br/><br/><br/><br/><br/><br/><br/><br/>O prazo para execução das finalidades das concessões abaixo estão terminando em menos de 120 dias:</h2></center>
     <?php
        $sql = "SELECT * FROM concessoes";
        $query = $conexao->query($sql);
        while ($rs = $query->fetch_array()){
                $data1 = new DateTime($rs[dataFinalidade]);
                $data2 = new DateTime(date('Y/m/d'));
                $intervalo = $data1->diff($data2);
                $dias = $intervalo->days;
                if ($data1 > $data2) {
                    if ($dias < 120) {
                       $vencendo++;
                        echo '<div class="concessaoVisualizar"><fieldset>
                        Cessionário:<br />' . nl2br2($rs[cessionario]) . '<br />
                        Número do Processo:<br />' . nl2br2($rs[processoNumero]) . '<br />
                        Data do Processo:<br />' . traduz_data_para_exibir($rs[processoData]) . '<br />
                        Objeto da Concessão:<br />' . nl2br2($rs[objetoConcessao]) . '<br />
                        Finalidade:<br />' . nl2br2($rs[finalidade]) . '<br />
                        Instrumento Legal:<br />' . nl2br2($rs[instrumentoLegal]) . '<br />
                        Data de início:<br />' . traduz_data_para_exibir($rs[dataInicio]) . '<br />
                        Data limite para execução da finalidade:<br />' . traduz_data_para_exibir($rs[dataFinalidade]) . '<br />
                        Data de término:<br />' . traduz_data_para_exibir($rs[dataTermino]) . '<br /><br/>Faltam ' . $dias . ' dias para o terminar o prazo para execução da finalidade da concessão.</fieldset></div>';      
                    }
                }                    
        }
        if ($vencendo == 0){
            echo "<br/><center>Não há concessões com prazo para execução das finalidades com menos de 120 dias.<center/><br/>";
        }
        ?>            
        <center><h2>As concessões abaixo estão terminando em menos de 120 dias:</h2></center>
     <?php
        $sql = "SELECT * FROM concessoes";
        $query = $conexao->query($sql);
        while ($rs = $query->fetch_array()){
                $data1 = new DateTime($rs[dataTermino]);
                $data2 = new DateTime(date('Y/m/d'));
                $intervalo = $data1->diff($data2);
                $dias = $intervalo->days;
                if ($data1 > $data2) {
                    if ($dias < 120) {
                       $vencendo++;
                        echo '<div class="concessaoVisualizar"><fieldset>
                        Cessionário:<br />' . nl2br2($rs[cessionario]) . '<br />
                        Número do Processo:<br />' . nl2br2($rs[processoNumero]) . '<br />
                        Data do Processo:<br />' . traduz_data_para_exibir($rs[processoData]) . '<br />
                        Objeto da Concessão:<br />' . nl2br2($rs[objetoConcessao]) . '<br />
                        Finalidade:<br />' . nl2br2($rs[finalidade]) . '<br />
                        Instrumento Legal:<br />' . nl2br2($rs[instrumentoLegal]) . '<br />
                        Data de início:<br />' . traduz_data_para_exibir($rs[dataInicio]) . '<br />
                        Data limite para execução da finalidade:<br />' . traduz_data_para_exibir($rs[dataFinalidade]) . '<br />
                        Data de término:<br />' . traduz_data_para_exibir($rs[dataTermino]) . '<br /><br/>Faltam ' . $dias . ' dias para o fim da concessão.</fieldset></div>';      
                    }
                }                    
        }
        if ($vencendo == 0){
            echo "<br/><center>Não há concessões vencendo em menos de 120 dias.<center/><br/>";
        }
        ?>


		</div>
	</body>
	
	
</html>
