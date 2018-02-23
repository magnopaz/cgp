<html>
    <head>
        <title>Gravando Documento</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script type="text/javascript">
            function gravasuccessfully() {
                setTimeout("window.location='adm.php'", 5000);
                echo
            }
            function gravafailed() {
                setTimeout("window.location='adm.php'", 5000);

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

        $documentogravar = array();
        $documentogravar['documento'] = mysqli_real_escape_string($conexao, $_POST['documento']);
        $documentogravar['despachado'] = mysqli_real_escape_string($conexao, $_POST['despachado']);
        $documentogravar['observacoes'] = mysqli_real_escape_string($conexao, $_POST['observacoes']);
        if (isset($_POST['responderate'])) {
            $documentogravar['responderate'] = traduz_data_para_banco($_POST['responderate']);
        } else {
            $documentogravar['responderate'] = '';
        }
        $data = date('Y/m/d');
        $documentogravar['despachadoem'] = $data;


        $c1 = mysqli_real_escape_string($conexao, $_POST['documento']);
        $c2 = mysqli_real_escape_string($conexao, $_POST['despachado']);

        function grava_documento($conexao, $documentogravar) {
            $sqlGravar = "INSERT INTO documentos (documento, despachado, observacoes, responderate, despachadoem) VALUES ('{$documentogravar['documento']}', '{$documentogravar['despachado']}', '{$documentogravar['observacoes']}', '{$documentogravar['responderate']}', '{$documentogravar['despachadoem']}')";
            mysqli_query($conexao, $sqlGravar);
        }

        grava_documento($conexao, $documentogravar);

        $sqlBusca = "SELECT * FROM documentos WHERE documento = '$c1' AND despachado = '$c2'";
        $sql = mysqli_query($conexao, $sqlBusca);
        $row = mysqli_num_rows($sql);
        if ($row > 0) {
            echo "<center>Documento gravado com sucesso!</center>";
            echo "<script>gravasuccessfully()</script>";
        } else {
            echo "<center>Falha na gravação.</center>";
            echo "<script>gravafailed()</script>";
        }
        ?>

    </body>

</html>
