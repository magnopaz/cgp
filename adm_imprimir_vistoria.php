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
        

        <title><?php echo 'Vistoria para ' . $rs[fiscalnome] . " " . traduz_data_para_exibir("$rs[dataSolicitacao]") . " " . $rs[nm_bairro_cidade] . " " . $rs[denominacao]; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body id="home">
       
    <center><h2>Solicitação de Vistoria</h2></center><br /><br />
        <form name="formconcessao" method="post" action="admvistorias.php">
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
            
        </form>




    </body>


</html>
