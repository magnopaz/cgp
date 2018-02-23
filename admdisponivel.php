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
                <li><a href="adm.php">Documentos</a></li>
                <li><a href="admconcessao.php">Concessão</a></li>
                <li><a class="current" href="admdisponivel.php">Disponível</a></li>
                <li><a href="admvistorias.php">Vistorias</a></li>
                <li><a href="admmensagens.php">Mensagens</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/>

        <nav class="menu-opcoes">
            <ul>
                <li><a href="admcadastrardisponivel.php">Cadastrar imóvel no disponível</a></li>
                <li><a href="admpesquisardisponivel.php">Pesquisar imóvel no disponível</a></li>
            </ul>
        </nav>



    </div>
</body>


</html>