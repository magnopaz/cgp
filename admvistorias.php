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
            <nav class="menu-opcoes">
                <ul>
                    <li><a href="adm_solicitar_vistoria.php">Solicitar Vistoria</a></li>

                </ul>
            </nav>
            <?php
            $sql = "SELECT * FROM vistorias WHERE vistoriaNumero = ''";
            $query = $conexao->query($sql);
            if ($query->num_rows < 1) {
                echo "Não há vistorias pendentes.";
            } else {
                echo '<center><h2>Há ' . $query->num_rows . ' vistorias pendentes.</h2></center>
            <form action="admvisualizarvistorias.php">
                <input type="submit" value="Visualizar Vistorias Pendentes" />
            </form>';
            }
            $sql = "SELECT * FROM vistorias WHERE vistoriaNumero != ''";
            $query = $conexao->query($sql);
            if ($query->num_rows < 1) {
                echo "<br/><br/>Não há vistorias realizadas.";
            } else {
                echo '<br/><br/><center><h2>Há ' . $query->num_rows . ' vistorias realizadas.</h2></center>
            <form action="admvisualizarvistoriasrealizadas.php">
                <input type="submit" value="Visualizar Vistorias Realizadas" />
            </form>';
            }
            ?>


        </div>
    </body>


</html>