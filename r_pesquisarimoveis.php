<?php
include "banco.php";


session_start();
if (!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])) {
    header("Location: index.php");
    exit;
}
include "userdata.php";


$termoPesquisa = mysqli_real_escape_string($conexao, $_POST['termoPesquisa']);
$localPesquisa = mysqli_real_escape_string($conexao, $_POST['localPesquisa']);

$sql = "SELECT * FROM disponivel WHERE $localPesquisa LIKE '%$termoPesquisa%'";
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
    </div>
    <br/><br/><br/><br/><br/><br/><br/><br/>
<center><h1>Resultado da Pesquisa</h1></center>

<?php
$query = $conexao->query($sql);
if ($query->num_rows < 1) {
    echo "Não há resultados para esta pesquisa.";
} else {
    echo 'Foram encontrados ' . $query->num_rows . ' resultados<br />';
    while ($imovel_disponivel = $query->fetch_array()) {
        echo '<fieldset>
                <b>Código do Bairro:</b> ' . nl2br2($imovel_disponivel[bairroimovel]) . '<br />    
		<b>Código reduzido:</b> ' . nl2br2($imovel_disponivel[cd_imovel_reduzido]) . '
                <b>Número de Matrícula:</b> ' . nl2br2($imovel_disponivel[matriculaimovel]) . '<br />
                <b>Cartório:</b> ' . nl2br2($imovel_disponivel[cartorioimovel]) . '<br />
                <b>Averbação:</b> ' . nl2br2($imovel_disponivel[averbacaomatricula]) . '<br />
                <b>Denominação:</b> ' . nl2br2($imovel_disponivel[denominacaoimovel]) . '<br />
                <b>Confrontações:</b> ' . nl2br2($imovel_disponivel[confrontacao_imovel]) . '<br />
                <b>Tipo:</b> ' . nl2br2($imovel_disponivel[tipoimovel]) . '<br />
                <b>Área do Imóvel:</b> ' . nl2br2($imovel_disponivel[areaimovel]) . '<br />
                <b>Situação do Imóvel:</b> ' . nl2br2($imovel_disponivel[situacaoimovel]) . '<br />
                <b>Observações ou Averbações:</b> ' . nl2br2($imovel_disponivel[observacoesimovel]) . '<br /></fieldset>';
        ?>
        <form name="formselecionaVistoria" method="post" action="solicitarVistoria2.php">

            <input type="hidden" name="idimovel" value="<?php echo $imovel_disponivel[idimovel]; ?> "/>
            <input type="hidden" name="nova" value="0"/>
            <input type="submit" value="Solicitar Vistoria"/><br/></form><?php
    }
}
?>



<br>
<form action="pesquisardisponivel.php">
    <input type="submit" value="Nova Pesquisa" />
</form>
<form action=<?php echo $voltar; ?>>
    <input type="submit" value="Voltar" />
</form>         



</body>


</html>
