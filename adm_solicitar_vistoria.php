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
    <center><h1>Solicitar Vistoria</h1></center>

    <form name="formSolicitarVistoria" method="post" action="g_solicitarVistoria.php">
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


        $sql = "SELECT * FROM `bairros` ORDER BY `bairros`.`nm_bairro_cidade` ASC";
        $query = $conexao->query($sql);
        echo '<TD>Bairro: </TD><TD><SELECT name="nm_bairro_cidade">';
        ?>
        <?php
        while ($nomesbairros = $query->fetch_array()) {
            echo '<OPTION VALUE=' . "$nomesbairros[nm_bairro_cidade]" . '>' . "$nomesbairros[nm_bairro_cidade]" . ' nº: ' . "$nomesbairros[cd_bairro]" . '</OPTION>';
        }
        echo '</SELECT></TD>';

        ?>
        <br />Logradouro:<br /><br /> <textarea name="nm_logradouro" rows="1" cols="30"></textarea><br /><br />
        Número:<br /><br /> <textarea name="nr_imovel_lograd" rows="1" cols="30"></textarea><br /><br />
        Lote:<br /><br /> <textarea name="cd_lote_quadra" rows="1" cols="30"></textarea><br /><br />
        Quadra:<br /><br /> <textarea name="cd_quadra" rows="1" cols="30"></textarea><br /><br />
        Código Reduzido:<br /><br /> <textarea name="cd_imovel_reduzido" rows="1" cols="30"></textarea><br /><br />
        Denominação do Imóvel:<br /><br /> <textarea name="denominacao" rows="1" cols="30"></textarea><br /><br />
        Observações da Vistoria:<br /><br /> <textarea name="observacoes" rows="5" cols="100"></textarea><br /><br />



        <input type="submit" value="Solicitar Vistoria"/>
    </form>




</body>


</html>