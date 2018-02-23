<?php
include "banco.php";


session_start();
if (!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])) {
    header("Location: index.php");
    exit;
}
include "userdata.php";
$idVistoria = $_POST['idVistoria'];
$sql = "SELECT * FROM vistorias WHERE idVistoria = '$idVistoria'";
$query = $conexao->query($sql);
$rs = $query->fetch_array();
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

        <form name="formeditar" method="post" action="adm_g_editar_vistoria.php">

            Fiscal:<textarea name="fiscalnome" rows="1" cols="30"><?php echo "$rs[fiscalnome]"; ?></textarea><t />
            Solicitante: <textarea name="solicitanteNome" rows="1" cols="22"><?php echo "$rs[solicitanteNome]"; ?></textarea>
            Data: <textarea name="dataSolicitacao" rows="1" cols="10"><?php echo traduz_data_para_exibir("$rs[dataSolicitacao]"); ?></textarea><br /><br />
            Denominação do Imóvel: <textarea name="denominacao" rows="1" cols="68"><?php echo "$rs[denominacao]"; ?></textarea><br /><br />
            Logradouro: <textarea name="nm_logradouro" rows="1" cols="62"><?php echo "$rs[nm_logradouro]"; ?></textarea>
            Número:<textarea name="nr_imovel_lograd" rows="1" cols="5"><?php echo "$rs[nr_imovel_lograd]"; ?></textarea><br /><br />
            Lote:<textarea name="cd_lote_quadra" rows="1" cols="3"><?php echo "$rs[cd_lote_quadra]"; ?></textarea>
            Quadra: <textarea name="cd_quadra" rows="1" cols="3"><?php echo "$rs[cd_quadra]"; ?></textarea>
            Bairro: <textarea name="nm_bairro_cidade" rows="1" cols="30"><?php echo "$rs[nm_bairro_cidade]"; ?></textarea>
            Código Imóvel: <textarea name="cd_imovel_reduzido" rows="1" cols="10"><?php echo "$rs[cd_imovel_reduzido]"; ?></textarea><br /><br />
            Observações:<br /><br /> <textarea name="observacoes" rows="5" cols="90"><?php echo "$rs[observacoes]"; ?></textarea><br /><br />
            Número do laudo: <textarea name="vistoriaNumero" rows="1" cols="5"><?php echo "$rs[vistoriaNumero]"; ?></textarea><br /><br />
            Data da vistoria: <textarea name="dataVistoria" rows="1" cols="10"><?php echo traduz_data_para_exibir("$rs[dataVistoria]"); ?></textarea><br /><br />
            Id do Imóvel: <textarea name="idimovel" rows="1" cols="10"><?php echo "$rs[idimovel]"; ?></textarea><br /><br />
            <input type="hidden" name="idVistoria" value="<?php echo $idVistoria; ?> "/>
            <input type="submit" value="Editar Vistoria"/></form>

        <form action=<?php echo $voltar; ?>>
            <input type="submit" value="Voltar" />
        </form>
        <br>
        <a href="logout.php">Sair</a>


    </body>


</html>
