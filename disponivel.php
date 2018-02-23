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
                <li><a class="current" href="disponivel.php">Disponível</a></li>
                <li><a href="disponivelconcessoes.php">Concessões</a></li>
                <li><a href="disponivelvistorias.php">Vistorias</a></li>
                <li><a href="disponivelmensagens.php">Mensagens</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/>
        <nav class="menu-opcoes">
            <ul>
                <li><a href="cadastrardisponivel.php">Cadastrar imóvel no disponível</a></li>
                <li><a href="pesquisardisponivel.php">Pesquisar imóvel no disponível</a></li>
                <li><a href="solicitarVistoria.php">Solicitar vistoria</a></li>
            </ul>
        </nav>

    </body>


</html>
