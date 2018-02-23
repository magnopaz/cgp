<?php
include "banco.php";


session_start();
if (!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])) {
    header("Location: index.php");
    exit;
}
include "userdata.php";
?>

<html>
    <head>
        <link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="css/estilos.css">

        <title><?php echo 'Bem Vindo ao Painel de Controle ' . $dados["nome"]; ?></title>
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
        <br/><br/><br/><br/><br/><br/><br/><br/>
        <div class='container'>

            <?php
            $m = $_POST["idVistoria"];
            $sql = "SELECT * FROM vistorias WHERE idVistoria = $m";

            $query = $conexao->query($sql);
            $rs = $query->fetch_array();

            echo '<fieldset>
                
                <b>Bairro:</b><br />' . nl2br2($rs[nm_bairro_cidade]) . '<br />
                <b>Logradouro:</b><br />' . nl2br2($rs[nm_logradouro]) . '<br />
                <b>Denominação:</b><br />' . nl2br2($rs[denominacao]) . '<br />
                <b>Solicitante:</b><br />' . nl2br2($rs[solicitanteNome]) . '<br />
                <b>Solicitado em:</b><br />' . traduz_data_para_exibir($rs[dataSolicitacao]) . '<br />    
                <b>Código reduzido do imóvel:</b><br />' . nl2br2($rs[cd_imovel_reduzido]) . '<br />    
                <b>Observacões:</b><br />' . nl2br2($rs[observacoes]) . '<br />';

            $ds = "SELECT * FROM disponivel WHERE cd_imovel_reduzido = $rs[cd_imovel_reduzido]";
            $queryds = $conexao->query($ds);
            if ($queryds->num_rows == 1) {
                $d = $queryds->fetch_array();
                $s = "SELECT * FROM situacoesdeimovel WHERE idsituacao = '$d[situacaoimovel]'";
                $querys = $conexao->query($s);
                $si = $querys->fetch_array();
                echo '<b>Matrícula do Imóvel:</b><br />' . nl2br2($d[matriculaimovel]) . '<br />'
                . '<b>Averbação da Matrícula:</b><br />' . nl2br2($d[averbacaomatricula]) . '<br />'
                . '<b>Cartório:</b><br />' . nl2br2($d[cartorioimovel]) . 'º CRI<br />'
                . '<b>Bairro no Disponível:</b><br />' . nl2br2($d[bairroimovel]) . '<br />'
                . '<b>Denominação do Imóvel no disponível:</b><br />' . nl2br2($d[denominacaoimovel]) . '<br />'
                . '<b>Área do Imóvel no disponível:</b><br />' . nl2br2($d[areaimovel]) . '<br />'
                . '<b>Situação do Imóvel:</b><br />' . nl2br2($si[descricao]) . '<br />'
                . '<b>Observações do Disponível:</b><br />' . nl2br2($d[observacoesimovel]) . '<br />';
                if ($d[situacaoimovel] == 5) {
                    $c = "SELECT * FROM associaconcessao WHERE idimovel = '$d[idimovel]'";
                    $queryc = $conexao->query($c);
                    if ($queryc->num_rows == 1) {
                        $ci = $queryc->fetch_array();
                        $co = "SELECT * FROM concessoes WHERE idConcessao = '$ci[idConcessao]'";
                        $queryco = $conexao->query($co);
                        $con = $queryco->fetch_array();
                        echo '
                <b>Cessionário:</b><br />' . nl2br2($con[cessionario]) . '<br />
                <b>Número do Processo:</b><br />' . nl2br2($con[processoNumero]) . '<br />
                <b>Data do Processo:</b><br />' . traduz_data_para_exibir($con[processoData]) . '<br />
                <b>Objeto da Concessão:</b><br />' . nl2br2($con[objetoConcessao]) . '<br />
               <b>Finalidade:</b><br />' . nl2br2($con[finalidade]) . '<br />
                <b>Instrumento Legal:</b><br />' . nl2br2($con[instrumentoLegal]) . '<br />
                <b>Data de Início:</b><br />' . traduz_data_para_exibir($con[dataInicio]) . '<br />
                <b>Data limite para execução da finalidade:</b><br />' . traduz_data_para_exibir($con[dataFinalidade]) . '<br />
                <b>Data de Término:</b><br />' . traduz_data_para_exibir($con[dataTermino]) . '<br/>
                <b>Observações da Concessão:</b><br />' . nl2br2($con[observacao]) . '<br /><br />';
                    }
                }
            }
            
                    

            echo '</fieldset><br />';
            ?>

            <a href="fiscal.php">voltar          
            </a>
    </body>


</html>
