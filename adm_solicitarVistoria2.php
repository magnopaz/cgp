<?php
include "banco.php";


session_start();
if (!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])) {
    header("Location: index.php");
    exit;
}
include "userdata.php";

//$idimovel = $_POST['idimovel'];
$idimovel = settype($_POST['idimovel'], "integer");
//$idimovel = (int)$idimovel;
echo "aqui está o id do imovel ";
echo $idimovel;
echo "\n e seu tipo é: " . gettype($idimovel);
echo " passou o id do imovel";
$sql = "SELECT * FROM disponivel WHERE idimovel = '$idimovel'";
$query = $conexao->query($sql);
$imovel = array();
$imovel = $query->fetch_array();

?>

<html>
    <head>
        <link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="css/estilos.css">

        <title>Pesquisar Imóveis</title>
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
                <li><a class="current" href="admdisponivel.php">Disponível</a></li>
                <li><a href="admvistorias.php">Vistorias</a></li>
                <li><a href="admmensagens.php">Mensagens</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/>
    <center><h1>Solicitar Vistoria em Imóvel</h1></center>

    <form name="formSolicitarVistoria" method="post" action="adm_g_solicitarVistoria2.php">
        <?php
        $sql = "SELECT nome, matricula FROM usuarios WHERE tipo = 3";
        $query = $conexao->query($sql);
        ?>
        <?php echo '<TD>Fiscal</TD><TD><SELECT name="fiscal">' ?>
        <?php
        while ($nomes = $query->fetch_array()) {
            echo '<OPTION VALUE=' . "$nomes[matricula]" . '>' . "$nomes[nome]" . '</OPTION>';
        }
        echo '</SELECT></TD>';
        ?>

        <br />
        <?php
        echo '<fieldset>
                <b>Código do Bairro:</b> ' . nl2br2($imovel[bairroimovel]) . '<br />    
		<b>Código reduzido:</b> ' . nl2br2($imovel[cd_imovel_reduzido]) . '
                <b>Número de Matrícula:</b> ' . nl2br2($imovel[matriculaimovel]) . '<br />
                <b>Cartório:</b> ' . nl2br2($imovel[cartorioimovel]) . '<br />
                <b>Averbação:</b> ' . nl2br2($imovel[averbacaomatricula]) . '<br />
                <b>Denominação:</b> ' . nl2br2($imovel[denominacaoimovel]) . '<br />
                <b>Confrontações:</b> ' . nl2br2($imovel[confrontacao_imovel]) . '<br />
                <b>Tipo:</b> ' . nl2br2($imovel[tipoimovel]) . '<br />
                <b>Área do Imóvel:</b> ' . nl2br2($imovel[areaimovel]) . '<br />
                <b>Situação do Imóvel:</b> ' . nl2br2($imovel[situacaoimovel]) . '<br />
                <b>Última Vistoria:</b>' . traduz_data_para_exibir($imovel[ultima_vistoria]) . '<br/>
                <b>Observações ou Averbações:</b> ' . nl2br2($imovel[observacoesimovel]) . '<br /></fieldset>';
        ?>
        Logradouro:<br /><br /> <textarea name="nm_logradouro" rows="1" cols="30"></textarea><br /><br />
        Número:<br /><br /> <textarea name="nr_imovel_lograd" rows="1" cols="30"></textarea><br /><br />
        Lote:<br /><br /> <textarea name="cd_lote_quadra" rows="1" cols="30"></textarea><br /><br />
        Quadra:<br /><br /> <textarea name="cd_quadra" rows="1" cols="30"></textarea><br /><br />
        Observações da Vistoria:<br /><br /> <textarea name="observacoes" rows="5" cols="100"></textarea><br /><br />

        <input type="hidden" name="idimovel" value="<?php echo $imovel[idimovel]; ?> "/>
        <input type="submit" value="Solicitar Vistoria"/>
    </form>




</body>


</html>