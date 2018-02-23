<html>
    <head>
        <title>Gravando Mensagem</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script type="text/javascript">
            function gravasuccessfully() {
                setTimeout("window.location='admmensagens.php'", 5000);
            }
            function gravafailed() {
                setTimeout("window.location='admenviarMensagem.php'", 5000);

            }

        </script>

    </head>
    <body>


        <?php
        include "banco.php";

        session_start();
        if (!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])) {
            header("Location: index.php");
            exit;
        }
        include "userdata.php";

        $mensagemgravar = array();
        $mensagemgravar['assunto'] = mysqli_real_escape_string($conexao, $_POST['assunto']);

        $mensagemgravar['mensagem'] = mysqli_real_escape_string($conexao, $_POST['mensagem']);
        $mensagemgravar['destinatario'] = mysqli_real_escape_string($conexao, $_POST['destinatario']);

        $mensagemgravar['remetente'] = $_SESSION["usuario"];
        $mensagemgravar['remetenteNome'] = $dados["nome"];
        $c1 = mysqli_real_escape_string($conexao, $_POST['assunto']);
        $c2 = mysqli_real_escape_string($conexao, $_POST['destinatario']);

        function grava_mensagem($conexao, $mensagemgravar) {
            $sqlGravar = "INSERT INTO mensagens (remetente, destinatario, assunto, mensagem, remetenteNome) VALUES ('{$mensagemgravar['remetente']}', '{$mensagemgravar['destinatario']}', '{$mensagemgravar['assunto']}', '{$mensagemgravar['mensagem']}', '{$mensagemgravar['remetenteNome']}')";
            mysqli_query($conexao, $sqlGravar);
        }

        grava_mensagem($conexao, $mensagemgravar);

        $sqlBusca = "SELECT * FROM mensagens WHERE assunto = '$c1' AND destinatario = '$c2'";
        $sql = mysqli_query($conexao, $sqlBusca);
        $row = mysqli_num_rows($sql);
        if ($row > 0) {
            echo "<center>Mensagem enviada com sucesso!</center>";
            echo "<script>gravasuccessfully()</script>";
        } else {
            echo "<center>Falha na gravação.</center>";
            echo "<script>gravafailed()</script>";
        }
        ?>

    </body>

</html>
