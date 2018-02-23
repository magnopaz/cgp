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
                <li><a href="adm.php">Documentos</a></li>
                <li><a href="admconcessao.php">Concessão</a></li>
                <li><a href="admdisponivel.php">Disponível</a></li>
                <li><a class="current" href="admvistorias.php">Vistorias</a></li>
                <li><a href="admmensagens.php">Mensagens</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/>
        <div class='container'>

            <?php
            $sql = "SELECT * FROM vistorias WHERE vistoriaNumero != 0";

            $query = $conexao->query($sql);
            while ($rs = $query->fetch_array()) {
                $idVistoria = $rs[idVistoria];
                echo '<fieldset>
                Bairro:<br />' . nl2br2($rs[nm_bairro_cidade]) . '<br />
                Logradouro:<br />' . nl2br2($rs[nm_logradouro]) . '<br />
                Denominação:<br />' . nl2br2($rs[denominacao]) . '<br />
                Fiscal:<br />' . nl2br2($rs[fiscalnome]) . '<br />
                Solicitante:<br />' . nl2br2($rs[solicitanteNome]) . '<br />
                Solicitado em:<br />' . traduz_data_para_exibir($rs[dataSolicitacao]) . '<br />    
                Código reduzido do imóvel:<br />' . nl2br2($rs[cd_imovel_reduzido]) . '<br />    
                Observacões:<br />' . nl2br2($rs[observacoes]) . '<br />
                Número do laudo:<br />' . nl2br2($rs[vistoriaNumero]) . '<br />
                Data da vistoria:<br />' . traduz_data_para_exibir("$rs[dataVistoria]") . '<br />
                Id do Imóvel:<br />' . nl2br2($rs[idimovel]) . '<br /></fieldset><br />';
                ?>
                <form name="form_imprimir" method="post" action="adm_imprimir_vistoria.php">

                    <input type="hidden" name="idVistoria" value="<?php echo $idVistoria; ?> "/>
                    <input type="submit" value="Imrimir Vistoria"/></form>
            <form name="form_editar" method="post" action="adm_editar_vistoria.php">

                    <input type="hidden" name="idVistoria" value="<?php echo $idVistoria; ?> "/>
                    <input type="submit" value="Editar Vistoria"/><br/></form><?php } ?>


    </body>


</html>
