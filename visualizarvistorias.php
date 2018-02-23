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
            $m = $dados["matricula"];
            $sql = "SELECT * FROM vistorias WHERE fiscal = $m AND vistoriaNumero = ''";

            $query = $conexao->query($sql);
            while ($rs = $query->fetch_array()) {

                echo '<fieldset>
                Bairro:<br />' . nl2br2($rs[nm_bairro_cidade]) . '<br />
                Logradouro:<br />' . nl2br2($rs[nm_logradouro]) . '<br />
                Denominação:<br />' . nl2br2($rs[denominacao]) . '<br />
                Solicitante:<br />' . nl2br2($rs[solicitanteNome]) . '<br />
                Solicitado em:<br />' . traduz_data_para_exibir($rs[dataSolicitacao]) . '<br />    
                Código reduzido do imóvel:<br />' . nl2br2($rs[cd_imovel_reduzido]) . '<br />    
                Observacões:<br />' . nl2br2($rs[observacoes]) . '<br /><form name="formdetalhesvistoria" method="post" action="detalhesvistoria.php">
                
                    <input type="hidden" name="idVistoria" value="' . $rs[idVistoria] . '"/>
                    <input type="submit" value="Visualizar mais detalhes"/><br/></form></fieldset><br />';
            }
            ?>
            <a href="fiscal.php">voltar          
            </a>
    </body>


</html>
