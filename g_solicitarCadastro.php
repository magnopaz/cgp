<html>
    <head>
        <title>Gravando Solicitação de Cadastro</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script type="text/javascript">
            function gravasuccessfully() {
                setTimeout("window.location='index.php'", 15000);
                echo
            }
            function gravafailed() {
                setTimeout("window.location='solicitarCadastro.php'", 5000);

            }

        </script>

    </head>
    <body>


        <?php
        include "banco.php";



        $solicitacaoCadastroGravar = array();
        $solicitacaoCadastroGravar['nome'] = mysqli_real_escape_string($conexao, $_POST['nome']);
        $solicitacaoCadastroGravar['senha'] = mysqli_real_escape_string($conexao, $_POST['senha']);
        $solicitacaoCadastroGravar['matricula'] = mysqli_real_escape_string($conexao, $_POST['matricula']);
        $solicitacaoCadastroGravar['observacao'] = mysqli_real_escape_string($conexao, $_POST['observacao']);
        $solicitacaoCadastroGravar['executado'] = 0;

        $c1 = mysqli_real_escape_string($conexao, $_POST['nome']);
        $c2 = mysqli_real_escape_string($conexao, $_POST['matricula']);
        $c3 = mysqli_real_escape_string($conexao, $_POST['senha']);

        function grava_solicitacaoCadastro($conexao, $solicitacaoCadastroGravar) {
            $sqlGravar = "INSERT INTO solicitacaocadastro (nome, matricula, senha, observacao, executado) VALUES ('{$solicitacaoCadastroGravar['nome']}', '{$solicitacaoCadastroGravar['matricula']}', '{$solicitacaoCadastroGravar['senha']}', '{$solicitacaoCadastroGravar['observacao']}', '{$solicitacaoCadastroGravar['executado']}')";
            mysqli_query($conexao, $sqlGravar);
        }

        grava_solicitacaoCadastro($conexao, $solicitacaoCadastroGravar);

        $sqlBusca = "SELECT * FROM solicitacaoCadastro WHERE nome = '$c1' AND matricula = '$c2' AND senha = '$c3'";
        $sql = mysqli_query($conexao, $sqlBusca);
        $row = mysqli_num_rows($sql);
        if ($row > 0) {
            echo "<center>Solicitação de cadastro gravada com sucesso!<br/>Informarei no quadro de avisos da página inicial quando seu cadastro for liberado</center>";
            echo "<script>gravasuccessfully()</script>";
        } else {
            echo "<center>Falha na gravação.</center>";
            echo "<script>gravafailed()</script>";
        }
        ?>

    </body>

</html>