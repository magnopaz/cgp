<?php
include "banco.php";


session_start();
if (!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])) {
    header("Location: index.php");
    exit;
}
include "userdata.php";
$vencendo = 0;
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
                <li><a class="current" href="adm.php">Documentos</a></li>
                <li><a href="admconcessao.php">Concessão</a></li>
                <li><a href="admdisponivel.php">Disponível</a></li>
                <li><a href="admvistorias.php">Vistorias</a></li>
                <li><a href="admmensagens.php">Mensagens</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/>
        <nav class="menu-opcoes">
            <ul>
                <li><a href="cadastrardocumento.php">Cadastrar Documento</a></li>
                <li><a href="pesquisardocumento.php">Pesquisar Documento</a></li>
            </ul>
        </nav>
        <?php
        echo '<center><h2>Hoje é dia ' . date('d/m/Y') . '</h2></center>';
        $sql = "SELECT * FROM documentos";
        $query = $conexao->query($sql);
        while ($rs = $query->fetch_array()) {
            $data1 = new DateTime($rs[responderate]);
            $data2 = new DateTime(date('Y/m/d'));
            $intervalo = $data1->diff($data2);
            $dias = $intervalo->days;
            if (($data1 == $data2) && ($rs[respondido] == "")) {
                $vencendo++;
                echo '<center><h2>O prazo para responder o documento abaixo termina <b>HOJE</b>:</h2></center>';
                echo '<fieldset>
                Documento:<br />' . nl2br2($rs[documento]) . '<br />
                Despachado para:<br />' . nl2br2($rs[despachado]) . '<br />
                Despachado em:<br />' . traduz_data_para_exibir($rs[despachadoem]) . '<br />
                Observacões:<br />' . nl2br2($rs[observacoes]) . '<br />
                Responder até:<br />' . traduz_data_para_exibir($rs[responderate]) . '<br />
                Respondido no:<br />' . nl2br2($rs[respondido]) . '</fieldset><br />';
            } else if (($dias == 1) && ($data1 > $data2) && ($rs[respondido] == "")) {
                $vencendo++;
                echo '<center><h2>O prazo para responder o documento abaixo termina AMANHÃ:</h2></center>';
                echo '<fieldset>
                Documento:<br />' . nl2br2($rs[documento]) . '<br />
                Despachado para:<br />' . nl2br2($rs[despachado]) . '<br />
                Despachado em:<br />' . traduz_data_para_exibir($rs[despachadoem]) . '<br />
                Observacões:<br />' . nl2br2($rs[observacoes]) . '<br />
                Responder até:<br />' . traduz_data_para_exibir($rs[responderate]) . '<br />
                Respondido no:<br />' . nl2br2($rs[respondido]) . '</fieldset><br />';
            } else if (($data1 < $data2) && ($rs[respondido] == "")) {
                $vencendo++;
                echo '<center><h2>O prazo para responder o documento abaixo JÁ ACABOU:</h2></center>';
                echo '<fieldset>
                Documento:<br />' . nl2br2($rs[documento]) . '<br />
                Despachado para:<br />' . nl2br2($rs[despachado]) . '<br />
                Despachado em:<br />' . traduz_data_para_exibir($rs[despachadoem]) . '<br />
                Observacões:<br />' . nl2br2($rs[observacoes]) . '<br />
                Responder até:<br />' . traduz_data_para_exibir($rs[responderate]) . '<br />
                Respondido no:<br />' . nl2br2($rs[respondido]) . '</fieldset><br />';
            } else if (($dias > 1) && ($dias < 7) && ($data1 > $data2) && ($rs[respondido] == "")) {
                $vencendo++;
                echo '<center><h2>O prazo para responder o documento abaixo ESTÁ ACABANDO:</h2></center>';
                echo '<fieldset>
                Documento:<br />' . nl2br2($rs[documento]) . '<br />
                Despachado para:<br />' . nl2br2($rs[despachado]) . '<br />
                Despachado em:<br />' . traduz_data_para_exibir($rs[despachadoem]) . '<br />
                Observacões:<br />' . nl2br2($rs[observacoes]) . '<br />
                Responder até:<br />' . traduz_data_para_exibir($rs[responderate]) . '<br />
                Respondido no:<br />' . nl2br2($rs[respondido]) . '</fieldset><br />';
            }
        }

        if ($vencendo == 0) {
            echo "<br/><center>Não há documentos que precisem ser respondidos na próxima semana ou com prazo vencido.<center/><br/>";
        }
        ?>
    </body>


</html>
