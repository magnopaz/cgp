<html>
    <head>

        <link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />


        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
        <title>Sistema CGP</title>
    </head>
    <body id="home">
        <div class="wrap">
            <div id="logo">
                <h1><a href="." title="Home">Sistema CGP</a></h1>
                <p>Desenvolvido por Magno Paz</p>
            </div>

        </div>
        <br/><br/><br/><br/><br/><br/><br/>
    <center><h3><p>Digite seu usuário e senha</p></h3></center>
    <br>
    <div id="login">
        <center><form name="formlogin" method="post" action="autenticacao_de_usuario.php">
                Usuário: <input type="text" name="usuario" /><br /><br />
                Senha:	<input type="password" name="senha" /><br /><br />
                <input type="submit" value="Entrar"/>
            </form></center>            
    </div>


    <center><h3><br/>Não tem cadastro? Solicite abaixo<br/></h3><a href="solicitarCadastro.php">Solicitar Cadastro</a></center>

     <center><h3><br/></h3><a href="buscaBairro.php">Consultar número do bairro</a></center>
    
    
    <center><h3><br/><br/>Quadro de Avisos</h3></center>
    <?php
    include "banco.php";
    $sql = "SELECT aviso FROM quadroavisos";
    $query = $conexao->query($sql);
    ?>
    <center><textarea name="quadroAvisos" rows="10" cols="100">
            <?php
            if ($query->num_rows < 1) {
                echo "Não há avisos atualmente.";
            } else {
                while ($avisos = $query->fetch_array()) {
                    echo $avisos[aviso];
                }
            }
            ?>
        </textarea><br /></center>

    <center><h3><br/></h3><a href="agendaTelefonica.php">Consultar agenda telefônica</a></center>
</body>

</html>