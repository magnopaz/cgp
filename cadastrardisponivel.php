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
        <title><?php echo 'Cadastrando Disponível'; ?></title>
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
        <form name="formdisponivel" method="post" action="g_admcadastrardisponivel.php">
            <?php
            $sql = "SELECT * FROM `bairros` ORDER BY `bairros`.`nm_bairro_cidade` ASC";
            $query = $conexao->query($sql);
            echo '<TD>Bairro: </TD><TD><SELECT name="bairroimovel">';
            ?>
            <?php
            while ($nomesbairros = $query->fetch_array()) {
                echo '<OPTION VALUE=' . "$nomesbairros[cd_bairro]" . '>' . "$nomesbairros[nm_bairro_cidade]" . ' nº: ' ."$nomesbairros[cd_bairro]" . '</OPTION>';
            }
            echo '</SELECT></TD>';
            ?>
            Código reduzido: <input type="text" name="cd_imovel_reduzido" /><br /><br />
            Matrícula nº: <textarea name="matriculaimovel" rows="1" cols="15"></textarea>
            Cartório: <SELECT name="cartorioimovel">
                <OPTION VALUE="1">1º</OPTION>
                <OPTION VALUE="2">2º</OPTION>
            </SELECT>
            Averbação: <textarea name="averbacaomatricula" rows="1" cols="32"></textarea><br /><br />
            Denominação: <textarea name="denominacaoimovel" rows="1" cols="80"></textarea><br /><br />
            Confrontações: <br /><br /> <textarea name="confrontacao_imovel" rows="3" cols="100"></textarea><br /><br />
            Tipo: <SELECT name="tipoimovel">
                <OPTION VALUE="1">Institucional</OPTION>
                <OPTION VALUE="2">Verde</OPTION>
                <OPTION VALUE="3">Dominial</OPTION>
                <OPTION VALUE="4">Sistema Viário</OPTION>
                <OPTION VALUE="5">Lote</OPTION>
                <OPTION VALUE="6">Outros</OPTION>
            </SELECT>
            Área do imóvel: <input type="text" name="areaimovel" />
            Situação do imóvel: <SELECT name="situacaoimovel">
                <OPTION VALUE="1">Livre</OPTION>
                <OPTION VALUE="2">Invadido</OPTION>
                <OPTION VALUE="3">Equipamento Público</OPTION>
                <OPTION VALUE="4">Praça</OPTION>
                <OPTION VALUE="5">Concedido</OPTION>
                <OPTION VALUE="6">Alienado</OPTION>
                <OPTION VALUE="7">Desdobrado</OPTION>
                <OPTION VALUE="8">Unificado</OPTION>
                <OPTION VALUE="9">Retificado</OPTION>
                <OPTION VALUE="10">Sendo Caracterizado</OPTION>
            </SELECT><br /><br />
            Observações ou Averbações:<br /><br /> <textarea name="observacoesimovel" rows="3" cols="100"></textarea><br /><br />

            <input type="submit" value="Cadastrar Imóvel no Disponível"/>
        </form>

        <form action=<?php echo $voltar; ?>>
            <input type="submit" value="Voltar" />
        </form>


    </body>


</html>