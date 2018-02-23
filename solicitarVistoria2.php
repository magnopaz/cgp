<?php
include "banco.php";


session_start();
if (!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])) {
    header("Location: index.php");
    exit;
}
include "userdata.php";
if ($_POST['nova'] == 1) {

    $imovel[denominacao] = $_POST['cd_imovel_reduzido'];
    $imovel[nm_bairro_cidade] = $_POST['nm_bairro_cidade'];
    $imovel[nm_logradouro] = $_POST['nm_logradouro'];
    $imovel[nr_imovel_lograd] = $_POST['nr_imovel_lograd'];
    $imovel[cd_lote_quadra] = $_POST['cd_lote_quadra'];
    $imovel[cd_quadra] = $_POST['cd_quadra'];
    $imovel[nr_area_terri_lote] = $_POST['nr_area_terri_lote'];
    $imovel[cd_imovel_reduzido] = $_POST['cd_imovel_reduzido'];
    $imovel[denominacao] = $_POST['denominacao'];
} else {
    $cd_imovel_reduzido = $_POST['cd_imovel_reduzido'];
    $sql = "SELECT * FROM disponivel WHERE cd_imovel_reduzido = '$cd_imovel_reduzido'";
    $query = $conexao->query($sql);
    if ($query->num_rows < 1) {
            echo "Não há resultados para esta pesquisa.";
        } else {
    $imoveldisponivel = $query->fetch_array();
        }
    $sql = "SELECT * FROM prefeitura WHERE cd_imovel_reduzido = '$cd_imovel_reduzido'";
    $query = $conexao->query($sql);
        if ($query->num_rows < 1) {
            echo "Não há resultados para esta pesquisa.";
        } else {
    $imovel = $query->fetch_array();
        }
}
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
                <li><a class="current" href="disponivel.php">Disponível</a></li>
                <li><a href="cadastrarconcessao.php">Concessões</a></li>
                <li><a href="pesquisarconcessao.php">Vistorias</a></li>
                <li><a href="mensagens.php">Mensagens</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/>
    <center><h1>Pesquisar Imóveis</h1></center>

    <form name="formSolicitarVistoria" method="post" action="g_solicitarVistoria2.php">
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
        Logradouro:<br /><br /> <textarea name="nm_logradouro" rows="1" cols="30"><?php echo "$imovel[nm_logradouro]"; ?></textarea><br /><br />
        Número:<br /><br /> <textarea name="nr_imovel_lograd" rows="1" cols="30"><?php echo "$imovel[nr_imovel_lograd]"; ?></textarea><br /><br />
        Lote:<br /><br /> <textarea name="cd_lote_quadra" rows="1" cols="30"><?php echo "$imovel[cd_lote_quadra]"; ?></textarea><br /><br />
        Quadra:<br /><br /> <textarea name="cd_quadra" rows="1" cols="30"><?php echo "$imovel[cd_quadra]"; ?></textarea><br /><br />
        Observações da Vistoria:<br /><br /> <textarea name="observacoes" rows="5" cols="100"></textarea><br /><br />


        <input type="submit" value="Solicitar Vistoria"/>
    </form>




</body>


</html>